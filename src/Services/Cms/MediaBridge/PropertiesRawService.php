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
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\PropertiesRawContract;

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
     *   type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|Type,
     *   calculationFormula?: string,
     *   dataSensitivity?: 'highly_sensitive'|'non_sensitive'|'sensitive'|DataSensitivity,
     *   description?: string,
     *   displayOrder?: int,
     *   externalOptions?: bool,
     *   formField?: bool,
     *   hasUniqueValue?: bool,
     *   hidden?: bool,
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     *   referencedObjectType?: string,
     * }|PropertyCreateParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|PropertyCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   options?: list<array{
     *     displayOrder: int,
     *     hidden: bool,
     *     label: string,
     *     value: string,
     *     description?: string,
     *   }>,
     *   type?: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|PropertyUpdateParams\Type,
     * }|PropertyUpdateParams $params
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function update(
        string $propertyName,
        array|PropertyUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<CollectionResponsePropertyNoPaging>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|PropertyListParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $propertyName,
        array|PropertyDeleteParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   appID: int,
     *   inputs: list<array{
     *     fieldType: 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|\HubspotSDK\PropertyCreate\FieldType,
     *     groupName: string,
     *     label: string,
     *     name: string,
     *     type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|\HubspotSDK\PropertyCreate\Type,
     *     calculationFormula?: string,
     *     dataSensitivity?: 'highly_sensitive'|'non_sensitive'|'sensitive'|\HubspotSDK\PropertyCreate\DataSensitivity,
     *     description?: string,
     *     displayOrder?: int,
     *     externalOptions?: bool,
     *     formField?: bool,
     *     hasUniqueValue?: bool,
     *     hidden?: bool,
     *     options?: list<array<mixed>>,
     *     referencedObjectType?: string,
     *   }>,
     * }|PropertyCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function createBatch(
        string $objectType,
        array|PropertyCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   appID: int, inputs: list<array{name: string}>
     * }|PropertyDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        string $objectType,
        array|PropertyDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<Property>
     *
     * @throws APIException
     */
    public function get(
        string $propertyName,
        array|PropertyGetParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   dataSensitivity: 'highly_sensitive'|'non_sensitive'|'sensitive'|PropertyGetBatchParams\DataSensitivity,
     *   inputs: list<array{name: string}>,
     * }|PropertyGetBatchParams $params
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function getBatch(
        string $objectType,
        array|PropertyGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
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
