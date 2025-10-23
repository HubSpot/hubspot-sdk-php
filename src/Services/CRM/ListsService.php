<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Lists\ListCreateParams;
use HubspotSDK\CRM\Lists\ListCreateResponse;
use HubspotSDK\CRM\Lists\ListFetchResponse;
use HubspotSDK\CRM\Lists\ListGetByObjectTypeIDAndNameParams;
use HubspotSDK\CRM\Lists\ListGetParams;
use HubspotSDK\CRM\Lists\ListListParams;
use HubspotSDK\CRM\Lists\ListsByIDResponse;
use HubspotSDK\CRM\Lists\ListScheduleConversionParams;
use HubspotSDK\CRM\Lists\ListScheduleConversionParams\ConversionType;
use HubspotSDK\CRM\Lists\ListScheduleConversionParams\TimeUnit;
use HubspotSDK\CRM\Lists\ListSearchParams;
use HubspotSDK\CRM\Lists\ListSearchResponse;
use HubspotSDK\CRM\Lists\ListUpdateFiltersParams;
use HubspotSDK\CRM\Lists\ListUpdateNameParams;
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
use HubspotSDK\ServiceContracts\CRM\ListsContract;
use HubspotSDK\Services\CRM\Lists\FoldersService;
use HubspotSDK\Services\CRM\Lists\MappingService;
use HubspotSDK\Services\CRM\Lists\MembershipsService;

use const HubspotSDK\Core\OMIT as omit;

final class ListsService implements ListsContract
{
    /**
     * @@api
     */
    public FoldersService $folders;

    /**
     * @@api
     */
    public MappingService $mapping;

    /**
     * @@api
     */
    public MembershipsService $memberships;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
    ): ListCreateResponse {
        $params = [
            'name' => $name,
            'objectTypeID' => $objectTypeID,
            'processingType' => $processingType,
            'customProperties' => $customProperties,
            'filterBranch' => $filterBranch,
            'listFolderID' => $listFolderID,
            'listPermissions' => $listPermissions,
            'membershipSettings' => $membershipSettings,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): ListCreateResponse {
        [$parsed, $options] = ListCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/',
            body: (object) $parsed,
            options: $options,
            convert: ListCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch multiple lists in a single request by **ILS list ID**. The response will include the definitions of all lists that exist for the `listIds` provided.
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
    ): ListsByIDResponse {
        $params = ['includeFilters' => $includeFilters, 'listIDs' => $listIDs];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): ListsByIDResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/',
            query: $parsed,
            options: $options,
            convert: ListsByIDResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a list by **ILS list ID**. Lists deleted through this endpoint can be restored up to 90-days following the delete. After 90-days, the list is purged and can no longer be restored.
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete an existing scheduled conversion for a list.
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Fetch a single list by **ILS list ID**.
     *
     * @param bool $includeFilters A flag indicating whether or not the response object list definition should include a filter branch definition. By default, object list definitions will not have their filter branch definitions included in the response.
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        $includeFilters = omit,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse {
        $params = ['includeFilters' => $includeFilters];

        return $this->getRaw($listID, $params, $requestOptions);
    }

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
    ): ListFetchResponse {
        [$parsed, $options] = ListGetParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s', $listID],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch a single list by list name and object type.
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
    ): ListFetchResponse {
        $params = [
            'objectTypeID' => $objectTypeID, 'includeFilters' => $includeFilters,
        ];

        return $this->getByObjectTypeIDAndNameRaw(
            $listName,
            $params,
            $requestOptions
        );
    }

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
    ): ListFetchResponse {
        [$parsed, $options] = ListGetByObjectTypeIDAndNameParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'crm/v3/lists/object-type-id/%1$s/name/%2$s', $objectTypeID, $listName,
            ],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the conversion details for a list. This can be used to check for an upcoming conversion, or to get the details of when a list was already converted.
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): PublicListConversionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: PublicListConversionResponse::class,
        );
    }

    /**
     * @api
     *
     * Restore a previously deleted list by **ILS list ID**. Deleted lists are eligible to be restored up-to 90-days after the list has been deleted.
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/restore', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Schedule the conversion of an active list into a static list, or update the already scheduled conversion. This can be scheduled for a specific date or based on activity.
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
    ): PublicListConversionResponse {
        $params = [
            'conversionType' => $conversionType,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'offset' => $offset,
            'timeUnit' => $timeUnit,
        ];

        return $this->scheduleConversionRaw($listID, $params, $requestOptions);
    }

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
    ): PublicListConversionResponse {
        [$parsed, $options] = ListScheduleConversionParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            body: (object) $parsed,
            options: $options,
            convert: PublicListConversionResponse::class,
        );
    }

    /**
     * @api
     *
     * Search lists by list name or page through all lists by providing an empty `query` value.
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
    ): ListSearchResponse {
        $params = [
            'additionalProperties' => $additionalProperties,
            'count' => $count,
            'listIDs' => $listIDs,
            'offset' => $offset,
            'processingTypes' => $processingTypes,
            'query' => $query,
            'sort' => $sort,
        ];

        return $this->searchRaw($params, $requestOptions);
    }

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
    ): ListSearchResponse {
        [$parsed, $options] = ListSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/search',
            body: (object) $parsed,
            options: $options,
            convert: ListSearchResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the filter branch definition of a `DYNAMIC` list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
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
    ): ListUpdateResponse {
        $params = [
            'filterBranch' => $filterBranch,
            'enrollObjectsInWorkflows' => $enrollObjectsInWorkflows,
        ];

        return $this->updateFiltersRaw($listID, $params, $requestOptions);
    }

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
    ): ListUpdateResponse {
        [$parsed, $options] = ListUpdateFiltersParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['enrollObjectsInWorkflows'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/update-list-filters', $listID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
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
    ): ListUpdateResponse {
        $params = ['includeFilters' => $includeFilters, 'listName' => $listName];

        return $this->updateNameRaw($listID, $params, $requestOptions);
    }

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
    ): ListUpdateResponse {
        [$parsed, $options] = ListUpdateNameParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/update-list-name', $listID],
            query: $parsed,
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }
}
