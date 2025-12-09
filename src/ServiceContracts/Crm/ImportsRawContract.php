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

interface ImportsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ImportCreateParams $params
     *
     * @return BaseResponse<PublicImportResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ImportCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ImportListParams $params
     *
     * @return BaseResponse<Page<PublicImportResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ImportListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function cancel(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PublicImportResponse>
     *
     * @throws APIException
     */
    public function get(
        int $importID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ImportListErrorsParams $params
     *
     * @return BaseResponse<Page<PublicImportError>>
     *
     * @throws APIException
     */
    public function listErrors(
        int $importID,
        array|ImportListErrorsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
