<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\Objects;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubSpotSDK\Crm\FilterGroup;
use HubSpotSDK\Crm\Objects\PublicAssociationsForObject;
use HubSpotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubSpotSDK\Crm\SimplePublicObject;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\Objects\EmailsContract;
use HubSpotSDK\Services\Crm\Objects\Emails\BatchService;

/**
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubSpotSDK\Crm\Objects\PublicAssociationsForObject
 * @phpstan-import-type FilterGroupShape from \HubSpotSDK\Crm\FilterGroup
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class EmailsService implements EmailsContract
{
    /**
     * @api
     */
    public EmailsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a email with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard emails is provided.
     *
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
     * @param array<string,string> $properties key-value pairs for setting properties for the new object
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $associations,
        array $properties,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['associations' => $associations, 'properties' => $properties]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a partial update of an Object identified by `{emailId}`or optionally a unique property value as specified by the `idProperty` query param. `{emailId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $emailID Path param
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param: The name of a property whose values are unique for this object type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $emailID,
        array $properties,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['properties' => $properties, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read a page of emails. Control what is returned via the `properties` query param.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of objects that can be read by a single request.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
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
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Move an Object identified by `{emailId}` to the recycling bin.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($emailID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Read an Object identified by `{emailId}`. `{emailId}` refers to the internal object ID by default, or optionally any unique property value as specified by the `idProperty` query param.  Control what is returned via the `properties` query param.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param string $idProperty The name of a property whose values are unique for this object type
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $emailID,
        bool $archived = false,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObjectWithAssociations {
        $params = Util::removeNulls(
            [
                'archived' => $archived,
                'associations' => $associations,
                'idProperty' => $idProperty,
                'properties' => $properties,
                'propertiesWithHistory' => $propertiesWithHistory,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Perform a search for emails based on the provided query parameters and return matching results.
     *
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
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
