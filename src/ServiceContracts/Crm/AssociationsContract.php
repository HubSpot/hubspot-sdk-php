<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\ReportCreationResponse;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\FilterGroup;
use HubspotSDK\Crm\LabelsBetweenObjectPair;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type FilterGroupShape from \HubspotSDK\Crm\FilterGroup
 * @phpstan-import-type AssociationSpecShape from \HubspotSDK\AssociationSpec
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface AssociationsContract
{
    /**
     * @api
     *
     * @param string $toObjectType Path param
     * @param string $objectType Path param
     * @param string $objectID Path param
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit query param: The maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<MultiAssociatedObjectWithLabel>
     *
     * @throws APIException
     */
    public function list(
        string $toObjectType,
        string $objectType,
        string $objectID,
        ?string $after = null,
        int $limit = 500,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toObjectID,
        string $objectType,
        string $objectID,
        string $toObjectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        RequestOptions|array|null $requestOptions = null
    ): ReportCreationResponse;

    /**
     * @api
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
        string $objectType,
        string $after,
        array $filterGroups,
        int $limit,
        array $properties,
        array $sorts,
        ?string $query = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponseWithTotalSimplePublicObject;

    /**
     * @api
     *
     * @param string $toObjectID Path param
     * @param string $objectType Path param
     * @param string $objectID Path param
     * @param string $toObjectType Path param
     * @param list<AssociationSpec|AssociationSpecShape> $body Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateAssociationLabels(
        string $toObjectID,
        string $objectType,
        string $objectID,
        string $toObjectType,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): LabelsBetweenObjectPair;
}
