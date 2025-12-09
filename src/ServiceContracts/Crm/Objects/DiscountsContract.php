<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\CreatedResponseSimplePublicObject;
use HubspotSDK\Crm\Filter\Operator;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Crm\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface DiscountsContract
{
    /**
     * @api
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
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param string $discountID Path param:
     * @param array<string,string> $properties body param: Key value pairs representing the properties of the object
     * @param string $idProperty Query param: The name of a property whose values are unique for this object
     *
     * @throws APIException
     */
    public function update(
        string $discountID,
        array $properties,
        ?string $idProperty = null,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of discounts that can be read by a single request.
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
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $discountID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
        string $discountID,
        bool $archived = false,
        ?array $associations = null,
        ?string $idProperty = null,
        ?array $properties = null,
        ?array $propertiesWithHistory = null,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
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
    ): CollectionResponseWithTotalSimplePublicObject;
}
