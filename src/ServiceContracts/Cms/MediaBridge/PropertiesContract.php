<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyDeleteBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyDeleteParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyListParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

interface PropertiesContract
{
    /**
     * @api
     *
     * @param array<mixed>|PropertyCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<mixed>|PropertyUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<mixed>|PropertyListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePropertyNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|PropertyDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PropertyCreateBatchParams $params
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        array|PropertyCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;

    /**
     * @api
     *
     * @param array<mixed>|PropertyDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        array|PropertyDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|PropertyGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): Property;

    /**
     * @api
     *
     * @param array<mixed>|PropertyGetBatchParams $params
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        array|PropertyGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty;
}
