<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects\Quotes;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Quotes\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Quotes\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Quotes\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Quotes\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Quotes\Batch\BatchUpsertParams;
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
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject;
}
