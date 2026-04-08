<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\PageData;
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
use HubspotSDK\ServiceContracts\Cms\PagesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PagesRawService implements PagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPageFolders(
        array|PageGetLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetLandingPageFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/landing-pages/folders/cursor',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetLandingPageFoldersByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPageFoldersByQuery(
        array|PageGetLandingPageFoldersByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetLandingPageFoldersByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/landing-pages/folders/cursor/query',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param array{objectID: string}|PageGetLandingPageRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageGetLandingPageRevisionParams::parseRequest(
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPages(
        array|PageGetLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetLandingPagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/landing-pages/cursor',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetLandingPagesByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getLandingPagesByQuery(
        array|PageGetLandingPagesByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetLandingPagesByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/landing-pages/cursor/query',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve a previous version of a website page by the revision ID.
     *
     * @param array{objectID: string}|PageGetSitePageRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageGetSitePageRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/pages/2026-03/site-pages/%1$s/revisions/%2$s',
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getSitePages(
        array|PageGetSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetSitePagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/site-pages/cursor',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: \DateTimeInterface,
     *   createdAt?: \DateTimeInterface,
     *   createdBefore?: \DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|PageGetSitePagesByQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getSitePagesByQuery(
        array|PageGetSitePagesByQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageGetSitePagesByQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/pages/2026-03/site-pages/cursor/query',
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a landing page, specified by page ID.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|PageListLandingPageRevisionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageListLandingPageRevisionsParams::parseRequest(
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
     * Retrieves all the previous versions of a website page, specified by page ID.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|PageListSitePageRevisionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageListSitePageRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/pages/2026-03/site-pages/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: PageVersion::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to match the live version.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/pages/2026-03/site-pages/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a previous version of a landing page, specified by page ID and revision ID.
     *
     * @param array{objectID: string}|PageRestoreLandingPageRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreLandingPageRevisionParams::parseRequest(
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
            convert: PageData::class,
        );
    }

    /**
     * @api
     *
     * Specify a previous version of a landing page to set as the page draft.
     *
     * @param array{
     *   objectID: string
     * }|PageRestoreLandingPageRevisionToDraftParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreLandingPageRevisionToDraftParams::parseRequest(
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
            convert: PageData::class,
        );
    }

    /**
     * @api
     *
     * Restores a website page to a previous version, specified by page ID and version ID.
     *
     * @param array{objectID: string}|PageRestoreSitePageRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreSitePageRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/pages/2026-03/site-pages/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: PageData::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a website page and sets it as the new draft version of the page.
     *
     * @param array{objectID: string}|PageRestoreSitePageRevisionToDraftParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreSitePageRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'cms/pages/2026-03/site-pages/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: PageData::class,
        );
    }
}
