<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\Cms\Pages\PageGetRevisionParams;
use HubspotSDK\Cms\Pages\PageListLandingPageFoldersParams;
use HubspotSDK\Cms\Pages\PageListLandingPagesParams;
use HubspotSDK\Cms\Pages\PageListRevisionsParams;
use HubspotSDK\Cms\Pages\PageListSitePagesParams;
use HubspotSDK\Cms\Pages\PageQueryLandingPageFoldersParams;
use HubspotSDK\Cms\Pages\PageQueryLandingPagesParams;
use HubspotSDK\Cms\Pages\PageQuerySitePagesParams;
use HubspotSDK\Cms\Pages\PageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\PageRestoreRevisionToDraftParams;
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
     * @param array<string,mixed>|PageGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|PageGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listLandingPageFolders(
        array|PageListLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listLandingPages(
        array|PageListLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageVersion>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|PageListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageListSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listSitePages(
        array|PageListSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageQueryLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function queryLandingPageFolders(
        array|PageQueryLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageQueryLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function queryLandingPages(
        array|PageQueryLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageQuerySitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function querySitePages(
        array|PageQuerySitePagesParams $params,
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
    public function resetDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Cms\Pages\Page>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|PageRestoreRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PageRestoreRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<\HubspotSDK\Cms\Pages\Page>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|PageRestoreRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
