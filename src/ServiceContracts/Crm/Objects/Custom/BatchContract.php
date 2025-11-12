<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Custom;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Custom\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Custom\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Custom\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Custom\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Custom\Batch\BatchUpsertParams;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        string $objectType,
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseSimplePublicUpsertObject;
}
