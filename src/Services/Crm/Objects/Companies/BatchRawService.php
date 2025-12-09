<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects\Companies;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\Companies\Batch\BatchCreateParams;
use HubspotSDK\Crm\Objects\Companies\Batch\BatchDeleteParams;
use HubspotSDK\Crm\Objects\Companies\Batch\BatchGetParams;
use HubspotSDK\Crm\Objects\Companies\Batch\BatchUpdateParams;
use HubspotSDK\Crm\Objects\Companies\Batch\BatchUpsertParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\Companies\BatchRawContract;

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
     * Create a batch of companies. The `inputs` array can contain a `properties` object to define property values for each company, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
     *
     * @param array{
     *   inputs: list<array{
     *     associations: list<array<mixed>>,
     *     properties: array<string,string>,
     *     objectWriteTraceID?: string,
     *   }>,
     * }|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of companies by ID.
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
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Delete a batch of companies by ID. Deleted companies can be restored within 90 days of deletion. Learn more about [restoring records](https://knowledge.hubspot.com/records/restore-deleted-records).
     *
     * @param array{inputs: list<array{id: string}>}|BatchDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of companies by ID (`companyId`) or by a unique property (`idProperty`). You can specify what is returned using the `properties` query parameter.
     *
     * @param array{
     *   inputs: list<array{id: string}>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update companies identified by a unique property value as specified by the `idProperty` query parameter. `idProperty` query param refers to a property whose values are unique for the object.
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
     * @return BaseResponse<BatchResponseSimplePublicUpsertObject>
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/companies/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );
    }
}
