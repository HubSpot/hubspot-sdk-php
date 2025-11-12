<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

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

interface FoldersContract
{
    /**
     * @api
     *
     * @param array<mixed>|FolderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Folder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|FolderGetByIDParams $params
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder;

    /**
     * @api
     *
     * @param array<mixed>|FolderGetByPathParams $params
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FolderActionResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderSearchParams $params
     *
     * @return Page<Folder>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|FolderUpdateAsyncByIDParams $params
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): FolderUpdateTaskLocator;

    /**
     * @api
     *
     * @param array<mixed>|FolderUpdateByIDParams $params
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder;
}
