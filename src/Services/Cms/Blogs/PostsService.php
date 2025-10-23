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
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\ContentLanguageVariation;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubspotSDK\Services\Cms\Blogs\Posts\BatchService;

use const HubspotSDK\Core\OMIT as omit;

final class PostsService implements PostsContract
{
    /**
     * @@api
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
     * @param string $id the unique ID of the blog post
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created the post
     * @param bool $currentlyPublished
     * @param CurrentState|value-of<CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param Language|value-of<Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an enumeration describing the current publish state of the post
     * @param list<int> $tagIDs the IDs of the tags associated with this post
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,
     * mixed,> $widgets A data structure containing the data for all the modules for this page
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
     * Partially updates a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $id the unique ID of the blog post
     * @param PostUpdateParams\AbStatus|value-of<PostUpdateParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param PostUpdateParams\ContentTypeCategory|value-of<PostUpdateParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created the post
     * @param bool $currentlyPublished
     * @param PostUpdateParams\CurrentState|value-of<PostUpdateParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param PostUpdateParams\Language|value-of<PostUpdateParams\Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an enumeration describing the current publish state of the post
     * @param list<int> $tagIDs the IDs of the tags associated with this post
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,
     * mixed,> $widgets A data structure containing the data for all the modules for this page
     * @param bool $archived Specifies whether to update deleted blog posts. Defaults to `false`.
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
     * Retrieve all blog posts, with paging and filtering options. This method would be useful for an integration that ingests posts and suggests edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted blog posts. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return blog posts created after the specified time
     * @param \DateTimeInterface $createdAt only return blog posts created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return blog posts created before the specified time
     * @param int $limit The maximum number of results to return. Default is 20.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `createdAt` (default), `name`, `updatedAt`, `createdBy`, `updatedBy`.
     * @param \DateTimeInterface $updatedAfter only return blog posts last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return blog posts last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return blog posts last updated before the specified time
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
     * Delete a blog post by ID.
     *
     * @param bool $archived whether to return only results that have been deleted
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
     * Attach a blog post to a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param string $language designated language of the object to add to a multi-language group
     * @param string $primaryID ID of primary language object in multi-language group
     * @param string $primaryLanguage primary language of the multi-language group
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
     * Clone a blog post, making a copy of it in a new blog post.
     *
     * @param string $id ID of the object to be cloned
     * @param string $cloneName name of the cloned object
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
     * Create a new language variation from an existing blog post
     *
     * @param string $id ID of blog post to clone
     * @param string $language target language of new variant
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
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param string $id ID of the object to remove from a multi-language group
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
     * Retrieve all the previous versions of a blog post.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->getPreviousVersionsRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
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
     * Retrieve a blog post by the post ID.
     *
     * @param bool $archived Specifies whether to return deleted blog posts. Defaults to `false`.
     * @param string $property specific properties to return
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
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
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
     * Schedule a blog post to be published at a specified time.
     *
     * @param string $id the ID of the object to be scheduled
     * @param \DateTimeInterface $publishDate the date the object should transition from scheduled to published
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
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param string $id ID of object to set as primary in multi-language group
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
     * Partially updates the draft version of a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $id the unique ID of the blog post
     * @param PostUpdateDraftParams\AbStatus|value-of<PostUpdateDraftParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param PostUpdateDraftParams\ContentTypeCategory|value-of<PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created the post
     * @param bool $currentlyPublished
     * @param PostUpdateDraftParams\CurrentState|value-of<PostUpdateDraftParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param PostUpdateDraftParams\Language|value-of<PostUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an enumeration describing the current publish state of the post
     * @param list<int> $tagIDs the IDs of the tags associated with this post
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,
     * mixed,> $widgets A data structure containing the data for all the modules for this page
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
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array<string,
     * string,> $languages Map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
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
