<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Contracts;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Contracts\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Contracts\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Contracts\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Contracts\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Contracts\Batch\BatchUpsertParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Contracts\BatchContract;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of contracts
     *
     * @param array{
     *   inputs: list<array{
     *     associations: list<array<mixed>>,
     *     properties: array<string,string>,
     *     objectWriteTraceID?: string,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a batch of contracts by internal ID, or unique property values
     *
     * @param array{
     *   inputs: list<array{
     *     id: string,
     *     properties: array<string,string>,
     *     idProperty?: string,
     *     objectWriteTraceID?: string,
     *   }>,
     * }|BatchUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a batch of contracts by ID
     *
     * @param array{inputs: list<array{id: string}>}|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve records by record ID or include the `idProperty` parameter to retrieve records by a custom unique value property.
     *
     * @param array{
     *   inputs: list<array{id: string}>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicObject {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        /** @var BaseResponse<BatchResponseSimplePublicObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param array{
     *   inputs: list<array{
     *     id: string,
     *     properties: array<string,string>,
     *     idProperty?: string,
     *     objectWriteTraceID?: string,
     *   }>,
     * }|BatchUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseSimplePublicUpsertObject {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseSimplePublicUpsertObject> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/contracts/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );

        return $response->parse();
    }
}
