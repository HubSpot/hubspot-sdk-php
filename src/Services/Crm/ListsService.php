<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembership;
use HubspotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\ListUpdateScheduleConversionParams\ConversionType;
use HubspotSDK\Crm\Lists\ListUpdateScheduleConversionParams\TimeUnit;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Crm\Lists\PublicAndFilterBranch;
use HubspotSDK\Crm\Lists\PublicAssociationFilterBranch;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicListPermissions;
use HubspotSDK\Crm\Lists\PublicMembershipSettings;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\Crm\Lists\PublicNotAllFilterBranch;
use HubspotSDK\Crm\Lists\PublicNotAnyFilterBranch;
use HubspotSDK\Crm\Lists\PublicOrFilterBranch;
use HubspotSDK\Crm\Lists\PublicPropertyAssociationFilterBranch;
use HubspotSDK\Crm\Lists\PublicRestrictedFilterBranch;
use HubspotSDK\Crm\Lists\PublicUnifiedEventsFilterBranch;
use HubspotSDK\Crm\Lists\RecordIDInput;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ListsContract;

/**
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListCreateParams\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubspotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubspotSDK\Crm\Lists\PublicMembershipSettings
 * @phpstan-import-type RecordIDInputShape from \HubspotSDK\Crm\Lists\RecordIDInput
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch as FilterBranchShape1
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
    }

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
    ): ListCreateResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'objectTypeID' => $objectTypeID,
                'processingType' => $processingType,
                'customProperties' => $customProperties,
                'filterBranch' => $filterBranch,
                'listFolderID' => $listFolderID,
                'listPermissions' => $listPermissions,
                'membershipSettings' => $membershipSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListsByIDResponse {
        $params = Util::removeNulls(
            ['includeFilters' => $includeFilters, 'listIDs' => $listIDs]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(
            [
                'recordIDsToAdd' => $recordIDsToAdd,
                'recordIDsToRemove' => $recordIDsToRemove,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addAndRemoveMemberships($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addMemberships($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(['listID' => $listID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addMembershipsFrom($sourceListID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): BatchResponseRecordIDWithMemberships {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchReadMemberships(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListFolderCreateResponse {
        $params = Util::removeNulls(
            ['name' => $name, 'parentFolderID' => $parentFolderID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createFolder(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PublicBatchMigrationMapping {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createIDMapping(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteFolder($folderID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteMemberships($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteScheduleConversion($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListFetchResponse {
        $params = Util::removeNulls(['includeFilters' => $includeFilters]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    public function getByObjectTypeIDAndName(
        string $listName,
        string $objectTypeID,
        bool $includeFilters = false,
        RequestOptions|array|null $requestOptions = null,
    ): ListFetchResponse {
        $params = Util::removeNulls(
            ['objectTypeID' => $objectTypeID, 'includeFilters' => $includeFilters]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByObjectTypeIDAndName($listName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PublicMigrationMapping {
        $params = Util::removeNulls(['legacyListID' => $legacyListID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getIDMapping(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): APICollectionResponseRecordListMembership {
        $params = Util::removeNulls(['objectTypeID' => $objectTypeID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRecordMemberships($recordID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PublicListConversionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getScheduleConversion($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListFolderFetchResponse {
        $params = Util::removeNulls(['folderID' => $folderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listFolders(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMemberships($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    public function listMembershipsJoinOrder(
        string $listID,
        ?string $after = null,
        ?string $before = null,
        int $limit = 100,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMembershipsJoinOrder($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListFolderFetchResponse {
        $params = Util::removeNulls(['folderID' => $folderID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->moveFolder($newParentFolderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        $params = Util::removeNulls(
            ['listID' => $listID, 'newFolderID' => $newFolderID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->moveList(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): MembershipsUpdateResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->removeMemberships($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListFolderFetchResponse {
        $params = Util::removeNulls(['newFolderName' => $newFolderName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->renameFolder($folderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restore($listID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param list<string> $additionalProperties The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     * @param list<string> $listIDs ILS list ids to be included in search results. If not specified, all lists matching other criteria will be included
     * @param int $offset Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     * @param list<string> $processingTypes List processing types to be included in search results. If not specified, all lists with all processing types will be included.
     * @param int $count The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     * @param string $query The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     * @param string $sort Sort field and order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        array $additionalProperties,
        array $listIDs,
        int $offset,
        array $processingTypes,
        ?int $count = null,
        ?string $objectTypeID = null,
        ?string $query = null,
        ?string $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListSearchResponse {
        $params = Util::removeNulls(
            [
                'additionalProperties' => $additionalProperties,
                'listIDs' => $listIDs,
                'offset' => $offset,
                'processingTypes' => $processingTypes,
                'count' => $count,
                'objectTypeID' => $objectTypeID,
                'query' => $query,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListUpdateResponse {
        $params = Util::removeNulls(
            [
                'filterBranch' => $filterBranch,
                'enrollObjectsInWorkflows' => $enrollObjectsInWorkflows,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateListFilters($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): ListUpdateResponse {
        $params = Util::removeNulls(
            ['includeFilters' => $includeFilters, 'listName' => $listName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateListName($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
    ): PublicListConversionResponse {
        $params = Util::removeNulls(
            [
                'conversionType' => $conversionType,
                'day' => $day,
                'month' => $month,
                'year' => $year,
                'offset' => $offset,
                'timeUnit' => $timeUnit,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateScheduleConversion($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
