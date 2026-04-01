<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\APICollectionResponseRecordListMembership;
use HubspotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;
use HubspotSDK\Crm\Lists\JoinTimeAndRecordID;
use HubspotSDK\Crm\Lists\ListAddAndRemoveMembershipsParams;
use HubspotSDK\Crm\Lists\ListAddMembershipsFromParams;
use HubspotSDK\Crm\Lists\ListAddMembershipsParams;
use HubspotSDK\Crm\Lists\ListBatchReadMembershipsParams;
use HubspotSDK\Crm\Lists\ListCreateFolderParams;
use HubspotSDK\Crm\Lists\ListCreateIDMappingParams;
use HubspotSDK\Crm\Lists\ListCreateParams;
use HubspotSDK\Crm\Lists\ListCreateResponse;
use HubspotSDK\Crm\Lists\ListFetchResponse;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\Crm\Lists\ListGetByObjectTypeAndNameParams;
use HubspotSDK\Crm\Lists\ListGetIDMappingParams;
use HubspotSDK\Crm\Lists\ListGetMembershipsJoinOrderParams;
use HubspotSDK\Crm\Lists\ListGetParams;
use HubspotSDK\Crm\Lists\ListGetRecordMembershipsParams;
use HubspotSDK\Crm\Lists\ListGetSizeAndEditsHistoryBetweenParams;
use HubspotSDK\Crm\Lists\ListListBySearchParams;
use HubspotSDK\Crm\Lists\ListListFoldersParams;
use HubspotSDK\Crm\Lists\ListListMembershipsParams;
use HubspotSDK\Crm\Lists\ListListParams;
use HubspotSDK\Crm\Lists\ListMoveFolderParams;
use HubspotSDK\Crm\Lists\ListMoveListParams;
use HubspotSDK\Crm\Lists\ListRemoveMembershipsParams;
use HubspotSDK\Crm\Lists\ListRenameFolderParams;
use HubspotSDK\Crm\Lists\ListsByIDResponse;
use HubspotSDK\Crm\Lists\ListSearchResponse;
use HubspotSDK\Crm\Lists\ListSizeAndEditHistoryResponse;
use HubspotSDK\Crm\Lists\ListUpdateListFiltersParams;
use HubspotSDK\Crm\Lists\ListUpdateListNameParams;
use HubspotSDK\Crm\Lists\ListUpdateResponse;
use HubspotSDK\Crm\Lists\ListUpdateScheduleConversionParams;
use HubspotSDK\Crm\Lists\MembershipsUpdateResponse;
use HubspotSDK\Crm\Lists\PublicBatchMigrationMapping;
use HubspotSDK\Crm\Lists\PublicListConversionResponse;
use HubspotSDK\Crm\Lists\PublicMigrationMapping;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
