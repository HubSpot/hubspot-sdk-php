<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\FilterGroup;
use HubspotSDK\Crm\Objects\PublicAssociationsForObject;
use HubspotSDK\Crm\Objects\SimplePublicObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\ContactsContract;

/**
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubspotSDK\Crm\Objects\PublicAssociationsForObject
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\Objects\FilterGroup
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ContactsService implements ContactsContract
{
    /**
     * @api
     */
    public ContactsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ContactsRawService($client);
    }

    /**
     * @api
     *
     * Create a task with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard tasks is provided.
     *
     * @param string $objectType object type
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
     * @param array<string,string> $properties key-value pairs for setting properties for the new object
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $objectType,
        array $associations,
        array $properties,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['associations' => $associations, 'properties' => $properties]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{taskId}`or optionally a unique property value as specified by the `idProperty` query param. `{taskId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $objectID Path param: Unique Task Id
     * @param string $objectType path param: Object type
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param: The name of a property whose values are unique for this object
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $objectType,
        array $properties,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'properties' => $properties,
                'idProperty' => $idProperty,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a page of tasks. Control what is returned via the `properties` query param.
     *
     * @param string $objectType object type
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of tasks that can be read by a single request.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        string $objectType,
        ?string $after = null,
        bool $archived = false,
        ?array $associations = null,
        int $limit = 10,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'archived' => $archived,
                'associations' => $associations,
                'limit' => $limit,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move an Object identified by `{taskId}` to the recycling bin.
     *
     * @param string $objectID Unique Task Id
     * @param string $objectType object type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['objectType' => $objectType]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType object type
     * @param string $objectID the ID of the contact to permanently delete
     * @param string $idProperty The name of a property whose values are unique for this object. An alternative to identifying a contact by ID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $objectType,
        string $objectID,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['objectID' => $objectID, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gdprDelete($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read an Object identified by `{taskId}`. `{taskId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param string $objectID Path param: Unique Task Id
     * @param string $objectType path param: Object type
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param list<string> $associations Query param: A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param string $idProperty Query param: The name of a property whose values are unique for this object
     * @param list<string> $properties Query param: A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory Query param: A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        string $objectType,
        bool $archived = false,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = Util::removeNulls(
            [
                'objectType' => $objectType,
                'archived' => $archived,
                'associations' => $associations,
                'idProperty' => $idProperty,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $objectType object type
     * @param string $objectIDToMerge the object ID of the record that the merge will not set as the current value after the merge
     * @param string $primaryObjectID the object ID of the record that the merge will generally set as the current value after the merge
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function merge(
        string $objectType,
        string $objectIDToMerge,
        string $primaryObjectID,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            [
                'objectIDToMerge' => $objectIDToMerge,
                'primaryObjectID' => $primaryObjectID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->merge($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Execute a search for tasks based on the provided criteria, including filters, properties, and sorting options. This allows for retrieving tasks that match specific conditions or property values.
     *
     * @param string $objectType object type
     * @param string $after a paging cursor token for retrieving subsequent pages
     * @param list<FilterGroup|FilterGroupShape> $filterGroups up to 6 groups of filters defining additional query criteria
     * @param int $limit the maximum results to return, up to 200 objects
     * @param list<string> $properties a list of property names to include in the response
     * @param list<string> $sorts specifies sorting order based on object properties
     * @param string $query the search query string, up to 3000 characters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        string $objectType,
        string $after,
        array $filterGroups,
        int $limit,
        array $properties,
        array $sorts,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'filterGroups' => $filterGroups,
                'limit' => $limit,
                'properties' => $properties,
                'sorts' => $sorts,
                'query' => $query,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search($objectType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
