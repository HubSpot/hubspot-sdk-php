<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages;

use HubSpotSDK\Cms\Pages\BatchResponseContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolderVersion;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderBatchGetParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderCreateFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderCreateParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderDeleteFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderDeleteParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderGetParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderGetRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderListParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderListRevisionsParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderRestoreRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderUpdateFoldersParams;
use HubSpotSDK\Cms\Pages\LandingPages\Folders\FolderUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
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
     * @param array<string,mixed>|FolderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID Path param
     * @param array<string,mixed>|FolderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|FolderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function list(
        array|FolderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|FolderDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderBatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function batchGet(
        array|FolderBatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderCreateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFolders(
        array|FolderCreateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderDeleteFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolders(
        array|FolderDeleteFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|FolderGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolderVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|FolderGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContentFolderVersion>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|FolderListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|FolderRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FolderUpdateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFolders(
        array|FolderUpdateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
