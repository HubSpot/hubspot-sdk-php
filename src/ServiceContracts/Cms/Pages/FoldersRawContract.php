<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Pages;

use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\ContentFolderVersion;
use HubspotSDK\Cms\Pages\Folders\FolderCreateFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderDeleteFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFolderParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFolderRevisionParams;
use HubspotSDK\Cms\Pages\Folders\FolderGetFoldersBatchParams;
use HubspotSDK\Cms\Pages\Folders\FolderListFolderRevisionsParams;
use HubspotSDK\Cms\Pages\Folders\FolderListFoldersParams;
use HubspotSDK\Cms\Pages\Folders\FolderRestoreFolderRevisionParams;
use HubspotSDK\Cms\Pages\Folders\FolderUpdateFolderParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FoldersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FolderCreateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function createFolder(
        array|FolderCreateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderDeleteFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|FolderDeleteFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|FolderGetFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolderVersion>
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|FolderGetFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetFoldersBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|FolderGetFoldersBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderListFolderRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolderVersion>>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|FolderListFolderRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderListFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function listFolders(
        array|FolderListFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderRestoreFolderRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|FolderRestoreFolderRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|FolderUpdateFolderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|FolderUpdateFolderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
