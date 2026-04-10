<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Objects\Taxes;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;
use HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;
use HubSpotSDK\Crm\Objects\SimplePublicObjectID;
use HubSpotSDK\Crm\Objects\Taxes\Batch\BatchCreateParams;
use HubSpotSDK\Crm\Objects\Taxes\Batch\BatchDeleteParams;
use HubSpotSDK\Crm\Objects\Taxes\Batch\BatchGetParams;
use HubSpotSDK\Crm\Objects\Taxes\Batch\BatchUpdateParams;
use HubSpotSDK\Crm\Objects\Taxes\Batch\BatchUpsertParams;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Objects\Taxes\BatchRawContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 * @phpstan-import-type SimplePublicObjectIDShape from \HubSpotSDK\Crm\Objects\SimplePublicObjectID
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
     * Create multiple tax records in a single request, each with specified properties and optional associations, and receive a response with details of the created objects.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
     * }|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
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
            path: 'crm/objects/2026-03/taxes/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update multiple tax records using their internal IDs or unique property values. This operation allows for batch processing of updates to tax objects, ensuring efficient management of tax data in bulk.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
     * }|BatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/taxes/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Archive multiple taxes by their IDs in a single request.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
     * }|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
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
            path: 'crm/objects/2026-03/taxes/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/taxes/batch/read',
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape>,
     * }|BatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicUpsertObject>
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/objects/2026-03/taxes/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );
    }
}
