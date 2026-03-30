<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
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
     * Retrieve a previous version of a website page by the revision ID.
     *
     * @param array{objectID: string}|PageGetRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageGetRevisionParams::parseRequest(
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
     * }|PageListLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listLandingPageFolders(
        array|PageListLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageListLandingPageFoldersParams::parseRequest(
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
     * }|PageListLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listLandingPages(
        array|PageListLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageListLandingPagesParams::parseRequest(
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
     * Retrieves all the previous versions of a website page, specified by page ID.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|PageListRevisionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageListRevisionsParams::parseRequest(
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
     * }|PageListSitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listSitePages(
        array|PageListSitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageListSitePagesParams::parseRequest(
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
     * }|PageQueryLandingPageFoldersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function queryLandingPageFolders(
        array|PageQueryLandingPageFoldersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageQueryLandingPageFoldersParams::parseRequest(
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
     * }|PageQueryLandingPagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function queryLandingPages(
        array|PageQueryLandingPagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageQueryLandingPagesParams::parseRequest(
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
     * }|PageQuerySitePagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function querySitePages(
        array|PageQuerySitePagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PageQuerySitePagesParams::parseRequest(
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
     * Discards any edits and resets the draft to match the live version.
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
     * Restores a website page to a previous version, specified by page ID and version ID.
     *
     * @param array{objectID: string}|PageRestoreRevisionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreRevisionParams::parseRequest(
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
            convert: \HubspotSDK\Cms\Pages\Page::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a website page and sets it as the new draft version of the page.
     *
     * @param array{objectID: string}|PageRestoreRevisionToDraftParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PageRestoreRevisionToDraftParams::parseRequest(
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
            convert: \HubspotSDK\Cms\Pages\Page::class,
        );
    }
}
