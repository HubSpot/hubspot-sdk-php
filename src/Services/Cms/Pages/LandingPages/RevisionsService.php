<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\RevisionsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class RevisionsService implements RevisionsContract
{
    /**
     * @api
     */
    public RevisionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RevisionsRawService($client);
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
    ): PagesPage {
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
    ): PagesPage {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreLandingPageRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
