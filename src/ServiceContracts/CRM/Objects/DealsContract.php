<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\CRM\Objects\CreatedResponseSimplePublicObject;
use HubspotSDK\CRM\Objects\FilterGroup;
use HubspotSDK\CRM\Objects\PublicAssociationsForObject;
use HubspotSDK\CRM\Objects\SimplePublicObject;
use HubspotSDK\CRM\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface DealsContract
{
    /**
     * @api
     *
     * @param array<string, string> $properties the company property values to set
     * @param list<PublicAssociationsForObject> $associations
     *
     * @throws APIException
     */
    public function create(
        $properties,
        $associations = omit,
        ?RequestOptions $requestOptions = null,
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreatedResponseSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, string> $properties the company property values to set
     * @param string $idProperty The name of a property whose values are unique for this object
     *
     * @throws APIException
     */
    public function update(
        string $dealID,
        $properties,
        $idProperty = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<string> $associations A comma separated list of object types to retrieve associated IDs for. If any of the specified associations do not exist, they will be ignored.
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $properties A comma separated list of the properties to be returned in the response. If any of the specified properties are not present on the requested object(s), they will be ignored.
     * @param list<string> $propertiesWithHistory A comma separated list of the properties to be returned along with their history of previous values. If any of the specified properties are not present on the requested object(s), they will be ignored. Usage of this parameter will reduce the maximum number of deals that can be read by a single request.
     *
     * @return Page<SimplePublicObjectWithAssociations>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $associations = omit,
        $limit = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

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
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $dealID,
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
        string $dealID,
        $archived = omit,
        $associations = omit,
        $idProperty = omit,
        $properties = omit,
        $propertiesWithHistory = omit,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $dealID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObjectWithAssociations;

    /**
     * @api
     *
     * @param string $objectIDToMerge the ID of the company to merge into the primary
     * @param string $primaryObjectID the ID of the primary company, which the other will merge into
     *
     * @throws APIException
     */
    public function merge(
        $objectIDToMerge,
        $primaryObjectID,
        ?RequestOptions $requestOptions = null,
    ): SimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function mergeRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SimplePublicObject;

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
        $after = omit,
        $filterGroups = omit,
        $limit = omit,
        $properties = omit,
        $query = omit,
        $sorts = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalSimplePublicObject;
}
