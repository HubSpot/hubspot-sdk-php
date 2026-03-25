<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponsePropertyNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\PropertyCreateParams;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\Crm\Properties\PropertyDeleteParams;
use HubspotSDK\Crm\Properties\PropertyGetParams;
use HubspotSDK\Crm\Properties\PropertyListParams;
use HubspotSDK\Crm\Properties\PropertyUpdateParams;
use HubspotSDK\OptionInput;
use HubspotSDK\Property;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\PropertiesRawContract;

/**
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * Create and return a copy of a new property for the specified object type.
     *
     * @param array{
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/properties/2026-03/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
     *
     * @param string $propertyName Path param
     * @param array{
     *   objectType: string,
     *   calculationFormula?: string,
     *   description?: string,
     *   displayOrder?: int,
     *   fieldType?: value-of<PropertyUpdateParams\FieldType>,
     *   formField?: bool,
     *   groupName?: string,
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
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/properties/2026-03/%1$s/%2$s', $objectType, $propertyName],
            body: (object) array_diff_key($parsed, array_flip(['objectType'])),
            options: $options,
            convert: Property::class,
        );
    }

    /**
     * @api
     *
     * Read all existing properties for the specified object type and HubSpot account.
     *
     * @param array{
     *   archived?: bool,
     *   dataSensitivity?: PropertyListParams\DataSensitivity|value-of<PropertyListParams\DataSensitivity>,
     *   locale?: string,
     *   properties?: string,
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/properties/2026-03/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePropertyNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing property.
     *
     * @param array{objectType: string}|PropertyDeleteParams $params
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
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/properties/2026-03/%1$s/%2$s', $objectType, $propertyName],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a property identified by {propertyName}.
     *
     * @param string $propertyName Path param
     * @param array{
     *   objectType: string,
     *   archived?: bool,
     *   dataSensitivity?: PropertyGetParams\DataSensitivity|value-of<PropertyGetParams\DataSensitivity>,
     *   locale?: string,
     *   properties?: string,
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
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/properties/2026-03/%1$s/%2$s', $objectType, $propertyName],
            query: $parsed,
            options: $options,
            convert: Property::class,
        );
    }
}
