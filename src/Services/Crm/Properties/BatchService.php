<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Properties;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Properties\Batch\BatchCreateParams;
use HubspotSDK\Crm\Properties\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Properties\Batch\BatchGetParams;
use HubspotSDK\PropertyCreate\DataSensitivity;
use HubspotSDK\PropertyCreate\FieldType;
use HubspotSDK\PropertyCreate\Type;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Properties\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of properties using the same rules as when creating an individual property.
     *
     * @param array{
     *   inputs: list<array{
     *     fieldType: 'booleancheckbox'|'calculation_equation'|'checkbox'|'date'|'file'|'html'|'number'|'phonenumber'|'radio'|'select'|'text'|'textarea'|FieldType,
     *     groupName: string,
     *     label: string,
     *     name: string,
     *     type: 'bool'|'date'|'datetime'|'enumeration'|'number'|'phone_number'|'string'|Type,
     *     calculationFormula?: string,
     *     dataSensitivity?: 'highly_sensitive'|'non_sensitive'|'sensitive'|DataSensitivity,
     *     description?: string,
     *     displayOrder?: int,
     *     externalOptions?: bool,
     *     formField?: bool,
     *     hasUniqueValue?: bool,
     *     hidden?: bool,
     *     options?: list<array<mixed>>,
     *     referencedObjectType?: string,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseProperty> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/create', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param array{inputs: list<array{name: string}>}|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/archive', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a provided list of properties.
     *
     * @param array{
     *   archived: bool,
     *   dataSensitivity: 'highly_sensitive'|'non_sensitive'|'sensitive'|BatchGetParams\DataSensitivity,
     *   inputs: list<array{name: string}>,
     *   locale?: string,
     * }|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseProperty {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['locale'];

        /** @var BaseResponse<BatchResponseProperty> */
        $response = $this->client->request(
            method: 'post',
            path: ['crm/v3/properties/%1$s/batch/read', $objectType],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseProperty::class,
        );

        return $response->parse();
    }
}
