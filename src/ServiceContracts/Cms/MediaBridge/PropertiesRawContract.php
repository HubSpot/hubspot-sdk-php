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
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;

interface PropertiesRawContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type to create the new property for
     * @param array<mixed>|PropertyCreateParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to update
     * @param array<mixed>|PropertyUpdateParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The specific object type to get the details for
     * @param array<mixed>|PropertyListParams $params
     *
     * @return BaseResponse<CollectionResponsePropertyNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName the name of the property to delete
     * @param array<mixed>|PropertyDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The type of object to create the properties for
     * @param array<mixed>|PropertyCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        array|PropertyCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The object type for the specified properties to be archived
     * @param array<mixed>|PropertyDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        array|PropertyDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to get the details for
     * @param array<mixed>|PropertyGetParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The object type to get the properties for
     * @param array<mixed>|PropertyGetBatchParams $params
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        array|PropertyGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
