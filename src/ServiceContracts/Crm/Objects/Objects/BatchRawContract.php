<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Objects\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Objects\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Objects\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Objects\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Objects\Batch\BatchUpsertParams;
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
        string $objectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
        string $objectType,
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
        string $objectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType Path param:
     * @param array<mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
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
        string $objectType,
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
