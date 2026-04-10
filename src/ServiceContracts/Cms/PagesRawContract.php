<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Cms\Pages\PageGetLandingPageFoldersByQueryParams;
use HubSpotSDK\Cms\Pages\PageGetLandingPageFoldersParams;
use HubSpotSDK\Cms\Pages\PageGetLandingPageRevisionParams;
use HubSpotSDK\Cms\Pages\PageGetLandingPagesByQueryParams;
use HubSpotSDK\Cms\Pages\PageGetLandingPagesParams;
use HubSpotSDK\Cms\Pages\PageGetSitePageRevisionParams;
use HubSpotSDK\Cms\Pages\PageGetSitePagesByQueryParams;
use HubSpotSDK\Cms\Pages\PageGetSitePagesParams;
use HubSpotSDK\Cms\Pages\PageListLandingPageRevisionsParams;
use HubSpotSDK\Cms\Pages\PageListSitePageRevisionsParams;
use HubSpotSDK\Cms\Pages\PageRestoreLandingPageRevisionParams;
use HubSpotSDK\Cms\Pages\PageRestoreLandingPageRevisionToDraftParams;
use HubSpotSDK\Cms\Pages\PageRestoreSitePageRevisionParams;
use HubSpotSDK\Cms\Pages\PageRestoreSitePageRevisionToDraftParams;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface PagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PageGetLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPageFolders(
        array|PageGetLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetLandingPageFoldersByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPageFoldersByQuery(
        array|PageGetLandingPageFoldersByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetLandingPageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageVersion>
     *
     * @throws APIException
     */
    public function getLandingPageRevision(
        string $revisionID,
        array|PageGetLandingPageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPages(
        array|PageGetLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetLandingPagesByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPagesByQuery(
        array|PageGetLandingPagesByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetSitePageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageVersion>
     *
     * @throws APIException
     */
    public function getSitePageRevision(
        string $revisionID,
        array|PageGetSitePageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getSitePages(
        array|PageGetSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageGetSitePagesByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getSitePagesByQuery(
        array|PageGetSitePagesByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListLandingPageRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageVersion>>
     *
     * @throws APIException
     */
    public function listLandingPageRevisions(
        string $objectID,
        array|PageListLandingPageRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListSitePageRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageVersion>>
     *
     * @throws APIException
     */
    public function listSitePageRevisions(
        string $objectID,
        array|PageListSitePageRevisionsParams $params,
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
    public function resetSitePageDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreLandingPageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function restoreLandingPageRevision(
        string $revisionID,
        array|PageRestoreLandingPageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreLandingPageRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function restoreLandingPageRevisionToDraft(
        int $revisionID,
        array|PageRestoreLandingPageRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreSitePageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function restoreSitePageRevision(
        string $revisionID,
        array|PageRestoreSitePageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreSitePageRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageData>
     *
     * @throws APIException
     */
    public function restoreSitePageRevisionToDraft(
        int $revisionID,
        array|PageRestoreSitePageRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
