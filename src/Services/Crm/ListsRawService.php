<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Lists\APICollectionResponseRecordListMembership;
use HubSpotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;
use HubSpotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubSpotSDK\Crm\Lists\ListAddAndRemoveMembershipsParams;
use HubSpotSDK\Crm\Lists\ListAddMembershipsFromParams;
use HubSpotSDK\Crm\Lists\ListAddMembershipsParams;
use HubSpotSDK\Crm\Lists\ListBatchReadMembershipsParams;
use HubSpotSDK\Crm\Lists\ListCreateFolderParams;
use HubSpotSDK\Crm\Lists\ListCreateIDMappingParams;
use HubSpotSDK\Crm\Lists\ListCreateParams;
use HubSpotSDK\Crm\Lists\ListCreateResponse;
use HubSpotSDK\Crm\Lists\ListFetchResponse;
use HubSpotSDK\Crm\Lists\ListFolderCreateResponse;
use HubSpotSDK\Crm\Lists\ListFolderFetchResponse;
use HubSpotSDK\Crm\Lists\ListGetByObjectTypeAndNameParams;
use HubSpotSDK\Crm\Lists\ListGetIDMappingParams;
use HubSpotSDK\Crm\Lists\ListGetMembershipsJoinOrderParams;
use HubSpotSDK\Crm\Lists\ListGetParams;
use HubSpotSDK\Crm\Lists\ListGetRecordMembershipsParams;
use HubSpotSDK\Crm\Lists\ListGetSizeAndEditsHistoryBetweenParams;
use HubSpotSDK\Crm\Lists\ListListBySearchParams;
use HubSpotSDK\Crm\Lists\ListListFoldersParams;
use HubSpotSDK\Crm\Lists\ListListMembershipsParams;
use HubSpotSDK\Crm\Lists\ListListParams;
use HubSpotSDK\Crm\Lists\ListMoveFolderParams;
use HubSpotSDK\Crm\Lists\ListMoveListParams;
use HubSpotSDK\Crm\Lists\ListRemoveMembershipsParams;
use HubSpotSDK\Crm\Lists\ListRenameFolderParams;
use HubSpotSDK\Crm\Lists\ListsByIDResponse;
use HubSpotSDK\Crm\Lists\ListSearchResponse;
use HubSpotSDK\Crm\Lists\ListSizeAndEditHistoryResponse;
use HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams;
use HubSpotSDK\Crm\Lists\ListUpdateListNameParams;
use HubSpotSDK\Crm\Lists\ListUpdateResponse;
use HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams;
use HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams\ConversionType;
use HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams\TimeUnit;
use HubSpotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubSpotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubSpotSDK\Crm\Lists\PublicListConversionResponse;
use HubSpotSDK\Crm\Lists\PublicListPermissions;
use HubSpotSDK\Crm\Lists\PublicMembershipSettings;
use HubSpotSDK\Crm\Lists\PublicMigrationMapping;
use HubSpotSDK\Crm\Lists\RecordIDInput;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\ListsRawContract;

