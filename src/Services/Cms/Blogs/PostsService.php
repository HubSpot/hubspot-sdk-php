<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostCloneParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\PostDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\PostDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionsParams;
use HubspotSDK\Cms\Blogs\Posts\PostListParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionToDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostScheduleParams;
use HubspotSDK\Cms\Blogs\Posts\PostSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\Styles;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubspotSDK\Services\Cms\Blogs\Posts\BatchService;

final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a new blog post, specifying its content in the request body.
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestId: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorId: string,
     *   campaign: string,
     *   categoryId: int,
     *   contentGroupId: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9',
     *   created: string|\DateTimeInterface,
     *   createdById: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceId: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDbTableId: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderId: string,
     *   footerHtml: string,
     *   headHtml: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssId: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
     *   linkRelCanonicalUrl: string,
     *   mabExperimentId: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectId: int,
     *   pageExpiryRedirectUrl: string,
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIds: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromId: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIds?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedById: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|PostCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PostCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts',
            body: (object) $parsed,
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Partially updates a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<PostUpdateParams\AbStatus>,
     *   abTestId: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorId: string,
     *   campaign: string,
     *   categoryId: int,
     *   contentGroupId: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9',
     *   created: string|\DateTimeInterface,
     *   createdById: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<PostUpdateParams\CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceId: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDbTableId: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderId: string,
     *   footerHtml: string,
     *   headHtml: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<PostUpdateParams\Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssId: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
     *   linkRelCanonicalUrl: string,
     *   mabExperimentId: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectId: int,
     *   pageExpiryRedirectUrl: string,
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIds: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromId: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIds?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedById: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     *   archived?: bool,
     * }|PostUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|PostUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/blogs/posts/%1$s', $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all blog posts, with paging and filtering options. This method would be useful for an integration that ingests posts and suggests edits.
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|PostListParams $params
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function list(
        array|PostListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = PostListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/blogs/posts',
            query: $parsed,
            options: $options,
            convert: BlogPost::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete a blog post by ID.
     *
     * @param array{archived?: bool}|PostDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|PostDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PostDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/blogs/posts/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Attach a blog post to a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array{
     *   id: string, language: string, primaryId: string, primaryLanguage?: string
     * }|PostAttachToLangGroupParams $params
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|PostAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PostAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a blog post, making a copy of it in a new blog post.
     *
     * @param array{id: string, cloneName?: string}|PostCloneParams $params
     *
     * @throws APIException
     */
    public function clone(
        array|PostCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/clone',
            body: (object) $parsed,
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog post
     *
     * @param array{
     *   id: string, language?: string
     * }|PostCreateLangVariationParams $params
     *
     * @throws APIException
     */
    public function createLangVariation(
        array|PostCreateLangVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostCreateLangVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array{id: string}|PostDetachFromLangGroupParams $params
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|PostDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PostDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a blog post by the post ID.
     *
     * @param array{archived?: bool, property?: string}|PostGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|PostGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/posts/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a blog post.
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/posts/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a previous version of a blog post.
     *
     * @param array{objectId: string}|PostGetPreviousVersionParams $params
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        array|PostGetPreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): VersionBlogPost {
        [$parsed, $options] = PostGetPreviousVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectId'];
        unset($parsed['objectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/posts/%1$s/revisions/%2$s', $objectID, $revisionID],
            options: $options,
            convert: VersionBlogPost::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a blog post.
     *
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|PostGetPreviousVersionsParams $params
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        array|PostGetPreviousVersionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = PostGetPreviousVersionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/posts/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: VersionBlogPost::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Publish the draft version of the blog post, sending its content to the live page.
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/blogs/posts/%1$s/draft/push-live', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Discard all drafted content, resetting the draft to contain the content in the currently published version.
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/blogs/posts/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Restores a blog post to one of its previous versions.
     *
     * @param array{objectId: string}|PostRestorePreviousVersionParams $params
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        array|PostRestorePreviousVersionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostRestorePreviousVersionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectId'];
        unset($parsed['objectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/blogs/posts/%1$s/revisions/%2$s/restore', $objectID, $revisionID,
            ],
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
     *
     * @param array{objectId: string}|PostRestorePreviousVersionToDraftParams $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        array|PostRestorePreviousVersionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostRestorePreviousVersionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectId'];
        unset($parsed['objectId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/blogs/posts/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Schedule a blog post to be published at a specified time.
     *
     * @param array{
     *   id: string, publishDate: string|\DateTimeInterface
     * }|PostScheduleParams $params
     *
     * @throws APIException
     */
    public function schedule(
        array|PostScheduleParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/schedule',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param array{id: string}|PostSetLangPrimaryParams $params
     *
     * @throws APIException
     */
    public function setLangPrimary(
        array|PostSetLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PostSetLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/blogs/posts/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Partially updates the draft version of a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<PostUpdateDraftParams\AbStatus>,
     *   abTestId: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorId: string,
     *   campaign: string,
     *   categoryId: int,
     *   contentGroupId: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9',
     *   created: string|\DateTimeInterface,
     *   createdById: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<PostUpdateDraftParams\CurrentState>,
     *   domain: string,
     *   dynamicPageDataSourceId: string,
     *   dynamicPageDataSourceType: int,
     *   dynamicPageHubDbTableId: string,
     *   enableDomainStylesheets: bool,
     *   enableGoogleAmpOutputOverride: bool,
     *   enableLayoutStylesheets: bool,
     *   featuredImage: string,
     *   featuredImageAltText: string,
     *   folderId: string,
     *   footerHtml: string,
     *   headHtml: string,
     *   htmlTitle: string,
     *   includeDefaultCustomCss: bool,
     *   language: value-of<PostUpdateDraftParams\Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssId: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
     *   linkRelCanonicalUrl: string,
     *   mabExperimentId: string,
     *   metaDescription: string,
     *   name: string,
     *   pageExpiryDate: int,
     *   pageExpiryEnabled: bool,
     *   pageExpiryRedirectId: int,
     *   pageExpiryRedirectUrl: string,
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIds: list<int>,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromId: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIds?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedById: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|PostUpdateDraftParams $params
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|PostUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        [$parsed, $options] = PostUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/blogs/posts/%1$s/draft', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: BlogPost::class,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array{
     *   languages: array<string,string>, primaryId: string
     * }|PostUpdateLangsParams $params
     *
     * @throws APIException
     */
    public function updateLangs(
        array|PostUpdateLangsParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostUpdateLangsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
