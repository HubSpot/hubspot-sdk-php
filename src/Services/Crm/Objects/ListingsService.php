<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Listings\ListingCreateParams;
use HubspotSDK\Crm\Objects\Listings\ListingGetParams;
use HubspotSDK\Crm\Objects\Listings\ListingListParams;
use HubspotSDK\Crm\Objects\Listings\ListingSearchParams;
use HubspotSDK\Crm\Objects\Listings\ListingUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\ListingsContract;
use HubspotSDK\Services\Crm\Objects\Listings\BatchService;

final class ListingsService implements ListingsContract
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
     * Create a listing with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard listings is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|ListingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ListingCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = ListingCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-420',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{listingId}`or optionally a unique property value as specified by the `idProperty` query param. `{listingId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|ListingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $listingID,
        array|ListingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = ListingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/0-420/%1$s', $listingID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of listings. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ListingListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ListingListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ListingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/0-420',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{listingId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $listingID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/0-420/%1$s', $listingID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{listingId}`. `{listingId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ListingGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $listingID,
        array|ListingGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = ListingGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/0-420/%1$s', $listingID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Execute a search query to find listings based on specified filters and properties.
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|ListingSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ListingSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = ListingSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-420/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
