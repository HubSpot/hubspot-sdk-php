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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
