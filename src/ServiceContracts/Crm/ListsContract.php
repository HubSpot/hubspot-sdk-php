<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Lists\APICollectionResponseRecordListMembership;
use HubSpotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;
use HubSpotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubSpotSDK\Crm\Lists\ListCreateResponse;
use HubSpotSDK\Crm\Lists\ListFetchResponse;
use HubSpotSDK\Crm\Lists\ListFolderCreateResponse;
use HubSpotSDK\Crm\Lists\ListFolderFetchResponse;
use HubSpotSDK\Crm\Lists\ListsByIDResponse;
use HubSpotSDK\Crm\Lists\ListSearchResponse;
use HubSpotSDK\Crm\Lists\ListSizeAndEditHistoryResponse;
use HubSpotSDK\Crm\Lists\ListUpdateResponse;
use HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams\ConversionType;
use HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams\TimeUnit;
use HubSpotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubSpotSDK\Crm\Lists\PublicAndFilterBranch;
use HubSpotSDK\Crm\Lists\PublicAssociationFilterBranch;
use HubSpotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubSpotSDK\Crm\Lists\PublicListConversionResponse;
use HubSpotSDK\Crm\Lists\PublicListPermissions;
use HubSpotSDK\Crm\Lists\PublicMembershipSettings;
use HubSpotSDK\Crm\Lists\PublicMigrationMapping;
use HubSpotSDK\Crm\Lists\PublicNotAllFilterBranch;
use HubSpotSDK\Crm\Lists\PublicNotAnyFilterBranch;
use HubSpotSDK\Crm\Lists\PublicOrFilterBranch;
use HubSpotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch;
use HubSpotSDK\Crm\Lists\PublicRestrictedFilterBranch;
use HubSpotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch;
use HubSpotSDK\Crm\Lists\RecordIDInput;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListCreateParams\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubSpotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubSpotSDK\Crm\Lists\PublicMembershipSettings
 * @phpstan-import-type RecordIDInputShape from \HubSpotSDK\Crm\Lists\RecordIDInput
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch as FilterBranchShape1
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ListsContract
{
    /**
     * @api
     *
     * @param string $name the name of the list, which must be globally unique across all public lists in the portal
     * @param string $objectTypeID the object type ID of the type of objects that the list will store
     * @param string $processingType The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     * @param array<string,string> $customProperties The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     * @param FilterBranchShape $filterBranch Filter branch object containing filtering criteria for the list
     * @param int $listFolderID The ID of the folder that the list should be created in. If left blank, then the list will be created in the root of the list folder structure.
     * @param PublicListPermissions|PublicListPermissionsShape $listPermissions
     * @param PublicMembershipSettings|PublicMembershipSettingsShape $membershipSettings
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $objectTypeID,
        string $processingType,
        ?array $customProperties = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
        ?int $listFolderID = null,
        PublicListPermissions|array|null $listPermissions = null,
        PublicMembershipSettings|array|null $membershipSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListCreateResponse;

    /**
     * @api
     *
     * @param list<string> $listIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        bool $includeFilters = false,
        ?array $listIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListsByIDResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $recordIDsToAdd
     * @param list<string> $recordIDsToRemove
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addAndRemoveMemberships(
        string $listID,
        array $recordIDsToAdd,
        array $recordIDsToRemove,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addMemberships(
        string $listID,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addMembershipsFrom(
        string $sourceListID,
        string $listID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<RecordIDInput|RecordIDInputShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchReadMemberships(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseRecordIDWithMemberships;

    /**
     * @api
     *
     * @param string $name the name of the folder to be created
     * @param string $parentFolderID the folder this should be created in, if not specified will be created in the root folder 0
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createFolder(
        string $name,
        ?string $parentFolderID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderCreateResponse;

    /**
     * @api
     *
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createIDMapping(
        array $body,
        RequestOptions|array|null $requestOptions = null
    ): PublicBatchMigrationMapping;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteMemberships(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        bool $includeFilters = false,
        RequestOptions|array|null $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param string $listName Path param
     * @param string $objectTypeID Path param
     * @param bool $includeFilters Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByObjectTypeAndName(
        string $listName,
        string $objectTypeID,
        bool $includeFilters = false,
        RequestOptions|array|null $requestOptions = null,
    ): ListFetchResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getIDMapping(
        ?string $legacyListID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicMigrationMapping;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function getMembershipsJoinOrder(
        string $listID,
        ?string $after = null,
        ?string $before = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRecordMemberships(
        string $recordID,
        string $objectTypeID,
        RequestOptions|array|null $requestOptions = null,
    ): APICollectionResponseRecordListMembership;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): PublicListConversionResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSizeAndEditsHistoryBetween(
        string $listID,
        ?\DateTimeInterface $endDate = null,
        ?\DateTimeInterface $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListSizeAndEditHistoryResponse;

    /**
     * @api
     *
     * @param list<string> $listIDs ILS list ids to be included in search results. If not specified, all lists matching other criteria will be included
     * @param int $offset Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     * @param list<string> $processingTypes List processing types to be included in search results. If not specified, all lists with all processing types will be included.
     * @param list<string> $additionalFilterProperties The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     * @param int $count The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     * @param string $query The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     * @param string $sort Sort field and order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listBySearch(
        array $listIDs,
        int $offset,
        array $processingTypes,
        ?array $additionalFilterProperties = null,
        ?int $count = null,
        ?string $objectTypeID = null,
        ?string $query = null,
        ?string $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListSearchResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listFolders(
        string $folderID = '0',
        RequestOptions|array|null $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<JoinTimeAndRecordID>
     *
     * @throws APIException
     */
    public function listMemberships(
        string $listID,
        ?string $after = null,
        ?string $before = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function moveFolder(
        string $newParentFolderID,
        string $folderID,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $listID the Id of the list to move
     * @param string $newFolderID the Id of folder to move the list to, the root folder is Id 0
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function moveList(
        string $listID,
        string $newFolderID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removeMemberships(
        string $listID,
        array $body,
        RequestOptions|array|null $requestOptions = null,
    ): MembershipsUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function renameFolder(
        string $folderID,
        ?string $newFolderName = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $listID Path param
     * @param FilterBranchShape1 $filterBranch Body param: Updated filtering criteria for the list
     * @param bool $enrollObjectsInWorkflows Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateListFilters(
        string $listID,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
        bool $enrollObjectsInWorkflows = false,
        RequestOptions|array|null $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateListName(
        string $listID,
        bool $includeFilters = false,
        ?string $listName = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListUpdateResponse;

    /**
     * @api
     *
     * @param int $day the day component of the conversion date
     * @param int $month the month component of the conversion date
     * @param int $year the year component of the conversion date
     * @param int $offset Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     * @param TimeUnit|value-of<TimeUnit> $timeUnit the unit of time for the inactivity period, such as (DAY, MONTH, WEEK)
     * @param ConversionType|value-of<ConversionType> $conversionType specifies the type of conversion (INACTIVITY)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateScheduleConversion(
        string $listID,
        int $day,
        int $month,
        int $year,
        int $offset,
        TimeUnit|string $timeUnit,
        ConversionType|string $conversionType = 'INACTIVITY',
        RequestOptions|array|null $requestOptions = null,
    ): PublicListConversionResponse;
}
