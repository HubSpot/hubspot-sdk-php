<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\FolderActionResponse;
use HubspotSDK\Files\Folders\FolderCreateParams;
use HubspotSDK\Files\Folders\FolderGetByIDParams;
use HubspotSDK\Files\Folders\FolderGetByPathParams;
use HubspotSDK\Files\Folders\FolderSearchParams;
use HubspotSDK\Files\Folders\FolderUpdateAsyncByIDParams;
use HubspotSDK\Files\Folders\FolderUpdateByIDParams;
use HubspotSDK\Files\FolderUpdateTaskLocator;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FoldersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|FolderCreateParams $params
     *
     * @return BaseResponse<Folder>
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
     * @param string $folderID ID of folder to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $folderPath Path of folder to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $folderID ID of desired folder
     * @param array<mixed>|FolderGetByIDParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $folderPath path of desired folder
     * @param array<mixed>|FolderGetByPathParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $taskID the ID of the folder update task
     *
     * @return BaseResponse<FolderActionResponse>
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderSearchParams $params
     *
     * @return BaseResponse<Page<Folder>>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderUpdateAsyncByIDParams $params
     *
     * @return BaseResponse<FolderUpdateTaskLocator>
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderUpdateByIDParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
