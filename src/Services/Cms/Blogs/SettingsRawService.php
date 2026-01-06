<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Cms\Blogs\Settings\SettingAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingCreateLanguageVariationParams;
use HubspotSDK\Cms\Blogs\Settings\SettingDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Settings\SettingGetRevisionParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListParams;
use HubspotSDK\Cms\Blogs\Settings\SettingListRevisionsParams;
use HubspotSDK\Cms\Blogs\Settings\SettingSetNewLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Settings\SettingUpdateLanguagesParams;
use HubspotSDK\Cms\Blogs\Settings\VersionBlog;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\SettingsRawContract;

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
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|SettingListParams $params
     *
     * @return BaseResponse<Page<Blog>>
     *
     * @throws APIException
     */
    public function list(
        array|SettingListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = SettingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/blog-settings/settings',
            query: $parsed,
            options: $options,
            convert: Blog::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id: string, language: string, primaryID: string, primaryLanguage?: string
     * }|SettingAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|SettingAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   id: string, language?: string, primaryLanguage?: string, slug?: string
     * }|SettingCreateLanguageVariationParams $params
     *
     * @return BaseResponse<Blog>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|SettingCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * @param array{id: string}|SettingDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|SettingDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @return BaseResponse<Blog>
     *
     * @throws APIException
     */
    public function get(
        string $blogID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blog-settings/settings/%1$s', $blogID],
            options: $requestOptions,
            convert: Blog::class,
        );
    }

    /**
     * @api
     *
     * @param array{blogID: string}|SettingGetRevisionParams $params
     *
     * @return BaseResponse<VersionBlog>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|SettingGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
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
                'cms/v3/blog-settings/settings/%1$s/revisions/%2$s',
                $blogID,
                $revisionID,
            ],
            options: $options,
            convert: VersionBlog::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|SettingListRevisionsParams $params
     *
     * @return BaseResponse<Page<VersionBlog>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $blogID,
        array|SettingListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blog-settings/settings/%1$s/revisions', $blogID],
            query: $parsed,
            options: $options,
            convert: VersionBlog::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{id: string}|SettingSetNewLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|SettingSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/blog-settings/settings/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   languages: array<string,string>, primaryID: string
     * }|SettingUpdateLanguagesParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|SettingUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blog-settings/settings/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
