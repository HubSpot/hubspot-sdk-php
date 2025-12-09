<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ExportsContract;
use HubspotSDK\TaskLocator;

final class ExportsService implements ExportsContract
{
    /**
     * @api
     */
    public ExportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExportsRawService($client);
    }

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAsync(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve detailed information about a specific CRM export, including its current state and properties.
     *
     * @param int $exportID the unique ID of the export to retrieve
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        ?RequestOptions $requestOptions = null
    ): PublicExportResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($exportID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the status of the export with taskId, including the URL of the resulting file if the export status is COMPLETE
     *
     * @param int $taskID the unique ID of the export
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithSingleResultUri {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
