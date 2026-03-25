<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\ActionResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Imports\ImportCreateParams;
use HubspotSDK\Crm\Imports\ImportListErrorsParams;
use HubspotSDK\Crm\Imports\ImportListParams;
use HubspotSDK\Crm\Imports\PublicImportError;
use HubspotSDK\Crm\Imports\PublicImportResponse;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ImportsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ImportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicImportResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ImportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PublicImportResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ImportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ImportListErrorsParams $params
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
    ): BaseResponse;
}
