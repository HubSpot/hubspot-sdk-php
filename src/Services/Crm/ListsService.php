<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\ListCreateParams;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListGetByObjectTypeIDAndNameParams;
use HubspotSDK\Crm\Lists\ListGetParams;
use HubspotSDK\Crm\Lists\ListListParams;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListScheduleConversionParams;
use HubspotSDK\Crm\Lists\ListSearchParams;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListUpdateFiltersParams;
use HubspotSDK\Crm\Lists\ListUpdateNameParams;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicListPermissions;
use HubspotSDK\Crm\Lists\PublicMembershipSettings;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\ListsContract;
use HubspotSDK\Services\Crm\Lists\FoldersService;
use HubspotSDK\Services\Crm\Lists\MappingService;
use HubspotSDK\Services\Crm\Lists\MembershipsService;

final class ListsService implements ListsContract
{
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
        $this->folders = new FoldersService($client);
        $this->mapping = new MappingService($client);
        $this->memberships = new MembershipsService($client);
    }

    /**
     * @api
     *
     * Create a new list with the provided object list definition.
     *
     * @param array{
     *   name: string,
     *   objectTypeId: string,
     *   processingType: string,
     *   customProperties?: array<string,string>,
     *   filterBranch?: array<string,mixed>,
     *   listFolderId?: int,
     *   listPermissions?: array{
     *     teamsWithEditAccess: list<int>, usersWithEditAccess: list<int>
     *   }|PublicListPermissions,
     *   membershipSettings?: array{
     *     includeUnassigned?: bool, membershipTeamId?: int
     *   }|PublicMembershipSettings,
     * }|ListCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ListCreateResponse {
        [$parsed, $options] = ListCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ListCreateResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/',
            body: (object) $parsed,
            options: $options,
            convert: ListCreateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch multiple lists in a single request by **ILS list ID**. The response will include the definitions of all lists that exist for the `listIds` provided.
     *
     * @param array{
     *   includeFilters?: bool, listIds?: list<string>
     * }|ListListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        ?RequestOptions $requestOptions = null
    ): ListsByIDResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ListsByIDResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/',
            query: $parsed,
            options: $options,
            convert: ListsByIDResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s', $listID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch a single list by **ILS list ID**.
     *
     * @param array{includeFilters?: bool}|ListGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        array|ListGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse {
        [$parsed, $options] = ListGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ListFetchResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s', $listID],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch a single list by list name and object type.
     *
     * @param array{
     *   objectTypeId: string, includeFilters?: bool
     * }|ListGetByObjectTypeIDAndNameParams $params
     *
     * @throws APIException
     */
    public function getByObjectTypeIDAndName(
        string $listName,
        array|ListGetByObjectTypeIDAndNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFetchResponse {
        [$parsed, $options] = ListGetByObjectTypeIDAndNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeId'];
        unset($parsed['objectTypeId']);

        /** @var BaseResponse<ListFetchResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'crm/v3/lists/object-type-id/%1$s/name/%2$s', $objectTypeID, $listName,
            ],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<PublicListConversionResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: PublicListConversionResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/restore', $listID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Schedule the conversion of an active list into a static list, or update the already scheduled conversion. This can be scheduled for a specific date or based on activity.
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PublicListConversionResponse {
        [$parsed, $options] = ListScheduleConversionParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PublicListConversionResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/schedule-conversion', $listID],
            body: (object) $parsed,
            options: $options,
            convert: PublicListConversionResponse::class,
        );

        return $response->parse();
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
     *   listIds?: list<string>,
     *   processingTypes?: list<string>,
     *   query?: string,
     *   sort?: string,
     * }|ListSearchParams $params
     *
     * @throws APIException
     */
    public function search(
        array|ListSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): ListSearchResponse {
        [$parsed, $options] = ListSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ListSearchResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/search',
            body: (object) $parsed,
            options: $options,
            convert: ListSearchResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the filter branch definition of a `DYNAMIC` list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
     *
     * @param array{
     *   filterBranch: array<string,mixed>, enrollObjectsInWorkflows?: bool
     * }|ListUpdateFiltersParams $params
     *
     * @throws APIException
     */
    public function updateFilters(
        string $listID,
        array|ListUpdateFiltersParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse {
        [$parsed, $options] = ListUpdateFiltersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['enrollObjectsInWorkflows'];

        /** @var BaseResponse<ListUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/update-list-filters', $listID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ListUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the name of a list. The name must be globally unique relative to all other public lists in the portal.
     *
     * @param array{
     *   includeFilters?: bool, listName?: string
     * }|ListUpdateNameParams $params
     *
     * @throws APIException
     */
    public function updateName(
        string $listID,
        array|ListUpdateNameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListUpdateResponse {
        [$parsed, $options] = ListUpdateNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ListUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/%1$s/update-list-name', $listID],
            query: $parsed,
            options: $options,
            convert: ListUpdateResponse::class,
        );

        return $response->parse();
    }
}
