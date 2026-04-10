<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Imports\ImportCreateParams;
use HubSpotSDK\Crm\Imports\ImportListErrorsParams;
use HubSpotSDK\Crm\Imports\ImportListParams;
use HubSpotSDK\Crm\Imports\PublicImportError;
use HubSpotSDK\Crm\Imports\PublicImportResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ImportsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
            path: 'crm/imports/2026-03',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: PublicImportResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{after?: string, limit?: int}|ImportListParams $params
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
            path: 'crm/imports/2026-03',
            query: $parsed,
            options: $options,
            convert: PublicImportResponse::class,
            page: Page::class,
        );
    }

    /**
     * @api
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
            path: ['crm/imports/2026-03/%1$s/cancel', $importID],
            options: $requestOptions,
            convert: ActionResponse::class,
        );
    }

    /**
     * @api
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
            path: ['crm/imports/2026-03/%1$s', $importID],
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
            path: ['crm/imports/2026-03/%1$s/errors', $importID],
            query: $parsed,
            options: $options,
            convert: PublicImportError::class,
            page: Page::class,
        );
    }
}
