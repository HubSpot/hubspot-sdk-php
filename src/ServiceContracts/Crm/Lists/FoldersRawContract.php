<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Folders\FolderCreateParams;
use HubspotSDK\Crm\Lists\Folders\FolderGetParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveListParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveParams;
use HubspotSDK\Crm\Lists\Folders\FolderRenameParams;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;

interface FoldersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FolderCreateParams $params
     *
     * @return BaseResponse<ListFolderCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetParams $params
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        array|FolderGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $newParentFolderID the ID for the target parent folder
     * @param array<string,mixed>|FolderMoveParams $params
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        array|FolderMoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderMoveListParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function moveList(
        array|FolderMoveListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to rename
     * @param array<string,mixed>|FolderRenameParams $params
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        array|FolderRenameParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
