<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Carts;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Carts\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Carts\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Carts\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Carts\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Carts\Batch\BatchUpsertParams;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpsertParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicUpsertObject>
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
