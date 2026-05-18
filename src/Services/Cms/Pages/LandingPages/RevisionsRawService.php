<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\LandingPages\Revisions\RevisionGetLandingPageRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Revisions\RevisionListLandingPageRevisionsParams;
use HubSpotSDK\Cms\Pages\LandingPages\Revisions\RevisionRestoreLandingPageRevisionParams;
use HubSpotSDK\Cms\Pages\LandingPages\Revisions\RevisionRestoreLandingPageRevisionToDraftParams;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\PageVersion;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\LandingPages\RevisionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class RevisionsRawService implements RevisionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param array{objectID: string}|RevisionGetLandingPageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PageVersion>
     *
     * @throws APIException
     */
    public function getLandingPageRevision(
        string $revisionID,
        array|RevisionGetLandingPageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionGetLandingPageRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/pages/2026-03/landing-pages/%1$s/revisions/%2$s',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: PageVersion::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a landing page, specified by page ID.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|RevisionListLandingPageRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<PageVersion>>
     *
     * @throws APIException
     */
    public function listLandingPageRevisions(
        string $objectID,
        array|RevisionListLandingPageRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionListLandingPageRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/pages/2026-03/landing-pages/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: PageVersion::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Restores a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param array{objectID: string}|RevisionRestoreLandingPageRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function restoreLandingPageRevision(
        string $revisionID,
        array|RevisionRestoreLandingPageRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionRestoreLandingPageRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/pages/2026-03/landing-pages/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: PagesPage::class,
        );
    }

    /**
     * @api
     *
     * Specify a previous version of a landing page to set as the page draft.
     *
     * @param array{
     *   objectID: string
     * }|RevisionRestoreLandingPageRevisionToDraftParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PagesPage>
     *
     * @throws APIException
     */
    public function restoreLandingPageRevisionToDraft(
        int $revisionID,
        array|RevisionRestoreLandingPageRevisionToDraftParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RevisionRestoreLandingPageRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/pages/2026-03/landing-pages/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: PagesPage::class,
        );
    }
}
