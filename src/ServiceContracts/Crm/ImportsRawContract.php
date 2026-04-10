<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Imports\ImportCreateParams;
use HubSpotSDK\Crm\Imports\ImportListErrorsParams;
use HubSpotSDK\Crm\Imports\ImportListParams;
use HubSpotSDK\Crm\Imports\PublicImportError;
use HubSpotSDK\Crm\Imports\PublicImportResponse;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
