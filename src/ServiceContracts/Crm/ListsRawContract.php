<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
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
use HubSpotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubSpotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubSpotSDK\Crm\Lists\PublicListConversionResponse;
use HubSpotSDK\Crm\Lists\PublicMigrationMapping;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ListsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ListCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ListCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListsByIDResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ListListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListAddAndRemoveMembershipsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListAddMembershipsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListAddMembershipsFromParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListBatchReadMembershipsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseRecordIDWithMemberships>
     *
     * @throws APIException
     */
    public function batchReadMemberships(
        array|ListBatchReadMembershipsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListCreateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderCreateResponse>
     *
     * @throws APIException
     */
    public function createFolder(
        array|ListCreateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListCreateIDMappingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicBatchMigrationMapping>
     *
     * @throws APIException
     */
    public function createIDMapping(
        array|ListCreateIDMappingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListGetParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listName Path param
     * @param array<string,mixed>|ListGetByObjectTypeAndNameParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListGetIDMappingParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PublicMigrationMapping>
     *
     * @throws APIException
     */
    public function getIDMapping(
        array|ListGetIDMappingParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListGetMembershipsJoinOrderParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListGetRecordMembershipsParams $params
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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListGetSizeAndEditsHistoryBetweenParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListListBySearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListSearchResponse>
     *
     * @throws APIException
     */
    public function listBySearch(
        array|ListListBySearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListListFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function listFolders(
        array|ListListFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListListMembershipsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListMoveFolderParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListMoveListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function moveList(
        array|ListMoveListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListRemoveMembershipsParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListRenameFolderParams $params
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
    ): BaseResponse;

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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID Path param
     * @param array<string,mixed>|ListUpdateListFiltersParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListUpdateListNameParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ListUpdateScheduleConversionParams $params
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
    ): BaseResponse;
}
