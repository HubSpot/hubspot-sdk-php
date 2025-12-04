<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Custom\CustomCreateParams;
use HubspotSDK\Crm\Objects\Custom\CustomDeleteParams;
use HubspotSDK\Crm\Objects\Custom\CustomGetParams;
use HubspotSDK\Crm\Objects\Custom\CustomListParams;
use HubspotSDK\Crm\Objects\Custom\CustomMergeParams;
use HubspotSDK\Crm\Objects\Custom\CustomSearchParams;
use HubspotSDK\Crm\Objects\Custom\CustomUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\CustomContract;
use HubspotSDK\Services\Crm\Objects\Custom\BatchService;

final class CustomService implements CustomContract
{
    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a CRM object with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard objects is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|CustomCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array|CustomCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = CustomCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/objects/%1$s', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{objectId}`or optionally a unique property value as specified by the `idProperty` query param. `{objectId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   objectType: string, properties: array<string,string>, idProperty?: string
     * }|CustomUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|CustomUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = CustomUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/%1$s/%2$s', $objectType, $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                ['objectType']
            ),
            options: $options,
            convert: SimplePublicObject::class,
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
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        array|CustomListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = CustomListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/%1$s', $objectType],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{objectId}` to the recycling bin.
     *
     * @param array{objectType: string}|CustomDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|CustomDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = CustomDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/%1$s/%2$s', $objectType, $objectID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{objectId}`. `{objectId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   objectType: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|CustomGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|CustomGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = CustomGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/%1$s/%2$s', $objectType, $objectID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Merge two objects with same type
     *
     * @param array{
     *   objectIdToMerge: string, primaryObjectId: string
     * }|CustomMergeParams $params
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        array|CustomMergeParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = CustomMergeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/objects/%1$s/merge', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|CustomSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        array|CustomSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = CustomSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/objects/%1$s/search', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
