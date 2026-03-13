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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface PropertiesRawContract
{
    /**
     * @api
     *
     * @param string $objectType path param: The object type to create the new property for
     * @param array<string,mixed>|PropertyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to update
     * @param array<string,mixed>|PropertyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The specific object type to get the details for
     * @param array<string,mixed>|PropertyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePropertyNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName the name of the property to delete
     * @param array<string,mixed>|PropertyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The type of object to create the properties for
     * @param array<string,mixed>|PropertyCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        array|PropertyCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The object type for the specified properties to be archived
     * @param array<string,mixed>|PropertyDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        array|PropertyDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $propertyName path param: The name of the property to get the details for
     * @param array<string,mixed>|PropertyGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectType path param: The object type to get the properties for
     * @param array<string,mixed>|PropertyGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        array|PropertyGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