/**
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListCreateParams\FilterBranch
 * @phpstan-import-type PublicListPermissionsShape from \HubSpotSDK\Crm\Lists\PublicListPermissions
 * @phpstan-import-type PublicMembershipSettingsShape from \HubSpotSDK\Crm\Lists\PublicMembershipSettings
 * @phpstan-import-type RecordIDInputShape from \HubSpotSDK\Crm\Lists\RecordIDInput
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch as FilterBranchShape1
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
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
     * @param array{
     *   name: string,
     *   objectTypeID: string,
     *   processingType: string,
     *   customProperties?: array<string,string>,
     *   filterBranch?: FilterBranchShape,
     *   listFolderID?: int,
     *   listPermissions?: PublicListPermissions|PublicListPermissionsShape,
     *   membershipSettings?: PublicMembershipSettings|PublicMembershipSettingsShape,
     * }|ListCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/lists/2026-03',
            body: (object) $parsed,
            options: $options,
            convert: ListCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   includeFilters?: bool, listIDs?: list<string>
     * }|ListListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListsByIDResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/lists/2026-03',
            query: Util::array_transform_keys($parsed, ['listIDs' => 'listIds']),
            options: $options,
            convert: ListsByIDResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/lists/2026-03/%1$s', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   recordIDsToAdd: list<string>, recordIDsToRemove: list<string>
     * }|ListAddAndRemoveMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function addAndRemoveMemberships(
        string $listID,
        array|ListAddAndRemoveMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListAddAndRemoveMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/memberships/add-and-remove', $listID],
            body: (object) $parsed,
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{body: list<string>}|ListAddMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function addMemberships(
        string $listID,
        array|ListAddMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListAddMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/memberships/add', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{listID: string}|ListAddMembershipsFromParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addMembershipsFrom(
        string $sourceListID,
        array|ListAddMembershipsFromParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListAddMembershipsFromParams::parseRequest(
            $params,
            $requestOptions,
        );
        $listID = $parsed['listID'];
        unset($parsed['listID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/lists/2026-03/%1$s/memberships/add-from/%2$s',
                $listID,
                $sourceListID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   inputs: list<RecordIDInput|RecordIDInputShape>
     * }|ListBatchReadMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseRecordIDWithMemberships>
     *
     * @throws APIException
     */
    public function batchReadMemberships(
        array|ListBatchReadMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListBatchReadMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/lists/2026-03/records/memberships/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseRecordIDWithMemberships::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   name: string, parentFolderID?: string
     * }|ListCreateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderCreateResponse>
     *
     * @throws APIException
     */
    public function createFolder(
        array|ListCreateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListCreateFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/lists/2026-03/folders',
            body: (object) $parsed,
            options: $options,
            convert: ListFolderCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{body: list<string>}|ListCreateIDMappingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBatchMigrationMapping>
     *
     * @throws APIException
     */
    public function createIDMapping(
        array|ListCreateIDMappingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListCreateIDMappingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/lists/2026-03/idmapping',
            body: $parsed['body'],
            options: $options,
            convert: PublicBatchMigrationMapping::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/lists/2026-03/folders/%1$s', $folderID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteMemberships(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/lists/2026-03/%1$s/memberships', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{includeFilters?: bool}|ListGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        string $listID,
        array|ListGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/lists/2026-03/%1$s', $listID],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param string $listName Path param
     * @param array{
     *   objectTypeID: string, includeFilters?: bool
     * }|ListGetByObjectTypeAndNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFetchResponse>
     *
     * @throws APIException
     */
    public function getByObjectTypeAndName(
        string $listName,
        array|ListGetByObjectTypeAndNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetByObjectTypeAndNameParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/lists/2026-03/object-type-id/%1$s/name/%2$s',
                $objectTypeID,
                $listName,
            ],
            query: $parsed,
            options: $options,
            convert: ListFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{legacyListID?: string}|ListGetIDMappingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicMigrationMapping>
     *
     * @throws APIException
     */
    public function getIDMapping(
        array|ListGetIDMappingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetIDMappingParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/lists/2026-03/idmapping',
            query: Util::array_transform_keys(
                $parsed,
                ['legacyListID' => 'legacyListId']
            ),
            options: $options,
            convert: PublicMigrationMapping::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|ListGetMembershipsJoinOrderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function getMembershipsJoinOrder(
        string $listID,
        array|ListGetMembershipsJoinOrderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetMembershipsJoinOrderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/lists/2026-03/%1$s/memberships/join-order', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{objectTypeID: string}|ListGetRecordMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<APICollectionResponseRecordListMembership>
     *
     * @throws APIException
     */
    public function getRecordMemberships(
        string $recordID,
        array|ListGetRecordMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetRecordMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectTypeID = $parsed['objectTypeID'];
        unset($parsed['objectTypeID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'crm/lists/2026-03/records/%1$s/%2$s/memberships',
                $objectTypeID,
                $recordID,
            ],
            options: $options,
            convert: APICollectionResponseRecordListMembership::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function getScheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/lists/2026-03/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: PublicListConversionResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   endDate?: string, startDate?: string
     * }|ListGetSizeAndEditsHistoryBetweenParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListSizeAndEditHistoryResponse>
     *
     * @throws APIException
     */
    public function getSizeAndEditsHistoryBetween(
        string $listID,
        array|ListGetSizeAndEditsHistoryBetweenParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListGetSizeAndEditsHistoryBetweenParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/lists/2026-03/%1$s/size-and-edits-history/between', $listID],
            query: $parsed,
            options: $options,
            convert: ListSizeAndEditHistoryResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   listIDs: list<string>,
     *   offset: int,
     *   processingTypes: list<string>,
     *   additionalFilterProperties?: list<string>,
     *   count?: int,
     *   objectTypeID?: string,
     *   query?: string,
     *   sort?: string,
     * }|ListListBySearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListSearchResponse>
     *
     * @throws APIException
     */
    public function listBySearch(
        array|ListListBySearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListBySearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/lists/2026-03/search',
            body: (object) $parsed,
            options: $options,
            convert: ListSearchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{folderID?: string}|ListListFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function listFolders(
        array|ListListFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/lists/2026-03/folders',
            query: Util::array_transform_keys($parsed, ['folderID' => 'folderId']),
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|ListListMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<JoinTimeAndRecordID>>
     *
     * @throws APIException
     */
    public function listMemberships(
        string $listID,
        array|ListListMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['crm/lists/2026-03/%1$s/memberships', $listID],
            query: $parsed,
            options: $options,
            convert: JoinTimeAndRecordID::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{folderID: string}|ListMoveFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function moveFolder(
        string $newParentFolderID,
        array|ListMoveFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListMoveFolderParams::parseRequest(
            $params,
            $requestOptions,
        );
        $folderID = $parsed['folderID'];
        unset($parsed['folderID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/lists/2026-03/folders/%1$s/move/%2$s',
                $folderID,
                $newParentFolderID,
            ],
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{listID: string, newFolderID: string}|ListMoveListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function moveList(
        array|ListMoveListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListMoveListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'crm/lists/2026-03/folders/move-list',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{body: list<string>}|ListRemoveMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MembershipsUpdateResponse>
     *
     * @throws APIException
     */
    public function removeMemberships(
        string $listID,
        array|ListRemoveMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListRemoveMembershipsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/memberships/remove', $listID],
            body: $parsed['body'],
            options: $options,
            convert: MembershipsUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{newFolderName?: string}|ListRenameFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function renameFolder(
        string $folderID,
        array|ListRenameFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListRenameFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/folders/%1$s/rename', $folderID],
            query: $parsed,
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function restore(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/restore', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function scheduleConversion(
        string $listID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/lists/2026-03/%1$s/schedule-conversion', $listID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param string $listID Path param
     * @param array{
     *   filterBranch: FilterBranchShape1, enrollObjectsInWorkflows?: bool
     * }|ListUpdateListFiltersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateListFilters(
        string $listID,
        array|ListUpdateListFiltersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateListFiltersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['enrollObjectsInWorkflows']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/update-list-filters', $listID],
            query: array_intersect_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   includeFilters?: bool, listName?: string
     * }|ListUpdateListNameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function updateListName(
        string $listID,
        array|ListUpdateListNameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateListNameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/update-list-name', $listID],
            query: $parsed,
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   conversionType: ConversionType|value-of<ConversionType>,
     *   day: int,
     *   month: int,
     *   year: int,
     *   offset: int,
     *   timeUnit: TimeUnit|value-of<TimeUnit>,
     * }|ListUpdateScheduleConversionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicListConversionResponse>
     *
     * @throws APIException
     */
    public function updateScheduleConversion(
        string $listID,
        array|ListUpdateScheduleConversionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateScheduleConversionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/lists/2026-03/%1$s/schedule-conversion', $listID],
            body: (object) $parsed,
            options: $options,
            convert: PublicListConversionResponse::class,
        );
    }
}
