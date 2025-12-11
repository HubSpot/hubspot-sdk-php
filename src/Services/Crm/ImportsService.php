<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ImportsContract;

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
     * Begins importing data from the specified file resources. This uploads the corresponding file and uses the import request object to convert rows in the files to objects.
     *
     * @throws APIException
     */
    public function create(
        ?string $files = null,
        ?string $importRequest = null,
        ?RequestOptions $requestOptions = null,
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
     * Returns a paged list of active imports for this account.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This allows a developer to cancel an active import.
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): ActionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($importID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * A complete summary of an import record, including any updates.
     *
     * @throws APIException
     */
    public function get(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): PublicImportResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($importID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $includeErrorMessage set to True to receive a message explaining the error
     * @param bool $includeRowData set to True to receive the data values for the errored row
     * @param int $limit the maximum number of results to display per page
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
        ?RequestOptions $requestOptions = null,
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
