<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Properties;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Properties\Batch\BatchCreateParams;
use HubSpotSDK\Crm\Properties\Batch\BatchDeleteParams;
use HubSpotSDK\Crm\Properties\Batch\BatchGetParams;
use HubSpotSDK\Crm\Properties\Batch\BatchGetParams\DataSensitivity;
use HubSpotSDK\Crm\Properties\BatchResponseProperty;
use HubSpotSDK\PropertyCreate;
use HubSpotSDK\PropertyName;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Properties\BatchRawContract;

/**
 * @phpstan-import-type PropertyCreateShape from \HubSpotSDK\PropertyCreate
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type PropertyNameShape from \HubSpotSDK\PropertyName
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
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
     *   inputs: list<PropertyCreate|PropertyCreateShape>
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/properties/2026-03/%1$s/batch/create', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }

    /**
     * @api
     *
     * Archive a provided list of properties. This method will return a 204 No Content response on success regardless of the initial state of the property (e.g. active, already archived, non-existent).
     *
     * @param array{
     *   inputs: list<PropertyName|PropertyNameShape>
     * }|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/properties/2026-03/%1$s/batch/archive', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read a provided list of properties.
     *
     * @param string $objectType Path param
     * @param array{
     *   archived: bool,
     *   dataSensitivity: DataSensitivity|value-of<DataSensitivity>,
     *   inputs: list<PropertyName|PropertyNameShape>,
     *   locale?: string,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseProperty>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['locale']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/properties/2026-03/%1$s/batch/read', $objectType],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseProperty::class,
        );
    }
}
