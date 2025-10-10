<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\CollectionResponseWithTotalVersionBlogPost;
use HubspotSDK\Cms\Blogs\Posts\ContentLanguageVariation;
use HubspotSDK\Cms\Blogs\Posts\LayoutSection;
use HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostCloneParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateLangVariationParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\PostDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\PostDetachFromLangGroupParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostGetPreviousVersionsParams;
use HubspotSDK\Cms\Blogs\Posts\PostListParams;
use HubspotSDK\Cms\Blogs\Posts\PostReadParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionParams;
use HubspotSDK\Cms\Blogs\Posts\PostRestorePreviousVersionToDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostScheduleParams;
use HubspotSDK\Cms\Blogs\Posts\PostSetLangPrimaryParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateLangsParams;
use HubspotSDK\Cms\Blogs\Posts\PostUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;

use const HubspotSDK\Core\OMIT as omit;

final class PostsService implements PostsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new post
     *
     * @param string $id
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param CurrentState|value-of<CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param Language|value-of<Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
     *
     * @throws APIException
     */
    public function create(
        $id,
        $abStatus,
        $abTestID,
        $archivedAt,
        $archivedInDashboard,
        $attachedStylesheets,
        $authorName,
        $blogAuthorID,
        $campaign,
        $categoryID,
        $contentGroupID,
        $contentTypeCategory,
        $created,
        $createdByID,
        $currentlyPublished,
        $currentState,
        $domain,
        $dynamicPageDataSourceID,
        $dynamicPageDataSourceType,
        $dynamicPageHubDBTableID,
        $enableDomainStylesheets,
        $enableGoogleAmpOutputOverride,
        $enableLayoutStylesheets,
        $featuredImage,
        $featuredImageAltText,
        $folderID,
        $footerHTML,
        $headHTML,
        $htmlTitle,
        $includeDefaultCustomCss,
        $language,
        $layoutSections,
        $linkRelCanonicalURL,
        $mabExperimentID,
        $metaDescription,
        $name,
        $pageExpiryDate,
        $pageExpiryEnabled,
        $pageExpiryRedirectID,
        $pageExpiryRedirectURL,
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
        $themeSettingsValues,
        $translatedFromID,
        $translations,
        $updated,
        $updatedByID,
        $url,
        $useFeaturedImage,
        $widgetContainers,
        $widgets,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        $params = [
            'id' => $id,
            'abStatus' => $abStatus,
            'abTestID' => $abTestID,
            'archivedAt' => $archivedAt,
            'archivedInDashboard' => $archivedInDashboard,
            'attachedStylesheets' => $attachedStylesheets,
            'authorName' => $authorName,
            'blogAuthorID' => $blogAuthorID,
            'campaign' => $campaign,
            'categoryID' => $categoryID,
            'contentGroupID' => $contentGroupID,
            'contentTypeCategory' => $contentTypeCategory,
            'created' => $created,
            'createdByID' => $createdByID,
            'currentlyPublished' => $currentlyPublished,
            'currentState' => $currentState,
            'domain' => $domain,
            'dynamicPageDataSourceID' => $dynamicPageDataSourceID,
            'dynamicPageDataSourceType' => $dynamicPageDataSourceType,
            'dynamicPageHubDBTableID' => $dynamicPageHubDBTableID,
            'enableDomainStylesheets' => $enableDomainStylesheets,
            'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
            'enableLayoutStylesheets' => $enableLayoutStylesheets,
            'featuredImage' => $featuredImage,
            'featuredImageAltText' => $featuredImageAltText,
            'folderID' => $folderID,
            'footerHTML' => $footerHTML,
            'headHTML' => $headHTML,
            'htmlTitle' => $htmlTitle,
            'includeDefaultCustomCss' => $includeDefaultCustomCss,
            'language' => $language,
            'layoutSections' => $layoutSections,
            'linkRelCanonicalURL' => $linkRelCanonicalURL,
            'mabExperimentID' => $mabExperimentID,
            'metaDescription' => $metaDescription,
            'name' => $name,
            'pageExpiryDate' => $pageExpiryDate,
            'pageExpiryEnabled' => $pageExpiryEnabled,
            'pageExpiryRedirectID' => $pageExpiryRedirectID,
            'pageExpiryRedirectURL' => $pageExpiryRedirectURL,
            'password' => $password,
            'postBody' => $postBody,
            'postSummary' => $postSummary,
            'publicAccessRules' => $publicAccessRules,
            'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
            'publishDate' => $publishDate,
            'publishImmediately' => $publishImmediately,
            'rssBody' => $rssBody,
            'rssSummary' => $rssSummary,
            'slug' => $slug,
            'state' => $state,
            'tagIDs' => $tagIDs,
            'themeSettingsValues' => $themeSettingsValues,
            'translatedFromID' => $translatedFromID,
            'translations' => $translations,
            'updated' => $updated,
            'updatedByID' => $updatedByID,
            'url' => $url,
            'useFeaturedImage' => $useFeaturedImage,
            'widgetContainers' => $widgetContainers,
            'widgets' => $widgets,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * Update a post
     *
     * @param string $id
     * @param PostUpdateParams\AbStatus|value-of<PostUpdateParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param PostUpdateParams\ContentTypeCategory|value-of<PostUpdateParams\ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param PostUpdateParams\CurrentState|value-of<PostUpdateParams\CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param PostUpdateParams\Language|value-of<PostUpdateParams\Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
     * @param bool $archived
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        $id,
        $abStatus,
        $abTestID,
        $archivedAt,
        $archivedInDashboard,
        $attachedStylesheets,
        $authorName,
        $blogAuthorID,
        $campaign,
        $categoryID,
        $contentGroupID,
        $contentTypeCategory,
        $created,
        $createdByID,
        $currentlyPublished,
        $currentState,
        $domain,
        $dynamicPageDataSourceID,
        $dynamicPageDataSourceType,
        $dynamicPageHubDBTableID,
        $enableDomainStylesheets,
        $enableGoogleAmpOutputOverride,
        $enableLayoutStylesheets,
        $featuredImage,
        $featuredImageAltText,
        $folderID,
        $footerHTML,
        $headHTML,
        $htmlTitle,
        $includeDefaultCustomCss,
        $language,
        $layoutSections,
        $linkRelCanonicalURL,
        $mabExperimentID,
        $metaDescription,
        $name,
        $pageExpiryDate,
        $pageExpiryEnabled,
        $pageExpiryRedirectID,
        $pageExpiryRedirectURL,
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
        $themeSettingsValues,
        $translatedFromID,
        $translations,
        $updated,
        $updatedByID,
        $url,
        $useFeaturedImage,
        $widgetContainers,
        $widgets,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        $params = [
            'id' => $id,
            'abStatus' => $abStatus,
            'abTestID' => $abTestID,
            'archivedAt' => $archivedAt,
            'archivedInDashboard' => $archivedInDashboard,
            'attachedStylesheets' => $attachedStylesheets,
            'authorName' => $authorName,
            'blogAuthorID' => $blogAuthorID,
            'campaign' => $campaign,
            'categoryID' => $categoryID,
            'contentGroupID' => $contentGroupID,
            'contentTypeCategory' => $contentTypeCategory,
            'created' => $created,
            'createdByID' => $createdByID,
            'currentlyPublished' => $currentlyPublished,
            'currentState' => $currentState,
            'domain' => $domain,
            'dynamicPageDataSourceID' => $dynamicPageDataSourceID,
            'dynamicPageDataSourceType' => $dynamicPageDataSourceType,
            'dynamicPageHubDBTableID' => $dynamicPageHubDBTableID,
            'enableDomainStylesheets' => $enableDomainStylesheets,
            'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
            'enableLayoutStylesheets' => $enableLayoutStylesheets,
            'featuredImage' => $featuredImage,
            'featuredImageAltText' => $featuredImageAltText,
            'folderID' => $folderID,
            'footerHTML' => $footerHTML,
            'headHTML' => $headHTML,
            'htmlTitle' => $htmlTitle,
            'includeDefaultCustomCss' => $includeDefaultCustomCss,
            'language' => $language,
            'layoutSections' => $layoutSections,
            'linkRelCanonicalURL' => $linkRelCanonicalURL,
            'mabExperimentID' => $mabExperimentID,
            'metaDescription' => $metaDescription,
            'name' => $name,
            'pageExpiryDate' => $pageExpiryDate,
            'pageExpiryEnabled' => $pageExpiryEnabled,
            'pageExpiryRedirectID' => $pageExpiryRedirectID,
            'pageExpiryRedirectURL' => $pageExpiryRedirectURL,
            'password' => $password,
            'postBody' => $postBody,
            'postSummary' => $postSummary,
            'publicAccessRules' => $publicAccessRules,
            'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
            'publishDate' => $publishDate,
            'publishImmediately' => $publishImmediately,
            'rssBody' => $rssBody,
            'rssSummary' => $rssSummary,
            'slug' => $slug,
            'state' => $state,
            'tagIDs' => $tagIDs,
            'themeSettingsValues' => $themeSettingsValues,
            'translatedFromID' => $translatedFromID,
            'translations' => $translations,
            'updated' => $updated,
            'updatedByID' => $updatedByID,
            'url' => $url,
            'useFeaturedImage' => $useFeaturedImage,
            'widgetContainers' => $widgetContainers,
            'widgets' => $widgets,
            'archived' => $archived,
        ];

        return $this->updateRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * Get all posts
     *
     * @param string $after
     * @param bool $archived
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param int $limit
     * @param string $property
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $createdAfter = omit,
        $createdAt = omit,
        $createdBefore = omit,
        $limit = omit,
        $property = omit,
        $sort = omit,
        $updatedAfter = omit,
        $updatedAt = omit,
        $updatedBefore = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'createdAfter' => $createdAfter,
            'createdAt' => $createdAt,
            'createdBefore' => $createdBefore,
            'limit' => $limit,
            'property' => $property,
            'sort' => $sort,
            'updatedAfter' => $updatedAfter,
            'updatedAt' => $updatedAt,
            'updatedBefore' => $updatedBefore,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = PostListParams::parseRequest(
            $params,
            $requestOptions
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
     * Delete a blog post
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostDeleteParams::parseRequest(
            $params,
            $requestOptions
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
     * Attach post to a multi-language group
     *
     * @param string $id
     * @param PostAttachToLangGroupParams\Language|value-of<PostAttachToLangGroupParams\Language> $language
     * @param string $primaryID
     * @param string $primaryLanguage
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        $id,
        $language,
        $primaryID,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryID' => $primaryID,
            'primaryLanguage' => $primaryLanguage,
        ];

        return $this->attachToLangGroupRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function attachToLangGroupRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions
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
     * Clone a blog post
     *
     * @param string $id
     * @param string $cloneName
     *
     * @throws APIException
     */
    public function clone(
        $id,
        $cloneName = omit,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = ['id' => $id, 'cloneName' => $cloneName];

        return $this->cloneRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function cloneRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostCloneParams::parseRequest(
            $params,
            $requestOptions
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
     * Create a language variation
     *
     * @param string $id
     * @param string $language
     *
     * @throws APIException
     */
    public function createLangVariation(
        $id,
        $language = omit,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = ['id' => $id, 'language' => $language];

        return $this->createLangVariationRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createLangVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostCreateLangVariationParams::parseRequest(
            $params,
            $requestOptions
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
     * Detach post from a multi-language group
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->detachFromLangGroupRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function detachFromLangGroupRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions
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
     * Retrieve the full draft version of the Blog Post
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
     * Retrieve a previous version of a blog post
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionBlogPost {
        $params = ['objectID' => $objectID];

        return $this->getPreviousVersionRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getPreviousVersionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionBlogPost {
        [$parsed, $options] = PostGetPreviousVersionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

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
     * Retrieves all previous versions of a post
     *
     * @param string $after
     * @param string $before
     * @param int $limit
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionBlogPost {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->getPreviousVersionsRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getPreviousVersionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionBlogPost {
        [$parsed, $options] = PostGetPreviousVersionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/blogs/posts/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalVersionBlogPost::class,
        );
    }

    /**
     * @api
     *
     * Publish blog post draft
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
     * Retrieve a blog post
     *
     * @param bool $archived
     * @param string $property
     *
     * @throws APIException
     */
    public function read(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        $params = ['archived' => $archived, 'property' => $property];

        return $this->readRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostReadParams::parseRequest(
            $params,
            $requestOptions
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
     * Reset post draft to the live version
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
     * Restore a previous version
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = ['objectID' => $objectID];

        return $this->restorePreviousVersionRaw(
            $revisionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostRestorePreviousVersionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

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
     * Restore a draft to a previous version
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = ['objectID' => $objectID];

        return $this->restorePreviousVersionToDraftRaw(
            $revisionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraftRaw(
        int $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostRestorePreviousVersionToDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

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
     * Schedule a post to be published
     *
     * @param string $id
     * @param \DateTimeInterface $publishDate
     *
     * @throws APIException
     */
    public function schedule(
        $id,
        $publishDate,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id, 'publishDate' => $publishDate];

        return $this->scheduleRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function scheduleRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostScheduleParams::parseRequest(
            $params,
            $requestOptions
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
     * Set a new primary language
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function setLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->setLangPrimaryRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostSetLangPrimaryParams::parseRequest(
            $params,
            $requestOptions
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
     * Update the draft of a post
     *
     * @param string $id
     * @param PostUpdateDraftParams\AbStatus|value-of<PostUpdateDraftParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param PostUpdateDraftParams\ContentTypeCategory|value-of<PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param PostUpdateDraftParams\CurrentState|value-of<PostUpdateDraftParams\CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param PostUpdateDraftParams\Language|value-of<PostUpdateDraftParams\Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        $id,
        $abStatus,
        $abTestID,
        $archivedAt,
        $archivedInDashboard,
        $attachedStylesheets,
        $authorName,
        $blogAuthorID,
        $campaign,
        $categoryID,
        $contentGroupID,
        $contentTypeCategory,
        $created,
        $createdByID,
        $currentlyPublished,
        $currentState,
        $domain,
        $dynamicPageDataSourceID,
        $dynamicPageDataSourceType,
        $dynamicPageHubDBTableID,
        $enableDomainStylesheets,
        $enableGoogleAmpOutputOverride,
        $enableLayoutStylesheets,
        $featuredImage,
        $featuredImageAltText,
        $folderID,
        $footerHTML,
        $headHTML,
        $htmlTitle,
        $includeDefaultCustomCss,
        $language,
        $layoutSections,
        $linkRelCanonicalURL,
        $mabExperimentID,
        $metaDescription,
        $name,
        $pageExpiryDate,
        $pageExpiryEnabled,
        $pageExpiryRedirectID,
        $pageExpiryRedirectURL,
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
        $themeSettingsValues,
        $translatedFromID,
        $translations,
        $updated,
        $updatedByID,
        $url,
        $useFeaturedImage,
        $widgetContainers,
        $widgets,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
        $params = [
            'id' => $id,
            'abStatus' => $abStatus,
            'abTestID' => $abTestID,
            'archivedAt' => $archivedAt,
            'archivedInDashboard' => $archivedInDashboard,
            'attachedStylesheets' => $attachedStylesheets,
            'authorName' => $authorName,
            'blogAuthorID' => $blogAuthorID,
            'campaign' => $campaign,
            'categoryID' => $categoryID,
            'contentGroupID' => $contentGroupID,
            'contentTypeCategory' => $contentTypeCategory,
            'created' => $created,
            'createdByID' => $createdByID,
            'currentlyPublished' => $currentlyPublished,
            'currentState' => $currentState,
            'domain' => $domain,
            'dynamicPageDataSourceID' => $dynamicPageDataSourceID,
            'dynamicPageDataSourceType' => $dynamicPageDataSourceType,
            'dynamicPageHubDBTableID' => $dynamicPageHubDBTableID,
            'enableDomainStylesheets' => $enableDomainStylesheets,
            'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
            'enableLayoutStylesheets' => $enableLayoutStylesheets,
            'featuredImage' => $featuredImage,
            'featuredImageAltText' => $featuredImageAltText,
            'folderID' => $folderID,
            'footerHTML' => $footerHTML,
            'headHTML' => $headHTML,
            'htmlTitle' => $htmlTitle,
            'includeDefaultCustomCss' => $includeDefaultCustomCss,
            'language' => $language,
            'layoutSections' => $layoutSections,
            'linkRelCanonicalURL' => $linkRelCanonicalURL,
            'mabExperimentID' => $mabExperimentID,
            'metaDescription' => $metaDescription,
            'name' => $name,
            'pageExpiryDate' => $pageExpiryDate,
            'pageExpiryEnabled' => $pageExpiryEnabled,
            'pageExpiryRedirectID' => $pageExpiryRedirectID,
            'pageExpiryRedirectURL' => $pageExpiryRedirectURL,
            'password' => $password,
            'postBody' => $postBody,
            'postSummary' => $postSummary,
            'publicAccessRules' => $publicAccessRules,
            'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
            'publishDate' => $publishDate,
            'publishImmediately' => $publishImmediately,
            'rssBody' => $rssBody,
            'rssSummary' => $rssSummary,
            'slug' => $slug,
            'state' => $state,
            'tagIDs' => $tagIDs,
            'themeSettingsValues' => $themeSettingsValues,
            'translatedFromID' => $translatedFromID,
            'translations' => $translations,
            'updated' => $updated,
            'updatedByID' => $updatedByID,
            'url' => $url,
            'useFeaturedImage' => $useFeaturedImage,
            'widgetContainers' => $widgetContainers,
            'widgets' => $widgets,
        ];

        return $this->updateDraftRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateDraftRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        [$parsed, $options] = PostUpdateDraftParams::parseRequest(
            $params,
            $requestOptions
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
     * Update languages of multi-language group
     *
     * @param array<string, string> $languages
     * @param string $primaryID
     *
     * @throws APIException
     */
    public function updateLangs(
        $languages,
        $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['languages' => $languages, 'primaryID' => $primaryID];

        return $this->updateLangsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateLangsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = PostUpdateLangsParams::parseRequest(
            $params,
            $requestOptions
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
