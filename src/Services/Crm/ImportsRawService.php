<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\ImportCreateParams;
use HubspotSDK\Crm\Imports\ImportListErrorsParams;
use HubspotSDK\Crm\Imports\ImportListParams;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ImportsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ImportsRawService implements ImportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Begins importing data from the specified file resources. This uploads the corresponding file and uses the import request object to convert rows in the files to objects.
     *
     * @param array{files?: string, importRequest?: string}|ImportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicImportResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ImportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|ImportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicImportResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ImportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ImportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicImportResponse>
     *
     * @throws APIException
     */
    public function get(
        int $importID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string, includeErrorMessage?: bool, includeRowData?: bool, limit?: int
     * }|ImportListErrorsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicImportError>>
     *
     * @throws APIException
     */
    public function listErrors(
        int $importID,
        array|ImportListErrorsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ImportListErrorsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
