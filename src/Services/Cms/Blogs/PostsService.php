<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubSpotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubSpotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubSpotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubSpotSDK\Cms\ContentLanguageVariation;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubSpotSDK\Services\Cms\Blogs\Posts\BatchService;
use HubSpotSDK\Services\Cms\Blogs\Posts\MultiLanguageService;
use HubSpotSDK\Services\Cms\Blogs\Posts\RevisionsService;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubSpotSDK\Cms\ContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @api
     */
    public MultiLanguageService $multiLanguage;

    /**
     * @api
     */
    public RevisionsService $revisions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
        $this->batch = new BatchService($client);
        $this->multiLanguage = new MultiLanguageService($client);
        $this->revisions = new RevisionsService($client);
    }

    /**
     * @api
     *
     * Create a new blog post, specifying its content in the request body.
     *
     * @param string $id the unique ID of the Blog Post
     * @param AbStatus|value-of<AbStatus> $abStatus The status of the AB test associated with this blog post, if applicable
     *
     * Available options: automated_loser_variant, automated_master, automated_variant, loser_variant, mab_master, mab_variant, master, variant
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this Blog Post
     * @param string $blogAuthorID the ID of the Blog Author associated with this Blog Post
     * @param string $campaign the GUID of the marketing campaign this Blog Post is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID the ID of the parent Blog this Blog Post is associated with
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created the timestamp (ISO8601 format) when this Blog Post was created
     * @param string $createdByID the ID of the user that created this Blog Post
     * @param bool $currentlyPublished Whether the post is published (true or false)
     * @param CurrentState|value-of<CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain this Blog Post will resolve to. If null, the Blog Post will default to the domain of the ParentBlog.
     * @param string $dynamicPageDataSourceID the identifier for the data source used by the dynamic page
     * @param int $dynamicPageDataSourceType the type of data source used by the dynamic page
     * @param string $dynamicPageHubDBTableID The ID of the HubDB table this Blog Post references, if applicable
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID Unique identifier of associated folder
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the html title of this Blog Post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param Language|value-of<Language> $language The explicitly defined ISO 639 language code of the Blog Post. If null, the Blog Post will default to the language of the ParentBlog.
     * @param array<string,mixed> $layoutSections a structure detailing the layout sections of the blog post
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID Unique identifier of the MAB Experiment
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the Blog Post
     * @param int $pageExpiryDate the date at which this blog post should expire and begin redirecting to another url or page
     * @param bool $pageExpiryEnabled boolean describing if the page expiration feature is enabled for this blog post
     * @param int $pageExpiryRedirectID The ID of another page this blog post's url should redirect to once this blog post expires. Should only set this or pageExpiryRedirectUrl.
     * @param string $pageExpiryRedirectURL The URL this blog post's url should redirect to once it expires. Should only set this or pageExpiryRedirectId.
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The path of the this blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an ENUM descibing the current state of this Blog Post
     * @param list<int> $tagIDs list of IDs for the tags associated with this Blog Post
     * @param array<string,mixed> $themeSettingsValues a collection of settings specific to the theme applied to the blog post
     * @param string $translatedFromID ID of the primary blog post this object was translated from
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations a map of translations for the blog post, each associated with a specific language variation
     * @param \DateTimeInterface $updated the timestamp (ISO8601 format) when this Blog Post was updated
     * @param string $updatedByID the ID of the user that updated this Blog Post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featuredImage
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
    ): string {
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
     * @param string $objectID Path param
     * @param string $id body param: The unique ID of the Blog Post
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus> $abStatus Body param: The status of the AB test associated with this blog post, if applicable
     *
     * Available options: automated_loser_variant, automated_master, automated_variant, loser_variant, mab_master, mab_variant, master, variant
     * @param string $abTestID Body param: The ID of the AB test associated with this page, if applicable
     * @param int $archivedAt body param: The timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard body param: If True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets Body param: List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName body param: The name of the user that updated this Blog Post
     * @param string $blogAuthorID body param: The ID of the Blog Author associated with this Blog Post
     * @param string $campaign body param: The GUID of the marketing campaign this Blog Post is a part of
     * @param int $categoryID Body param: ID of the type of object this is. Should always .
     * @param string $contentGroupID body param: The ID of the parent Blog this Blog Post is associated with
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory> $contentTypeCategory Body param: An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created body param: The timestamp (ISO8601 format) when this Blog Post was created
     * @param string $createdByID body param: The ID of the user that created this Blog Post
     * @param bool $currentlyPublished Body param: Whether the post is published (true or false)
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState> $currentState Body param: A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain Body param: The domain this Blog Post will resolve to. If null, the Blog Post will default to the domain of the ParentBlog.
     * @param string $dynamicPageDataSourceID body param: The identifier for the data source used by the dynamic page
     * @param int $dynamicPageDataSourceType body param: The type of data source used by the dynamic page
     * @param string $dynamicPageHubDBTableID Body param: The ID of the HubDB table this Blog Post references, if applicable
     * @param bool $enableDomainStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride body param: Boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage body param: The featuredImage of this Blog Post
     * @param string $featuredImageAltText body param: Alt Text of the featuredImage
     * @param string $folderID Body param: Unique identifier of associated folder
     * @param string $footerHTML body param: Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Body param: Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle body param: The html title of this Blog Post
     * @param bool $includeDefaultCustomCss body param: Boolean to determine whether or not the Primary CSS Files should be applied
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\Language> $language Body param: The explicitly defined ISO 639 language code of the Blog Post. If null, the Blog Post will default to the language of the ParentBlog.
     * @param array<string,mixed> $layoutSections body param: A structure detailing the layout sections of the blog post
     * @param string $linkRelCanonicalURL body param: Optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID Body param: Unique identifier of the MAB Experiment
     * @param string $metaDescription body param: A description that goes in <meta> tag on the page
     * @param string $name body param: The internal name of the Blog Post
     * @param int $pageExpiryDate body param: The date at which this blog post should expire and begin redirecting to another url or page
     * @param bool $pageExpiryEnabled body param: Boolean describing if the page expiration feature is enabled for this blog post
     * @param int $pageExpiryRedirectID Body param: The ID of another page this blog post's url should redirect to once this blog post expires. Should only set this or pageExpiryRedirectUrl.
     * @param string $pageExpiryRedirectURL Body param: The URL this blog post's url should redirect to once it expires. Should only set this or pageExpiryRedirectId.
     * @param string $password Body param: Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody body param: The HTML of the main post body
     * @param string $postSummary body param: The summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules body param: Rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled body param: Boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate body param: The date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately body param: Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody body param: The contents of the RSS body for this Blog Post
     * @param string $rssSummary body param: The contents of the RSS summary for this Blog Post
     * @param string $slug Body param: The path of the this blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state body param: An ENUM descibing the current state of this Blog Post
     * @param list<int> $tagIDs body param: List of IDs for the tags associated with this Blog Post
     * @param array<string,mixed> $themeSettingsValues body param: A collection of settings specific to the theme applied to the blog post
     * @param string $translatedFromID body param: ID of the primary blog post this object was translated from
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations body param: A map of translations for the blog post, each associated with a specific language variation
     * @param \DateTimeInterface $updated body param: The timestamp (ISO8601 format) when this Blog Post was updated
     * @param string $updatedByID body param: The ID of the user that updated this Blog Post
     * @param string $url body param: A generated field representing the URL of this blog post
     * @param bool $useFeaturedImage body param: Boolean to determine if this post should use a featuredImage
     * @param array<string,mixed> $widgetContainers Body param: A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets body param: A data structure containing the data for all the modules for this page
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|string $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|string $currentState,
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
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|string $language,
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
    ): string {
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
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
    ): string {
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
     * @param bool $archived whether to return only results that have been archived
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
    ): string {
        $params = Util::removeNulls(['id' => $id, 'cloneName' => $cloneName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a blog post by the post ID.
     *
     * @param bool $archived whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraftByID($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAuthors(
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
    ): string {
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
        $response = $this->raw->listAuthors(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTags(
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
    ): string {
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
        $response = $this->raw->listTags(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Publish the draft version of the blog post, sending its content to the live page.
     *
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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function query(
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
    ): string {
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
        $response = $this->raw->query(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function queryAuthors(
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
    ): string {
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
        $response = $this->raw->queryAuthors(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function queryTags(
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
    ): string {
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
        $response = $this->raw->queryTags(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discard all drafted content, resetting the draft to contain the content in the currently published version.
     *
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
     * Partially updates the draft version of a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $id the unique ID of the Blog Post
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus> $abStatus The status of the AB test associated with this blog post, if applicable
     *
     * Available options: automated_loser_variant, automated_master, automated_variant, loser_variant, mab_master, mab_variant, master, variant
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this Blog Post
     * @param string $blogAuthorID the ID of the Blog Author associated with this Blog Post
     * @param string $campaign the GUID of the marketing campaign this Blog Post is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID the ID of the parent Blog this Blog Post is associated with
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param \DateTimeInterface $created the timestamp (ISO8601 format) when this Blog Post was created
     * @param string $createdByID the ID of the user that created this Blog Post
     * @param bool $currentlyPublished Whether the post is published (true or false)
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState> $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain this Blog Post will resolve to. If null, the Blog Post will default to the domain of the ParentBlog.
     * @param string $dynamicPageDataSourceID the identifier for the data source used by the dynamic page
     * @param int $dynamicPageDataSourceType the type of data source used by the dynamic page
     * @param string $dynamicPageHubDBTableID The ID of the HubDB table this Blog Post references, if applicable
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID Unique identifier of associated folder
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the html title of this Blog Post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|value-of<\HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the Blog Post. If null, the Blog Post will default to the language of the ParentBlog.
     * @param array<string,mixed> $layoutSections a structure detailing the layout sections of the blog post
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID Unique identifier of the MAB Experiment
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the Blog Post
     * @param int $pageExpiryDate the date at which this blog post should expire and begin redirecting to another url or page
     * @param bool $pageExpiryEnabled boolean describing if the page expiration feature is enabled for this blog post
     * @param int $pageExpiryRedirectID The ID of another page this blog post's url should redirect to once this blog post expires. Should only set this or pageExpiryRedirectUrl.
     * @param string $pageExpiryRedirectURL The URL this blog post's url should redirect to once it expires. Should only set this or pageExpiryRedirectId.
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The path of the this blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an ENUM descibing the current state of this Blog Post
     * @param list<int> $tagIDs list of IDs for the tags associated with this Blog Post
     * @param array<string,mixed> $themeSettingsValues a collection of settings specific to the theme applied to the blog post
     * @param string $translatedFromID ID of the primary blog post this object was translated from
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations a map of translations for the blog post, each associated with a specific language variation
     * @param \DateTimeInterface $updated the timestamp (ISO8601 format) when this Blog Post was updated
     * @param string $updatedByID the ID of the user that updated this Blog Post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featuredImage
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        string $id,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|string $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|string $currentState,
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
        \HubSpotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|string $language,
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
    ): string {
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
}
