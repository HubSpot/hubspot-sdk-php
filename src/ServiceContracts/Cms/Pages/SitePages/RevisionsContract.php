<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Pages\SitePages;

use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface RevisionsContract
{
    /**
     * @api
     *
     * @param string $revisionID the unique identifier of the specific revision to retrieve
     * @param string $objectID the unique identifier of the site page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSitePageRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageVersion;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PageVersion>
     *
     * @throws APIException
     */
    public function listSitePageRevisions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreSitePageRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PagesPage;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreSitePageRevisionToDraft(
        int $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PagesPage;
}
