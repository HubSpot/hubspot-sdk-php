<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\ImportCreateParams;
use HubspotSDK\Crm\Imports\ImportListErrorsParams;
use HubspotSDK\Crm\Imports\ImportListParams;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ImportsContract;

use const HubspotSDK\Core\OMIT as omit;

final class ImportsService implements ImportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Begins importing data from the specified file resources. This uploads the corresponding file and uses the import request object to convert rows in the files to objects.
     *
     * @param string $files
     * @param string $importRequest
     *
     * @throws APIException
     */
    public function create(
        $files = omit,
        $importRequest = omit,
        ?RequestOptions $requestOptions = null
    ): PublicImportResponse {
        $params = ['files' => $files, 'importRequest' => $importRequest];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicImportResponse {
        [$parsed, $options] = ImportCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/imports/',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: PublicImportResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paged list of active imports for this account.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicImportResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ImportListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/imports/',
            query: $parsed,
            options: $options,
            convert: PublicImportResponse::class,
            page: Page::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/imports/%1$s/cancel', $importID],
            options: $requestOptions,
            convert: ActionResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/imports/%1$s', $importID],
            options: $requestOptions,
            convert: PublicImportResponse::class,
        );
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
        $after = omit,
        $includeErrorMessage = omit,
        $includeRowData = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'includeErrorMessage' => $includeErrorMessage,
            'includeRowData' => $includeRowData,
            'limit' => $limit,
        ];

        return $this->listErrorsRaw($importID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<PublicImportError>
     *
     * @throws APIException
     */
    public function listErrorsRaw(
        int $importID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ImportListErrorsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/imports/%1$s/errors', $importID],
            query: $parsed,
            options: $options,
            convert: PublicImportError::class,
            page: Page::class,
        );
    }
}
