<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Pages\CmsPage;
use HubspotSDK\Cms\Pages\PageGetLandingPageFoldersByQueryParams;
use HubspotSDK\Cms\Pages\PageGetLandingPageFoldersParams;
use HubspotSDK\Cms\Pages\PageGetLandingPageRevisionParams;
use HubspotSDK\Cms\Pages\PageGetLandingPagesByQueryParams;
use HubspotSDK\Cms\Pages\PageGetLandingPagesParams;
use HubspotSDK\Cms\Pages\PageGetSitePageRevisionParams;
use HubspotSDK\Cms\Pages\PageGetSitePagesByQueryParams;
use HubspotSDK\Cms\Pages\PageGetSitePagesParams;
use HubspotSDK\Cms\Pages\PageListLandingPageRevisionsParams;
use HubspotSDK\Cms\Pages\PageListSitePageRevisionsParams;
use HubspotSDK\Cms\Pages\PageRestoreLandingPageRevisionParams;
use HubspotSDK\Cms\Pages\PageRestoreLandingPageRevisionToDraftParams;
use HubspotSDK\Cms\Pages\PageRestoreSitePageRevisionParams;
use HubspotSDK\Cms\Pages\PageRestoreSitePageRevisionToDraftParams;
use HubspotSDK\Cms\Pages\PageVersion;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @return BaseResponse<CmsPage>
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
     * @return BaseResponse<CmsPage>
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
     * @return BaseResponse<CmsPage>
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
     * @return BaseResponse<CmsPage>
     *
     * @throws APIException
     */
    public function restoreSitePageRevisionToDraft(
        int $revisionID,
        array|PageRestoreSitePageRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
