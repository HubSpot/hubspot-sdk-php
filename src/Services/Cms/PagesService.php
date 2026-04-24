<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\PageData;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\PagesContract;
use HubSpotSDK\Services\Cms\Pages\ABTestsService;
use HubSpotSDK\Services\Cms\Pages\BatchService;
use HubSpotSDK\Services\Cms\Pages\FoldersService;
use HubSpotSDK\Services\Cms\Pages\LandingPagesService;
use HubSpotSDK\Services\Cms\Pages\MultiLanguageService;
use HubSpotSDK\Services\Cms\Pages\WebsitePagesService;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class PagesService implements PagesContract
{
    /**
     * @api
     */
    public PagesRawService $raw;

    /**
     * @api
     */
    public ABTestsService $abTests;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public FoldersService $folders;

    /**
     * @api
     */
    public LandingPagesService $landingPages;

    /**
     * @api
     */
    public MultiLanguageService $multiLanguage;

    /**
     * @api
     */
    public WebsitePagesService $websitePages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PagesRawService($client);
        $this->abTests = new ABTestsService($client);
        $this->batch = new BatchService($client);
        $this->folders = new FoldersService($client);
        $this->landingPages = new LandingPagesService($client);
        $this->multiLanguage = new MultiLanguageService($client);
        $this->websitePages = new WebsitePagesService($client);
    }

    /**
     * @api
     *
     * Retrieve a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getLandingPageRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageVersion {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getLandingPageRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a previous version of a website page by the revision ID.
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
    ): PageVersion {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSitePageRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a landing page, specified by page ID.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PageVersion>
     *
     * @throws APIException
     */
    public function listLandingPageRevisions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listLandingPageRevisions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a website page, specified by page ID.
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
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSitePageRevisions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to match the live version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetSitePageDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetSitePageDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreLandingPageRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreLandingPageRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Specify a previous version of a landing page to set as the page draft.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreLandingPageRevisionToDraft(
        int $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreLandingPageRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a website page to a previous version, specified by page ID and version ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreSitePageRevision(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreSitePageRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a website page and sets it as the new draft version of the page.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restoreSitePageRevisionToDraft(
        int $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreSitePageRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
