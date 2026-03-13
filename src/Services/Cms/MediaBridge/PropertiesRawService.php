<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyDeleteBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyDeleteParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetBatchParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyGetParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyListParams;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\OptionInput;
use HubspotSDK\Property;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\PropertiesRawContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubspotSDK\PropertyCreate
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubspotSDK\PropertyName
 */
final class PropertiesRawService implements PropertiesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new property for the specified media type
     *
     * @param string $objectType path param: The object type to create the new property for
     * @param array{
     *   appID: int,
     *   fieldType: value-of<FieldType>,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   type: Type|value-of<Type>,
     *   calculationFormula?: string,
     *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
     *   description?: string,
     *   displayOrder?: int,
     *   externalOptions?: bool,
     *   formField?: bool,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   options?: list<OptionInput|OptionInputShape>,
     *   referencedObjectType?: string,
     * }|PropertyCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['media-bridge/v1/%1$s/properties/%2$s', $appID, $objectType],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Update an existing property for an object type.
     *
     * @param string $propertyName path param: The name of the property to update
     * @param array{
     *   appID: int,
     *   objectType: string,
     *   calculationFormula?: string,
     *   description?: string,
     *   displayOrder?: int,
     *   fieldType?: value-of<PropertyUpdateParams\FieldType>,
     *   formField?: bool,
     *   groupName?: string,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   label?: string,
     *   options?: list<OptionInput|OptionInputShape>,
     *   type?: PropertyUpdateParams\Type|value-of<PropertyUpdateParams\Type>,
     * }|PropertyUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            body: (object) array_diff_key(
                $parsed,
                array_flip(['appID', 'objectType'])
            ),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Get the existing properties defined for a media object type.
     *
     * @param string $objectType path param: The specific object type to get the details for
     * @param array{
     *   appID: int, archived?: bool, properties?: string
     * }|PropertyListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['media-bridge/v1/%1$s/properties/%2$s', $appID, $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePropertyNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property for an object type.
     *
     * @param string $propertyName the name of the property to delete
     * @param array{appID: int, objectType: string}|PropertyDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a batch of properties of the specified object type.
     *
     * @param string $objectType path param: The type of object to create the properties for
     * @param array{
     *   appID: int, inputs: list<PropertyCreate|PropertyCreateShape>
     * }|PropertyCreateBatchParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/create', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of existing properties for the specified types.
     *
     * @param string $objectType path param: The object type for the specified properties to be archived
     * @param array{
     *   appID: int, inputs: list<PropertyName|PropertyNameShape>
     * }|PropertyDeleteBatchParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/archive',
                $appID,
                $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get the details for an existing property by name.
     *
     * @param string $propertyName path param: The name of the property to get the details for
     * @param array{
     *   appID: int, objectType: string, archived?: bool, properties?: string
     * }|PropertyGetParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/%3$s',
                $appID,
                $objectType,
                $propertyName,
            ],
            query: $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Get the details for a batch of properties for a specified object type.
     *
     * @param string $objectType path param: The object type to get the properties for
     * @param array{
     *   appID: int,
     *   archived: bool,
     *   dataSensitivity: PropertyGetBatchParams\DataSensitivity|value-of<PropertyGetBatchParams\DataSensitivity>,
     *   inputs: list<PropertyName|PropertyNameShape>,
     * }|PropertyGetBatchParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PropertyGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'media-bridge/v1/%1$s/properties/%2$s/batch/read', $appID, $objectType,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}
