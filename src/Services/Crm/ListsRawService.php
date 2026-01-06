<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\ListCreateParams;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListGetByObjectTypeIDAndNameParams;
use HubspotSDK\Crm\Lists\ListGetParams;
use HubspotSDK\Crm\Lists\ListListParams;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\ConversionType;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams\TimeUnit;
use HubspotSDK\Crm\Lists\ListSearchParams;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateFiltersParams;
use HubspotSDK\Crm\Lists\ListUpdateNameParams;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicListPermissions;
use HubspotSDK\Crm\Lists\PublicMembershipSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ListsRawContract;

final class ListsRawService implements ListsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new list with the provided object list definition.
     *
     * @param array{
     *   name: string,
     *   objectTypeID: string,
     *   processingType: string,
     *   customProperties?: array<string,string>,
     *   filterBranch?: array<string,mixed>,
     *   listFolderID?: int,
     *   listPermissions?: array{
     *     teamsWithEditAccess: list<int>, usersWithEditAccess: list<int>
     *   }|PublicListPermissions,
     *   membershipSettings?: array{
     *     includeUnassigned?: bool, membershipTeamID?: int
     *   }|PublicMembershipSettings,
     * }|ListCreateParams $params
     *
     * @return BaseResponse<ListCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ListCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   includeFilters?: bool, listIDs?: list<string>
     * }|ListListParams $params
     *
     * @return BaseResponse<ListsByIDResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/',
            query: Util::array_transform_keys($parsed, ['listIDs' => 'listIds']),
            options: $options,
            convert: ListsByIDResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a list by **ILS list ID**. Lists deleted through this endpoint can be restored up to 90-days following the delete. After 90-days, the list is purged and can no longer be restored.
     *
     * @param string $listID the **ILS ID** of the list to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the ID of the list that you want to cancel the conversion for
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the **ILS ID** of the list to fetch
     * @param array{includeFilters?: bool}|ListGetParams $params
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        array|ListGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $listName Path param: The name of the list to fetch. This is **not** case sensitive.
     * @param array{
     *   objectTypeID: string, includeFilters?: bool
     * }|ListGetByObjectTypeIDAndNameParams $params
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndName(
        string $listName,
        array|ListGetByObjectTypeIDAndNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetByObjectTypeIDAndNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the ID of the list to schedule the conversion for
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the **ILS ID** of the list to restore
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the ID of the list to schedule the conversion for
     * @param array{
     *   conversionType: 'INACTIVITY'|ConversionType,
     *   day: int,
     *   month: int,
     *   year: int,
     *   offset: int,
     *   timeUnit: 'DAY'|'MONTH'|'WEEK'|TimeUnit,
     * }|ListScheduleConversionParams $params
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        array|ListScheduleConversionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListScheduleConversionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   additionalProperties: list<string>,
     *   offset: int,
     *   count?: int,
     *   listIDs?: list<string>,
     *   processingTypes?: list<string>,
     *   query?: string,
     *   sort?: string,
     * }|ListSearchParams $params
     *
     * @return BaseResponse<ListSearchResponse>
     *
     * @throws APIException
     */
    public function search(
        array|ListSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ListSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $listID path param: The **ILS ID** of the list to update
     * @param array{
     *   filterBranch: array<string,mixed>, enrollObjectsInWorkflows?: bool
     * }|ListUpdateFiltersParams $params
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateFilters(
        string $listID,
        array|ListUpdateFiltersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateFiltersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['enrollObjectsInWorkflows'];

        // @phpstan-ignore-next-line return.type
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
     * @param string $listID the **ILS ID** of the list to update
     * @param array{
     *   includeFilters?: bool, listName?: string
     * }|ListUpdateNameParams $params
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        array|ListUpdateNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/update-list-name', $listID],
            query: $parsed,
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }
}
