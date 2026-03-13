<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ExportsRawContract;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ExportsRawService implements ExportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Begins exporting CRM data for the portal as specified in the request body
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function createAsync(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/exports/export/async',
            options: $requestOptions,
            convert: TaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Retrieve detailed information about a specific CRM export, including its current state and properties.
     *
     * @param int $exportID the unique ID of the export to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicExportResponse>
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/exports/export/%1$s', $exportID],
            options: $requestOptions,
            convert: PublicExportResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the status of the export with taskId, including the URL of the resulting file if the export status is COMPLETE
     *
     * @param int $taskID the unique ID of the export
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponseWithSingleResultUri>
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/exports/export/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: ActionResponseWithSingleResultUri::class,
        );
    }
}
