<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Lists\ListCreateResponse;
use HubspotSDK\CRM\Lists\ListFetchResponse;
use HubspotSDK\CRM\Lists\ListsByIDResponse;
use HubspotSDK\CRM\Lists\ListScheduleConversionParams\ConversionType;
use HubspotSDK\CRM\Lists\ListScheduleConversionParams\TimeUnit;
use HubspotSDK\CRM\Lists\ListSearchResponse;
use HubspotSDK\CRM\Lists\ListUpdateResponse;
use HubspotSDK\CRM\Lists\PublicListConversionResponse;
use HubspotSDK\CRM\Lists\PublicListPermissions;
use HubspotSDK\CRM\Lists\PublicMembershipSettings;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ListsContract
{
    /**
     * @api
     *
     * @param string $name the name of the list, which must be globally unique across all public lists in the portal
     * @param string $objectTypeID the object type ID of the type of objects that the list will store
     * @param string $processingType The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     * @param array<string,
     * string,> $customProperties The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     * @param PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch
     * @param int $listFolderID The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     * @param PublicListPermissions $listPermissions
     * @param PublicMembershipSettings $membershipSettings
     *
     * @throws APIException
     */
    public function create(
        $name,
        $objectTypeID,
        $processingType,
        $customProperties = omit,
        $filterBranch = omit,
        $listFolderID = omit,
        $listPermissions = omit,
        $membershipSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): ListCreateResponse;

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
    ): ListCreateResponse;

    /**
     * @api
     *
     * @param bool $includeFilters A flag indicating whether or not the response object list definitions should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     * @param list<string> $listIDs the **ILS IDs** of the lists to fetch
     *
     * @throws APIException
     */
    public function list(
        $includeFilters = omit,
        $listIDs = omit,
        ?RequestOptions $requestOptions = null,
    ): ListsByIDResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListsByIDResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        $includeFilters = omit,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param string $objectTypeID
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndName(
        string $listName,
        $objectTypeID,
        $includeFilters = omit,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndNameRaw(
        string $listName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListFetchResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $day
     * @param int $month
     * @param int $year
     * @param int $offset
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     * @param ConversionType|value-of<ConversionType> $conversionType
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        $day,
        $month,
        $year,
        $offset,
        $timeUnit,
        $conversionType = 'INACTIVITY',
        ?RequestOptions $requestOptions = null,
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function scheduleConversionRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @param list<string> $additionalProperties The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     * @param int $count The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     * @param list<string> $listIDs The `listIds` that will be used to filter results by `listId`. If values are provided, then the response will only include results that have a `listId` in this array.
     *
     * If no value is provided, or if an empty list is provided, then the results will not be filtered by `listId`.
     * @param int $offset Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     * @param list<string> $processingTypes The `processingTypes` that will be used to filter results by `processingType`. If values are provided, then the response will only include results that have a `processingType` in this array.
     *
     * If no value is provided, or if an empty list is provided, then results will not be filtered by `processingType`.
     *
     * Valid `processingTypes` are: `MANUAL`, `SNAPSHOT`, or `DYNAMIC`.
     * @param string $query The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     * @param string $sort
     *
     * @throws APIException
     */
    public function search(
        $additionalProperties = omit,
        $count = omit,
        $listIDs = omit,
        $offset = omit,
        $processingTypes = omit,
        $query = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): ListSearchResponse;

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
    ): ListSearchResponse;

    /**
     * @api
     *
     * @param PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch
     * @param bool $enrollObjectsInWorkflows a flag indicating whether or not the memberships added to the list as a result of the filter change should be enrolled in workflows that are relevant to this list
     *
     * @throws APIException
     */
    public function updateFilters(
        string $listID,
        $filterBranch,
        $enrollObjectsInWorkflows = omit,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateFiltersRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     * @param string $listName the name to update the list to
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        $includeFilters = omit,
        $listName = omit,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateNameRaw(
        string $listID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListUpdateResponse;
}
