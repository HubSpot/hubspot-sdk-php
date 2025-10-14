<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\ContentLanguageVariation;
use HubspotSDK\Cms\Blogs\Posts\LayoutSection;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PostsContract
{
    /**
     * @api
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id the unique ID of the blog post
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus> $abStatus
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
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created the post
     * @param bool $currentlyPublished
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
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
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @param bool $archived whether to return only results that have been deleted
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param \HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language> $language designated language of the object to add to a multi-language group
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
    ): mixed;

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
    ): mixed;

    /**
     * @api
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionBlogPost;

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
        ?RequestOptions $requestOptions = null,
    ): VersionBlogPost;

    /**
     * @api
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
    ): Page;

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
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

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
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id the unique ID of the blog post
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus> $abStatus
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
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created the post
     * @param bool $currentlyPublished
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
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
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
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
    ): mixed;

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
    ): mixed;
}
