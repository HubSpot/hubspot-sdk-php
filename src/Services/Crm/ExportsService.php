<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ExportsContract;
use HubspotSDK\TaskLocator;

final class ExportsService implements ExportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Begins exporting CRM data for the portal as specified in the request body
     *
     * @throws APIException
     */
    public function createAsync(
        ?RequestOptions $requestOptions = null
    ): TaskLocator {
        /** @var BaseResponse<TaskLocator> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/exports/export/async',
            options: $requestOptions,
            convert: TaskLocator::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve detailed information about a specific CRM export, including its current state and properties.
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        ?RequestOptions $requestOptions = null
    ): PublicExportResponse {
        /** @var BaseResponse<PublicExportResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/exports/export/%1$s', $exportID],
            options: $requestOptions,
            convert: PublicExportResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of the export with taskId, including the URL of the resulting file if the export status is COMPLETE
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithSingleResultUri {
        /** @var BaseResponse<ActionResponseWithSingleResultUri> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/exports/export/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: ActionResponseWithSingleResultUri::class,
        );

        return $response->parse();
    }
}
