<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages;

use HubSpotSDK\Cms\Pages\Batch\BatchCreateFoldersParams;
use HubSpotSDK\Cms\Pages\Batch\BatchCreateLandingPagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchCreateSitePagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchDeleteFoldersParams;
use HubSpotSDK\Cms\Pages\Batch\BatchDeleteLandingPagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchDeleteSitePagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchGetLandingPagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchGetSitePagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchUpdateFoldersParams;
use HubSpotSDK\Cms\Pages\Batch\BatchUpdateLandingPagesParams;
use HubSpotSDK\Cms\Pages\Batch\BatchUpdateSitePagesParams;
use HubSpotSDK\Cms\Pages\BatchResponseContentFolder;
use HubSpotSDK\Cms\Pages\BatchResponsePage;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFolders(
        array|BatchCreateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createLandingPages(
        array|BatchCreateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createSitePages(
        array|BatchCreateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolders(
        array|BatchDeleteFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteLandingPages(
        array|BatchDeleteLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteSitePages(
        array|BatchDeleteSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getLandingPages(
        array|BatchGetLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getSitePages(
        array|BatchGetSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFolders(
        array|BatchUpdateFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateLandingPages(
        array|BatchUpdateLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateSitePages(
        array|BatchUpdateSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
