<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Imports\PublicImportError;
use HubSpotSDK\Crm\Imports\PublicImportResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ImportsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ImportsService implements ImportsContract
{
    /**
     * @api
     */
    public ImportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ImportsRawService($client);
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|FileParam|null $files = null,
        ?string $importRequest = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicImportResponse {
        $params = Util::removeNulls(
            ['files' => $files, 'importRequest' => $importRequest]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(['after' => $after, 'limit' => $limit]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($importID, requestOptions: $requestOptions);

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
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): PublicImportResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($importID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicImportError>
     *
     * @throws APIException
     */
    public function listErrors(
        int $importID,
        ?string $after = null,
        ?bool $includeErrorMessage = null,
        ?bool $includeRowData = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'includeErrorMessage' => $includeErrorMessage,
                'includeRowData' => $includeRowData,
                'limit' => $limit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listErrors($importID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
