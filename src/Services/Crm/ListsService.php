<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\ConversionType;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\TimeUnit;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicListPermissions;
use HubspotSDK\Crm\Lists\PublicMembershipSettings;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ListsContract;
use HubspotSDK\Services\Crm\Lists\FoldersService;
use HubspotSDK\Services\Crm\Lists\MappingService;
use HubspotSDK\Services\Crm\Lists\MembershipsService;

/**
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListCreateParams\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubspotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubspotSDK\Crm\Lists\PublicMembershipSettings
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListUpdateFiltersParams\FilterBranch as FilterBranchShape1
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ListsService implements ListsContract
{
    /**
     * @api
     */
    public ListsRawService $raw;

    /**
     * @api
     */
    public FoldersService $folders;

    /**
     * @api
     */
    public MappingService $mapping;

    /**
     * @api
     */
    public MembershipsService $memberships;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ListsRawService($client);
        $this->folders = new FoldersService($client);
        $this->mapping = new MappingService($client);
        $this->memberships = new MembershipsService($client);
    }

    /**
     * @api
     *
     * Create a new list with the provided object list definition.
     *
     * @param string $name the name of the list, which must be globally unique across all public lists in the portal
     * @param string $objectTypeID the object type ID of the type of objects that the list will store
     * @param string $processingType The processing type of the list. One of: `SNAPSHOT`, `MANUAL`, or `DYNAMIC`.
     * @param array<string,string> $customProperties The list of custom properties to tie to the list. Custom property name is the key, the value is the value.
     * @param FilterBranchShape $filterBranch
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
     * Fetch multiple lists in a single request by **ILS list ID**. The response will include the definitions of all lists that exist for the `listIds` provided.
     *
     * @param bool $includeFilters A flag indicating whether or not the response object list definitions should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     * @param list<string> $listIDs the **ILS IDs** of the lists to fetch
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
     * Delete a list by **ILS list ID**. Lists deleted through this endpoint can be restored up to 90-days following the delete. After 90-days, the list is purged and can no longer be restored.
     *
     * @param string $listID the **ILS ID** of the list to delete
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
     * Delete an existing scheduled conversion for a list.
     *
     * @param string $listID the ID of the list that you want to cancel the conversion for
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
     * Fetch a single list by **ILS list ID**.
     *
     * @param string $listID the **ILS ID** of the list to fetch
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
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
     * Fetch a single list by list name and object type.
     *
     * @param string $listName Path param: The name of the list to fetch. This is **not** case sensitive.
     * @param string $objectTypeID Path param: The object type ID of the object types stored by the list to fetch. For example, `0-1` for a `CONTACT` list.
     * @param bool $includeFilters Query param: A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
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
     * Retrieve the conversion details for a list. This can be used to check for an upcoming conversion, or to get the details of when a list was already converted.
     *
     * @param string $listID the ID of the list to schedule the conversion for
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
     * Restore a previously deleted list by **ILS list ID**. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
     *
     * @param string $listID the **ILS ID** of the list to restore
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
     * Schedule the conversion of an active list into a static list, or update the already scheduled conversion. This can be scheduled for a specific date or based on activity.
     *
     * @param string $listID the ID of the list to schedule the conversion for
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     * @param ConversionType|value-of<ConversionType> $conversionType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scheduleConversion(
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
        $response = $this->raw->scheduleConversion($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search lists by list name or page through all lists by providing an empty `query` value.
     *
     * @param list<string> $additionalProperties The property names of any additional list properties to include in the response. Properties that do not exist or that are empty for a particular list are not included in the response.
     *
     * By default, all requests will fetch the following properties for each list: `hs_list_size`, `hs_last_record_added_at`, `hs_last_record_removed_at`, `hs_folder_name`, and `hs_list_reference_count`.
     * @param int $offset Value used to paginate through lists. The `offset` provided in the response can be used in the next request to fetch the next page of results. Defaults to `0` if no offset is provided.
     * @param int $count The number of lists to include in the response. Defaults to `20` if no value is provided. The max `count` is `500`.
     * @param list<string> $listIDs The `listIds` that will be used to filter results by `listId`. If values are provided, then the response will only include results that have a `listId` in this array.
     *
     * If no value is provided, or if an empty list is provided, then the results will not be filtered by `listId`.
     * @param list<string> $processingTypes The `processingTypes` that will be used to filter results by `processingType`. If values are provided, then the response will only include results that have a `processingType` in this array.
     *
     * If no value is provided, or if an empty list is provided, then results will not be filtered by `processingType`.
     *
     * Valid `processingTypes` are: `MANUAL`, `SNAPSHOT`, or `DYNAMIC`.
     * @param string $query The `query` that will be used to search for lists by list name. If no `query` is provided, then the results will include all lists.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function search(
        array $additionalProperties,
        int $offset,
        ?int $count = null,
        ?array $listIDs = null,
        ?array $processingTypes = null,
        ?string $query = null,
        ?string $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListSearchResponse {
        $params = Util::removeNulls(
            [
                'additionalProperties' => $additionalProperties,
                'offset' => $offset,
                'count' => $count,
                'listIDs' => $listIDs,
                'processingTypes' => $processingTypes,
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
     * Update the filter branch definition of a `DYNAMIC` list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
     *
     * @param string $listID path param: The **ILS ID** of the list to update
     * @param FilterBranchShape1 $filterBranch Body param
     * @param bool $enrollObjectsInWorkflows query param: A flag indicating whether or not the memberships added to the list as a result of the filter change should be enrolled in workflows that are relevant to this list
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateFilters(
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
        $response = $this->raw->updateFilters($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
     *
     * @param string $listID the **ILS ID** of the list to update
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     * @param string $listName the name to update the list to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        bool $includeFilters = false,
        ?string $listName = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListUpdateResponse {
        $params = Util::removeNulls(
            ['includeFilters' => $includeFilters, 'listName' => $listName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateName($listID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
