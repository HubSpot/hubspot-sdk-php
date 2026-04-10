<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubSpotSDK\Crm\Exports\PublicExportResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ExportsContract;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAsync(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponseWithSingleResultUri {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
