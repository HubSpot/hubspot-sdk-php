<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\FilterGroup;
use HubspotSDK\CRM\Objects\Objects\ObjectCreateParams;
use HubspotSDK\CRM\Objects\Objects\ObjectDeleteParams;
use HubspotSDK\CRM\Objects\Objects\ObjectListParams;
use HubspotSDK\CRM\Objects\Objects\ObjectReadParams;
use HubspotSDK\CRM\Objects\Objects\ObjectSearchParams;
use HubspotSDK\CRM\Objects\Objects\ObjectUpdateParams;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;
use HubspotSDK\CRM\Objects\SimplePublicObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\ObjectsContract;
use HubspotSDK\Services\CRM\Objects\Objects\BatchService;

use const HubspotSDK\Core\OMIT as omit;

final class ObjectsService implements ObjectsContract
{
    /**
     * @@api
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
     * @param array<string, string> $properties the company property values to set
     * @param list<PublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject {
        $params = ['properties' => $properties, 'associations' => $associations];

        return $this->createRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject {
        [$parsed, $options] = ObjectCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $objectType
     * @param array<string, string> $properties the company property values to set
     * @param string $idProperty The name of a property whose values are unique for this object
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        $objectType,
        $properties,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        $params = [
            'objectType' => $objectType,
            'properties' => $properties,
            'idProperty' => $idProperty,
        ];

        return $this->updateRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject {
        [$parsed, $options] = ObjectUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);
        $query_params = ['idProperty'];

        // @phpstan-ignore-next-line;
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of objects that can be read by a single request.
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'associations' => $associations,
            'limit' => $limit,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->listRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function listRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ObjectListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $objectType
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $objectType,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['objectType' => $objectType];

        return $this->deleteRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ObjectDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
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
     * @param string $objectType
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param string $idProperty The name of a property whose values are unique for this object
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @throws APIException
     */
    public function read(
        string $objectID,
        $objectType,
        $archived = omit,
        $associations = omit,
        $idProperty = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = [
            'objectType' => $objectType,
            'archived' => $archived,
            'associations' => $associations,
            'idProperty' => $idProperty,
            'properties' => $properties,
            'propertiesWithHistory' => $propertiesWithHistory,
        ];

        return $this->readRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObjectWithAssociations {
        [$parsed, $options] = ObjectReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectType = $parsed['objectType'];
        unset($parsed['objectType']);

        // @phpstan-ignore-next-line;
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
     * @param string $after a paging cursor token for retrieving subsequent pages
     * @param list<FilterGroup> $filterGroups up to 6 groups of filters defining additional query criteria
     * @param int $limit the maximum results to return, up to 200 objects
     * @param list<string> $properties a list of property names to include in the response
     * @param string $query the search query string, up to 3000 characters
     * @param list<string> $sorts specifies sorting order based on object properties
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        $after = omit,
        $filterGroups = omit,
        $limit = omit,
        $properties = omit,
        $query = omit,
        $sorts = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        $params = [
            'after' => $after,
            'filterGroups' => $filterGroups,
            'limit' => $limit,
            'properties' => $properties,
            'query' => $query,
            'sorts' => $sorts,
        ];

        return $this->searchRaw($objectType, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchRaw(
        string $objectType,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject {
        [$parsed, $options] = ObjectSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['crm/v3/objects/%1$s/search', $objectType],
            body: (object) $parsed,
            options: $options,
            convert: CollectionResponseWithTotalSimplePublicObject::class,
        );
    }
}
