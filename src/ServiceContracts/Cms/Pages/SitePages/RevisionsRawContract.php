<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\SitePages;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Cms\Pages\SitePages\Revisions\RevisionGetSitePageRevisionParams;
use HubSpotSDK\Cms\Pages\SitePages\Revisions\RevisionListSitePageRevisionsParams;
use HubSpotSDK\Cms\Pages\SitePages\Revisions\RevisionRestoreSitePageRevisionParams;
use HubSpotSDK\Cms\Pages\SitePages\Revisions\RevisionRestoreSitePageRevisionToDraftParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface RevisionsRawContract
{
    /**
     * @api
     *
     * @param string $revisionID the unique identifier of the specific revision to retrieve
     * @param array<string,mixed>|RevisionGetSitePageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageVersion>
     *
     * @throws APIException
     */
    public function getSitePageRevision(
        string $revisionID,
        array|RevisionGetSitePageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionListSitePageRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageVersion>>
     *
     * @throws APIException
     */
    public function listSitePageRevisions(
        string $objectID,
        array|RevisionListSitePageRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionRestoreSitePageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function restoreSitePageRevision(
        string $revisionID,
        array|RevisionRestoreSitePageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RevisionRestoreSitePageRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function restoreSitePageRevisionToDraft(
        int $revisionID,
        array|RevisionRestoreSitePageRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
