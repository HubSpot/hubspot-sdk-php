<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Files;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\FolderActionResponse;
use HubSpotSDK\Files\Folders\FolderGetByIDParams;
use HubSpotSDK\Files\Folders\FolderGetByPathParams;
use HubSpotSDK\Files\Folders\FolderSearchParams;
use HubSpotSDK\Files\Folders\FolderUpdateAsyncByIDParams;
use HubSpotSDK\Files\Folders\FolderUpdateByIDParams;
use HubSpotSDK\Files\FolderUpdateTaskLocator;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FoldersRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByID(
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
    public function deleteByPath(
        string $folderPath,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetByPathParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FolderActionResponse>
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Folder>>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderUpdateAsyncByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FolderUpdateTaskLocator>
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderUpdateByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
