<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\Services\ServiceCreateParams;
use HubspotSDK\Crm\Objects\Services\ServiceGetParams;
use HubspotSDK\Crm\Objects\Services\ServiceListParams;
use HubspotSDK\Crm\Objects\Services\ServiceSearchParams;
use HubspotSDK\Crm\Objects\Services\ServiceUpdateParams;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\ServicesContract;
use HubspotSDK\Services\Crm\Objects\Services\BatchService;

final class ServicesService implements ServicesContract
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
     * Create a service with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard services is provided.
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   properties: array<string,string>,
     * }|ServiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ServiceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = ServiceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-162',
            body: (object) $parsed,
            options: $options,
            convert: CreatedResponseSimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{serviceId}`or optionally a unique property value as specified by the `idProperty` query param. `{serviceId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param array{
     *   properties: array<string,string>, idProperty?: string
     * }|ServiceUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $serviceID,
        array|ServiceUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        [$parsed, $options] = ServiceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['crm/v3/objects/0-162/%1$s', $serviceID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: SimplePublicObject::class,
        );
    }

    /**
     * @api
     *
     * Read a page of services. Control what is returned via the `properties` query param.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   associations?: list<string>,
     *   limit?: int,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ServiceListParams $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        array|ServiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ServiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/objects/0-162',
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Move an Object identified by `{serviceId}` to the recycling bin.
     *
     * @throws APIException
     */
    public function delete(
        string $serviceID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/objects/0-162/%1$s', $serviceID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Read an Object identified by `{serviceId}`. `{serviceId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param array{
     *   archived?: bool,
     *   associations?: list<string>,
     *   idProperty?: string,
     *   properties?: list<string>,
     *   propertiesWithHistory?: list<string>,
     * }|ServiceGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $serviceID,
        array|ServiceGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = ServiceGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/objects/0-162/%1$s', $serviceID],
            query: $parsed,
            options: $options,
            convert: SimplePublicObjectWithAssociations::class,
        );
    }

    /**
     * @api
     *
     * Fetch objects via a search query
     *
     * @param array{
     *   after: string,
     *   filterGroups: list<array{filters: list<array<mixed>>}>,
     *   limit: int,
     *   properties: list<string>,
     *   sorts: list<string>,
     *   query?: string,
     * }|ServiceSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ServiceSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = ServiceSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/0-162/search',
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
