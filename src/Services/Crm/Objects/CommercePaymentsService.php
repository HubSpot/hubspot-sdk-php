<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FilterGroup;
use HubspotSDK\Crm\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\PublicAssociationsForObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\CommercePaymentsContract;
use HubspotSDK\Services\Crm\Objects\CommercePayments\BatchService;

/**
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubspotSDK\Crm\Objects\PublicAssociationsForObject
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\FilterGroup
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CommercePaymentsService implements CommercePaymentsContract
{
    /**
     * @api
     */
    public CommercePaymentsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CommercePaymentsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a single payment. Include a `properties` object to define [property values](https://developers.hubspot.com/docs/guides/api/crm/properties) for the {objectName}, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
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
     * Update a payment by ID (`objectId`) or unique property value (`idProperty`). Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $commercePaymentID Path param
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param: The name of a property whose values are unique for this object type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $commercePaymentID,
        array $properties,
        ?string $idProperty = null,
        RequestOptions|array|null $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['properties' => $properties, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($commercePaymentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all payments, using query parameters to specify the information that gets returned.
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
     * Delete a payment by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $commercePaymentID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($commercePaymentID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a payment by its ID (`objectId`) or by a unique property (`idProperty`). You can specify what is returned using the `properties` query parameter.
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
        string $commercePaymentID,
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
        $response = $this->raw->get($commercePaymentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search for payments by filtering on properties, searching through associations, and sorting results. Learn more about [CRM search](https://developers.hubspot.com/docs/guides/api/crm/search#make-a-search-request).
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
