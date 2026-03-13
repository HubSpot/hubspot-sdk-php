<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubspotSDK\Services\Cms\Blogs\Posts\BatchService;

/**
 * @phpstan-import-type PagesContentLanguageVariationShape from \HubspotSDK\Cms\Pages\PagesContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public PostsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a new blog post, specifying its content in the request body.
     *
     * @param string $id the unique ID of the blog post
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param string $createdByID the ID of the user that created the post
     * @param CurrentState|value-of<CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param Language|value-of<Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,mixed> $layoutSections
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
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
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
     * @param array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape> $translations
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        AbStatus|string $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        CurrentState|string $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        Language|string $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        \DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        \DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially updates a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $objectID path param: The ID of the blog post to update
     * @param string $id body param: The unique ID of the blog post
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus> $abStatus Body param
     * @param string $abTestID Body param
     * @param int $archivedAt body param: The timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard body param: If True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets Body param: List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName body param: The name of the blog author associated with the post
     * @param string $blogAuthorID body param: The ID of the blog author associated with this post
     * @param string $campaign body param: The GUID of the marketing campaign the post is associated with
     * @param int $categoryID body param: ID of the object type
     * @param string $contentGroupID body param: The ID of the post's parent blog
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory> $contentTypeCategory Body param: An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created Body param
     * @param string $createdByID body param: The ID of the user that created the post
     * @param bool $currentlyPublished Body param
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState> $currentState Body param: A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain Body param: The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageDataSourceID Body param
     * @param int $dynamicPageDataSourceType Body param
     * @param string $dynamicPageHubDBTableID body param: For dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride body param: Boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage body param: The featuredImage of this Blog Post
     * @param string $featuredImageAltText body param: Alt Text of the featuredImage
     * @param string $folderID Body param
     * @param string $footerHTML body param: Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Body param: Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle body param: The HTML title of the post
     * @param bool $includeDefaultCustomCss body param: Boolean to determine whether or not the Primary CSS Files should be applied
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language> $language Body param: The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,mixed> $layoutSections Body param
     * @param string $linkRelCanonicalURL body param: Optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID Body param
     * @param string $metaDescription body param: A description that goes in <meta> tag on the page
     * @param string $name body param: The internal name of the post
     * @param int $pageExpiryDate Body param
     * @param bool $pageExpiryEnabled Body param
     * @param int $pageExpiryRedirectID Body param
     * @param string $pageExpiryRedirectURL Body param
     * @param string $password Body param: Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody body param: The HTML of the main post body
     * @param string $postSummary body param: The summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules body param: Rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled body param: Boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate body param: The date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately body param: Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody body param: The contents of the RSS body for this Blog Post
     * @param string $rssSummary body param: The contents of the RSS summary for this Blog Post
     * @param string $slug Body param: The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state body param: An enumeration describing the current publish state of the post
     * @param list<int> $tagIDs body param: The IDs of the tags associated with this post
     * @param array<string,mixed> $themeSettingsValues Body param
     * @param string $translatedFromID body param: ID of the primary blog post that this post was translated from
     * @param array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape> $translations Body param
     * @param \DateTimeInterface $updated Body param
     * @param string $updatedByID body param: The ID of the user that updated the post
     * @param string $url body param: A generated field representing the URL of this blog post
     * @param bool $useFeaturedImage body param: Boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers Body param: A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets body param: A data structure containing the data for all the modules for this page
     * @param bool $archived Query param: Specifies whether to update deleted blog posts. Defaults to `false`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|string $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|string $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|string $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        \DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        \DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `createdAt` (default), `name`, `updatedAt`, `createdBy`, `updatedBy`.
     * @param \DateTimeInterface $updatedAfter only return blog posts last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return blog posts last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return blog posts last updated before the specified time
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a blog post by ID.
     *
     * @param string $objectID the ID of the blog post to delete
     * @param bool $archived whether to return only results that have been deleted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'language' => $language,
                'primaryID' => $primaryID,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachToLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clone a blog post, making a copy of it in a new blog post.
     *
     * @param string $id ID of the object to be cloned
     * @param string $cloneName name of the cloned object
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clone(
        string $id,
        ?string $cloneName = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(['id' => $id, 'cloneName' => $cloneName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog post
     *
     * @param string $id ID of blog post to clone
     * @param string $language target language of new variant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createLangVariation(
        string $id,
        ?string $language = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(['id' => $id, 'language' => $language]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLangVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param string $id ID of the object to remove from a multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->detachFromLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a blog post by the post ID.
     *
     * @param string $objectID the ID of the blog post to retrieve
     * @param bool $archived Specifies whether to return deleted blog posts. Defaults to `false`.
     * @param string $property specific properties to return
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(
            ['archived' => $archived, 'property' => $property]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a blog post.
     *
     * @param string $objectID the ID of the blog post to retrieve the draft of
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BlogPost {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraftByID($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a previous version of a blog post.
     *
     * @param string $revisionID the ID of the version to retrieve
     * @param string $objectID the ID of the blog post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): VersionBlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a blog post.
     *
     * @param string $objectID the ID of the blog post to retrieve previous versions of
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
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
        $response = $this->raw->getPreviousVersions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Publish the draft version of the blog post, sending its content to the live page.
     *
     * @param string $objectID the ID of the post to publish
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pushLive($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discard all drafted content, resetting the draft to contain the content in the currently published version.
     *
     * @param string $objectID the ID of the blog post to reset
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Restores a blog post to one of its previous versions.
     *
     * @param string $revisionID the ID of the version to restore the blog post to
     * @param string $objectID the ID of the blog post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
     *
     * @param int $revisionID the ID of the version to restore the blog post to
     * @param string $objectID the ID of the blog post
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        string $objectID,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Schedule a blog post to be published at a specified time.
     *
     * @param string $id the ID of the object to be scheduled
     * @param \DateTimeInterface $publishDate the date the object should transition from scheduled to published
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function schedule(
        string $id,
        \DateTimeInterface $publishDate,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['id' => $id, 'publishDate' => $publishDate]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->schedule(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param string $id ID of object to set as primary in multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially updates the draft version of a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $objectID the ID of the blog post to update the draft of
     * @param string $id the unique ID of the blog post
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus> $abStatus
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param string $createdByID the ID of the user that created the post
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,mixed> $layoutSections
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
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
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
     * @param array<string,PagesContentLanguageVariation|PagesContentLanguageVariationShape> $translations
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        string $id,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|string $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|string $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|string $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        \DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        \DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
        RequestOptions|array|null $requestOptions = null,
    ): BlogPost {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLangs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
