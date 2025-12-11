<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Filter\Operator;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\CompaniesContract;
use HubspotSDK\Services\Crm\Objects\Companies\BatchService;

final class CompaniesService implements CompaniesContract
{
    /**
     * @api
     */
    public CompaniesRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CompaniesRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a single company. Include a `properties` object to define [property values](https://developers.hubspot.com/docs/guides/api/crm/properties) for the company, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
     *
     * @param list<array{
     *   to: array{id: string}|PublicObjectID,
     *   types: list<array{
     *     associationCategory: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|AssociationCategory,
     *     associationTypeID: int,
     *   }|AssociationSpec>,
     * }> $associations
     * @param array<string,string> $properties key-value pairs for setting properties for the new object
     *
     * @throws APIException
     */
    public function create(
        array $associations,
        array $properties,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject {
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
     * Update a company by ID (`companyId`) or unique property value (`idProperty`). Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
     *
     * @param string $companyID Path param:
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param: The name of a property whose values are unique for this object
     *
     * @throws APIException
     */
    public function update(
        string $companyID,
        array $properties,
        ?string $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            ['properties' => $properties, 'idProperty' => $idProperty]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all companies, using query parameters to control the information that gets returned.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of companies that can be read by a single request.
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
        ?RequestOptions $requestOptions = null,
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
     * Delete a company by ID. Deleted companies can be restored within 90 days of deletion. Learn more about [restoring records](https://knowledge.hubspot.com/records/restore-deleted-records).
     *
     * @throws APIException
     */
    public function delete(
        string $companyID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($companyID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a company by its ID (`companyId`) or by a unique property (`idProperty`). You can specify what is returned using the `properties` query parameter.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param string $idProperty The name of a property whose values are unique for this object
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored.
     *
     * @throws APIException
     */
    public function get(
        string $companyID,
        bool $archived = false,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        ?RequestOptions $requestOptions = null,
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
        $response = $this->raw->get($companyID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Merge two company records. Learn more about [merging records](https://knowledge.hubspot.com/records/merge-records).
     *
     * @param string $objectIDToMerge the unique identifier of the CRM object that will be merged into the primary object
     * @param string $primaryObjectID the unique identifier of the CRM object that will remain after the merge
     *
     * @throws APIException
     */
    public function merge(
        string $objectIDToMerge,
        string $primaryObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject {
        $params = Util::removeNulls(
            [
                'objectIDToMerge' => $objectIDToMerge,
                'primaryObjectID' => $primaryObjectID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->merge(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search for companies by filtering on properties, searching through associations, and sorting results. Learn more about [CRM search](https://developers.hubspot.com/docs/guides/api/crm/search#make-a-search-request).
     *
     * @param string $after a paging cursor token for retrieving subsequent pages
     * @param list<array{
     *   filters: list<array{
     *     operator: 'BETWEEN'|'CONTAINS_TOKEN'|'EQ'|'GT'|'GTE'|'HAS_PROPERTY'|'IN'|'LT'|'LTE'|'NEQ'|'NOT_CONTAINS_TOKEN'|'NOT_HAS_PROPERTY'|'NOT_IN'|Operator,
     *     propertyName: string,
     *     highValue?: string,
     *     value?: string,
     *     values?: list<string>,
     *   }>,
     * }> $filterGroups Up to 6 groups of filters defining additional query criteria
     * @param int $limit the maximum results to return, up to 200 objects
     * @param list<string> $properties a list of property names to include in the response
     * @param list<string> $sorts specifies sorting order based on object properties
     * @param string $query the search query string, up to 3000 characters
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
        ?RequestOptions $requestOptions = null,
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
