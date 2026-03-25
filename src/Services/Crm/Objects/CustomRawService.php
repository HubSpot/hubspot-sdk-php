<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\Custom\CustomCreateParams;
use HubspotSDK\Crm\Objects\Custom\CustomDeleteParams;
use HubspotSDK\Crm\Objects\Custom\CustomGetParams;
use HubspotSDK\Crm\Objects\Custom\CustomListParams;
use HubspotSDK\Crm\Objects\Custom\CustomMergeParams;
use HubspotSDK\Crm\Objects\Custom\CustomSearchParams;
use HubspotSDK\Crm\Objects\Custom\CustomUpdateParams;
use HubspotSDK\Crm\Objects\Custom\CustomUpsertParams;
use HubspotSDK\Crm\Objects\FilterGroup;
use HubspotSDK\Crm\Objects\SimplePublicObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate;
use HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert;
use HubspotSDK\Crm\Objects\SimplePublicObjectID;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\CustomRawContract;

/**
 * @phpstan-import-type SimplePublicObjectBatchInputForCreateShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputForCreate
 * @phpstan-import-type SimplePublicObjectBatchInputShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInput
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\Objects\FilterGroup
 * @phpstan-import-type SimplePublicObjectBatchInputUpsertShape from \HubspotSDK\Crm\Objects\SimplePublicObjectBatchInputUpsert
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 * @phpstan-import-type SimplePublicObjectIDShape from \HubspotSDK\Crm\Objects\SimplePublicObjectID
 */
final class CustomRawService implements CustomRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create multiple CRM objects in a single request by specifying the object type and providing the necessary properties and associations for each object.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputForCreate|SimplePublicObjectBatchInputForCreateShape>,
     * }|CustomCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|CustomCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/batch/create', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of CRM objects by their internal IDs or unique property values, allowing for efficient modifications of multiple records in a single request.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInput|SimplePublicObjectBatchInputShape>
     * }|CustomUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function update(
        string $objectType,
        array|CustomUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/batch/update', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of objects. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|CustomListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<SimplePublicObjectWithAssociations>>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|CustomListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/objects/2026-03/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive a batch of objects by their unique IDs. This operation moves the specified objects to the recycling bin, effectively marking them as archived.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>
     * }|CustomDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectType,
        array|CustomDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/batch/archive', $objectType],
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
     * @param string $objectType Path param
     * @param array{
     *   inputs: list<SimplePublicObjectID|SimplePublicObjectIDShape>,
     *   properties: list<string>,
     *   propertiesWithHistory: list<string>,
     *   archived?: bool,
     *   idProperty?: string,
     * }|CustomGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        string $objectType,
        array|CustomGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/batch/read', $objectType],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Merge two CRM objects of the same type by specifying one as the primary object and the other as the object to be merged into it.
     *
     * @param array{
     *   objectIDToMerge: string, primaryObjectID: string
     * }|CustomMergeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimplePublicObject>
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        array|CustomMergeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomMergeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/merge', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Execute a search query to find CRM objects of a given type, using specified filters and properties. The search can be customized with filters, sorting, and pagination options.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<FilterGroup|FilterGroupShape>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|CustomSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalSimplePublicObject>
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|CustomSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/search', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Create or update records identified by a unique property value as specified by the `idProperty` query param. `idProperty` query param refers to a property whose values are unique for the object.
     *
     * @param array{
     *   inputs: list<SimplePublicObjectBatchInputUpsert|SimplePublicObjectBatchInputUpsertShape>,
     * }|CustomUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicUpsertObject>
     *
     * @throws APIException
     */
    public function upsert(
        string $objectType,
        array|CustomUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/objects/2026-03/%1$s/batch/upsert', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseSimplePublicUpsertObject::class,
        );
    }
}
