<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\BlogVersion;
use HubspotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\SettingsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SettingsRawService implements SettingsRawContract
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
     *   sort?: list<string>,
     *   updatedAfter?: \DateTimeInterface,
     *   updatedAt?: \DateTimeInterface,
     *   updatedBefore?: \DateTimeInterface,
     * }|SettingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Blog>>
     *
     * @throws APIException
     */
    public function list(
        array|SettingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/blog-settings/2026-03/settings',
            query: $parsed,
            options: $options,
            convert: Blog::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Blog>
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/blog-settings/2026-03/settings/%1$s', $blogID],
            options: $requestOptions,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * @param array{blogID: string}|SettingGetRevisionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BlogVersion>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SettingGetRevisionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $blogID = $parsed['blogID'];
        unset($parsed['blogID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/blog-settings/2026-03/settings/%1$s/revisions/%2$s',
                $blogID,
                $revisionID,
            ],
            options: $options,
            convert: BlogVersion::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|SettingListRevisionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<VersionBlog>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        array|SettingListRevisionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/blog-settings/2026-03/settings/%1$s/revisions', $blogID],
            query: $parsed,
            options: $options,
            convert: VersionBlog::class,
            page: Page::class,
        );
    }
}
