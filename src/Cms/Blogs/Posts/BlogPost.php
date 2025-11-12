<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\BlogPost\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\Language;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * Model definition for a Blog Post.
 *
 * @phpstan-type BlogPostShape = array{
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
 *   contentTypeCategory: value-of<ContentTypeCategory>,
 *   created: \DateTimeInterface,
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
 *   layoutSections: array<string,LayoutSection>,
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
 *   publishDate: \DateTimeInterface,
 *   publishImmediately: bool,
 *   rssBody: string,
 *   rssSummary: string,
 *   slug: string,
 *   state: string,
 *   tagIds: list<int>,
 *   themeSettingsValues: array<string,mixed>,
 *   translatedFromId: string,
 *   translations: array<string,PagesContentLanguageVariation>,
 *   updated: \DateTimeInterface,
 *   updatedById: string,
 *   url: string,
 *   useFeaturedImage: bool,
 *   widgetContainers: array<string,mixed>,
 *   widgets: array<string,mixed>,
 * }
 */
final class BlogPost implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BlogPostShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The unique ID of the blog post.
     */
    #[Api]
    public string $id;

    /** @var value-of<AbStatus> $abStatus */
    #[Api(enum: AbStatus::class)]
    public string $abStatus;

    #[Api]
    public string $abTestId;

    /**
     * The timestamp (ISO8601 format) when this Blog Post was deleted.
     */
    #[Api]
    public int $archivedAt;

    /**
     * If True, the post will not show up in your dashboard, although the post could still be live.
     */
    #[Api]
    public bool $archivedInDashboard;

    /**
     * List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @var list<array<string,mixed>> $attachedStylesheets
     */
    #[Api(list: new MapOf('mixed'))]
    public array $attachedStylesheets;

    /**
     * The name of the blog author associated with the post.
     */
    #[Api]
    public string $authorName;

    /**
     * The ID of the blog author associated with this post.
     */
    #[Api]
    public string $blogAuthorId;

    /**
     * The GUID of the marketing campaign the post is associated with.
     */
    #[Api]
    public string $campaign;

    /**
     * ID of the object type.
     */
    #[Api]
    public int $categoryId;

    /**
     * The ID of the post's parent blog.
     */
    #[Api]
    public string $contentGroupId;

    /**
     * An ENUM descibing the type of this object. Should always be BLOG_POST.
     *
     * @var value-of<ContentTypeCategory> $contentTypeCategory
     */
    #[Api(enum: ContentTypeCategory::class)]
    public string $contentTypeCategory;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The ID of the user that created the post.
     */
    #[Api]
    public string $createdById;

    #[Api]
    public bool $currentlyPublished;

    /**
     * A generated ENUM descibing the current state of this Blog Post. Should always match state.
     *
     * @var value-of<CurrentState> $currentState
     */
    #[Api(enum: CurrentState::class)]
    public string $currentState;

    /**
     * The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     */
    #[Api]
    public string $domain;

    #[Api]
    public string $dynamicPageDataSourceId;

    #[Api]
    public int $dynamicPageDataSourceType;

    /**
     * For dynamic HubDB pages,
     * the ID of the HubDB table this post references.
     */
    #[Api]
    public string $dynamicPageHubDbTableId;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Api]
    public bool $enableDomainStylesheets;

    /**
     * Boolean to allow overriding the AMP settings for the blog.
     */
    #[Api]
    public bool $enableGoogleAmpOutputOverride;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Api]
    public bool $enableLayoutStylesheets;

    /**
     * The featuredImage of this Blog Post.
     */
    #[Api]
    public string $featuredImage;

    /**
     * Alt Text of the featuredImage.
     */
    #[Api]
    public string $featuredImageAltText;

    #[Api]
    public string $folderId;

    /**
     * Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page.
     */
    #[Api]
    public string $footerHtml;

    /**
     * Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     */
    #[Api]
    public string $headHtml;

    /**
     * The HTML title of the post.
     */
    #[Api]
    public string $htmlTitle;

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    #[Api]
    public bool $includeDefaultCustomCss;

    /**
     * The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     *
     * @var value-of<Language> $language
     */
    #[Api(enum: Language::class)]
    public string $language;

    /** @var array<string,LayoutSection> $layoutSections */
    #[Api(map: LayoutSection::class)]
    public array $layoutSections;

    /**
     * Optional override to set the URL to be used in the rel=canonical link tag on the page.
     */
    #[Api]
    public string $linkRelCanonicalUrl;

    #[Api]
    public string $mabExperimentId;

    /**
     * A description that goes in <meta> tag on the page.
     */
    #[Api]
    public string $metaDescription;

    /**
     * The internal name of the post.
     */
    #[Api]
    public string $name;

    #[Api]
    public int $pageExpiryDate;

    #[Api]
    public bool $pageExpiryEnabled;

    #[Api]
    public int $pageExpiryRedirectId;

    #[Api]
    public string $pageExpiryRedirectUrl;

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    #[Api]
    public string $password;

    /**
     * The HTML of the main post body.
     */
    #[Api]
    public string $postBody;

    /**
     * The summary of the blog post that will appear on the main listing page.
     */
    #[Api]
    public string $postSummary;

    /**
     * Rules for require member registration to access private content.
     *
     * @var list<mixed> $publicAccessRules
     */
    #[Api(list: 'mixed')]
    public array $publicAccessRules;

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    #[Api]
    public bool $publicAccessRulesEnabled;

    /**
     * The date (ISO8601 format) the blog post is to be published at.
     */
    #[Api]
    public \DateTimeInterface $publishDate;

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    #[Api]
    public bool $publishImmediately;

    /**
     * The contents of the RSS body for this Blog Post.
     */
    #[Api]
    public string $rssBody;

    /**
     * The contents of the RSS summary for this Blog Post.
     */
    #[Api]
    public string $rssSummary;

    /**
     * The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     */
    #[Api]
    public string $slug;

    /**
     * An enumeration describing the current publish state of the post.
     */
    #[Api]
    public string $state;

    /**
     * The IDs of the tags associated with this post.
     *
     * @var list<int> $tagIds
     */
    #[Api(list: 'int')]
    public array $tagIds;

    /** @var array<string,mixed> $themeSettingsValues */
    #[Api(map: 'mixed')]
    public array $themeSettingsValues;

    /**
     * ID of the primary blog post that this post was translated from.
     */
    #[Api]
    public string $translatedFromId;

    /** @var array<string,PagesContentLanguageVariation> $translations */
    #[Api(map: PagesContentLanguageVariation::class)]
    public array $translations;

    #[Api]
    public \DateTimeInterface $updated;

    /**
     * The ID of the user that updated the post.
     */
    #[Api]
    public string $updatedById;

    /**
     * A generated field representing the URL of this blog post.
     */
    #[Api]
    public string $url;

    /**
     * Boolean to determine if this post should use a featured image.
     */
    #[Api]
    public bool $useFeaturedImage;

    /**
     * A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     *
     * @var array<string,mixed> $widgetContainers
     */
    #[Api(map: 'mixed')]
    public array $widgetContainers;

    /**
     * A data structure containing the data for all the modules for this page.
     *
     * @var array<string,mixed> $widgets
     */
    #[Api(map: 'mixed')]
    public array $widgets;

    /**
     * `new BlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogPost::with(
     *   id: ...,
     *   abStatus: ...,
     *   abTestId: ...,
     *   archivedAt: ...,
     *   archivedInDashboard: ...,
     *   attachedStylesheets: ...,
     *   authorName: ...,
     *   blogAuthorId: ...,
     *   campaign: ...,
     *   categoryId: ...,
     *   contentGroupId: ...,
     *   contentTypeCategory: ...,
     *   created: ...,
     *   createdById: ...,
     *   currentlyPublished: ...,
     *   currentState: ...,
     *   domain: ...,
     *   dynamicPageDataSourceId: ...,
     *   dynamicPageDataSourceType: ...,
     *   dynamicPageHubDbTableId: ...,
     *   enableDomainStylesheets: ...,
     *   enableGoogleAmpOutputOverride: ...,
     *   enableLayoutStylesheets: ...,
     *   featuredImage: ...,
     *   featuredImageAltText: ...,
     *   folderId: ...,
     *   footerHtml: ...,
     *   headHtml: ...,
     *   htmlTitle: ...,
     *   includeDefaultCustomCss: ...,
     *   language: ...,
     *   layoutSections: ...,
     *   linkRelCanonicalUrl: ...,
     *   mabExperimentId: ...,
     *   metaDescription: ...,
     *   name: ...,
     *   pageExpiryDate: ...,
     *   pageExpiryEnabled: ...,
     *   pageExpiryRedirectId: ...,
     *   pageExpiryRedirectUrl: ...,
     *   password: ...,
     *   postBody: ...,
     *   postSummary: ...,
     *   publicAccessRules: ...,
     *   publicAccessRulesEnabled: ...,
     *   publishDate: ...,
     *   publishImmediately: ...,
     *   rssBody: ...,
     *   rssSummary: ...,
     *   slug: ...,
     *   state: ...,
     *   tagIds: ...,
     *   themeSettingsValues: ...,
     *   translatedFromId: ...,
     *   translations: ...,
     *   updated: ...,
     *   updatedById: ...,
     *   url: ...,
     *   useFeaturedImage: ...,
     *   widgetContainers: ...,
     *   widgets: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogPost)
     *   ->withID(...)
     *   ->withAbStatus(...)
     *   ->withAbTestID(...)
     *   ->withArchivedAt(...)
     *   ->withArchivedInDashboard(...)
     *   ->withAttachedStylesheets(...)
     *   ->withAuthorName(...)
     *   ->withBlogAuthorID(...)
     *   ->withCampaign(...)
     *   ->withCategoryID(...)
     *   ->withContentGroupID(...)
     *   ->withContentTypeCategory(...)
     *   ->withCreated(...)
     *   ->withCreatedByID(...)
     *   ->withCurrentlyPublished(...)
     *   ->withCurrentState(...)
     *   ->withDomain(...)
     *   ->withDynamicPageDataSourceID(...)
     *   ->withDynamicPageDataSourceType(...)
     *   ->withDynamicPageHubDBTableID(...)
     *   ->withEnableDomainStylesheets(...)
     *   ->withEnableGoogleAmpOutputOverride(...)
     *   ->withEnableLayoutStylesheets(...)
     *   ->withFeaturedImage(...)
     *   ->withFeaturedImageAltText(...)
     *   ->withFolderID(...)
     *   ->withFooterHTML(...)
     *   ->withHeadHTML(...)
     *   ->withHTMLTitle(...)
     *   ->withIncludeDefaultCustomCss(...)
     *   ->withLanguage(...)
     *   ->withLayoutSections(...)
     *   ->withLinkRelCanonicalURL(...)
     *   ->withMabExperimentID(...)
     *   ->withMetaDescription(...)
     *   ->withName(...)
     *   ->withPageExpiryDate(...)
     *   ->withPageExpiryEnabled(...)
     *   ->withPageExpiryRedirectID(...)
     *   ->withPageExpiryRedirectURL(...)
     *   ->withPassword(...)
     *   ->withPostBody(...)
     *   ->withPostSummary(...)
     *   ->withPublicAccessRules(...)
     *   ->withPublicAccessRulesEnabled(...)
     *   ->withPublishDate(...)
     *   ->withPublishImmediately(...)
     *   ->withRssBody(...)
     *   ->withRssSummary(...)
     *   ->withSlug(...)
     *   ->withState(...)
     *   ->withTagIDs(...)
     *   ->withThemeSettingsValues(...)
     *   ->withTranslatedFromID(...)
     *   ->withTranslations(...)
     *   ->withUpdated(...)
     *   ->withUpdatedByID(...)
     *   ->withURL(...)
     *   ->withUseFeaturedImage(...)
     *   ->withWidgetContainers(...)
     *   ->withWidgets(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param list<array<string,mixed>> $attachedStylesheets
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     * @param CurrentState|value-of<CurrentState> $currentState
     * @param Language|value-of<Language> $language
     * @param array<string,LayoutSection> $layoutSections
     * @param list<mixed> $publicAccessRules
     * @param list<int> $tagIds
     * @param array<string,mixed> $themeSettingsValues
     * @param array<string,PagesContentLanguageVariation> $translations
     * @param array<string,mixed> $widgetContainers
     * @param array<string,mixed> $widgets
     */
    public static function with(
        string $id,
        AbStatus|string $abStatus,
        string $abTestId,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorId,
        string $campaign,
        int $categoryId,
        string $contentGroupId,
        ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdById,
        bool $currentlyPublished,
        CurrentState|string $currentState,
        string $domain,
        string $dynamicPageDataSourceId,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDbTableId,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderId,
        string $footerHtml,
        string $headHtml,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        Language|string $language,
        array $layoutSections,
        string $linkRelCanonicalUrl,
        string $mabExperimentId,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectId,
        string $pageExpiryRedirectUrl,
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
        array $tagIds,
        array $themeSettingsValues,
        string $translatedFromId,
        array $translations,
        \DateTimeInterface $updated,
        string $updatedById,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['abStatus'] = $abStatus;
        $obj->abTestId = $abTestId;
        $obj->archivedAt = $archivedAt;
        $obj->archivedInDashboard = $archivedInDashboard;
        $obj->attachedStylesheets = $attachedStylesheets;
        $obj->authorName = $authorName;
        $obj->blogAuthorId = $blogAuthorId;
        $obj->campaign = $campaign;
        $obj->categoryId = $categoryId;
        $obj->contentGroupId = $contentGroupId;
        $obj['contentTypeCategory'] = $contentTypeCategory;
        $obj->created = $created;
        $obj->createdById = $createdById;
        $obj->currentlyPublished = $currentlyPublished;
        $obj['currentState'] = $currentState;
        $obj->domain = $domain;
        $obj->dynamicPageDataSourceId = $dynamicPageDataSourceId;
        $obj->dynamicPageDataSourceType = $dynamicPageDataSourceType;
        $obj->dynamicPageHubDbTableId = $dynamicPageHubDbTableId;
        $obj->enableDomainStylesheets = $enableDomainStylesheets;
        $obj->enableGoogleAmpOutputOverride = $enableGoogleAmpOutputOverride;
        $obj->enableLayoutStylesheets = $enableLayoutStylesheets;
        $obj->featuredImage = $featuredImage;
        $obj->featuredImageAltText = $featuredImageAltText;
        $obj->folderId = $folderId;
        $obj->footerHtml = $footerHtml;
        $obj->headHtml = $headHtml;
        $obj->htmlTitle = $htmlTitle;
        $obj->includeDefaultCustomCss = $includeDefaultCustomCss;
        $obj['language'] = $language;
        $obj->layoutSections = $layoutSections;
        $obj->linkRelCanonicalUrl = $linkRelCanonicalUrl;
        $obj->mabExperimentId = $mabExperimentId;
        $obj->metaDescription = $metaDescription;
        $obj->name = $name;
        $obj->pageExpiryDate = $pageExpiryDate;
        $obj->pageExpiryEnabled = $pageExpiryEnabled;
        $obj->pageExpiryRedirectId = $pageExpiryRedirectId;
        $obj->pageExpiryRedirectUrl = $pageExpiryRedirectUrl;
        $obj->password = $password;
        $obj->postBody = $postBody;
        $obj->postSummary = $postSummary;
        $obj->publicAccessRules = $publicAccessRules;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;
        $obj->publishDate = $publishDate;
        $obj->publishImmediately = $publishImmediately;
        $obj->rssBody = $rssBody;
        $obj->rssSummary = $rssSummary;
        $obj->slug = $slug;
        $obj->state = $state;
        $obj->tagIds = $tagIds;
        $obj->themeSettingsValues = $themeSettingsValues;
        $obj->translatedFromId = $translatedFromId;
        $obj->translations = $translations;
        $obj->updated = $updated;
        $obj->updatedById = $updatedById;
        $obj->url = $url;
        $obj->useFeaturedImage = $useFeaturedImage;
        $obj->widgetContainers = $widgetContainers;
        $obj->widgets = $widgets;

        return $obj;
    }

    /**
     * The unique ID of the blog post.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $obj = clone $this;
        $obj['abStatus'] = $abStatus;

        return $obj;
    }

    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj->abTestId = $abTestID;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Post was deleted.
     */
    public function withArchivedAt(int $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * If True, the post will not show up in your dashboard, although the post could still be live.
     */
    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $obj = clone $this;
        $obj->archivedInDashboard = $archivedInDashboard;

        return $obj;
    }

    /**
     * List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @param list<array<string,mixed>> $attachedStylesheets
     */
    public function withAttachedStylesheets(array $attachedStylesheets): self
    {
        $obj = clone $this;
        $obj->attachedStylesheets = $attachedStylesheets;

        return $obj;
    }

    /**
     * The name of the blog author associated with the post.
     */
    public function withAuthorName(string $authorName): self
    {
        $obj = clone $this;
        $obj->authorName = $authorName;

        return $obj;
    }

    /**
     * The ID of the blog author associated with this post.
     */
    public function withBlogAuthorID(string $blogAuthorID): self
    {
        $obj = clone $this;
        $obj->blogAuthorId = $blogAuthorID;

        return $obj;
    }

    /**
     * The GUID of the marketing campaign the post is associated with.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    /**
     * ID of the object type.
     */
    public function withCategoryID(int $categoryID): self
    {
        $obj = clone $this;
        $obj->categoryId = $categoryID;

        return $obj;
    }

    /**
     * The ID of the post's parent blog.
     */
    public function withContentGroupID(string $contentGroupID): self
    {
        $obj = clone $this;
        $obj->contentGroupId = $contentGroupID;

        return $obj;
    }

    /**
     * An ENUM descibing the type of this object. Should always be BLOG_POST.
     *
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     */
    public function withContentTypeCategory(
        ContentTypeCategory|string $contentTypeCategory
    ): self {
        $obj = clone $this;
        $obj['contentTypeCategory'] = $contentTypeCategory;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj->created = $created;

        return $obj;
    }

    /**
     * The ID of the user that created the post.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdById = $createdByID;

        return $obj;
    }

    public function withCurrentlyPublished(bool $currentlyPublished): self
    {
        $obj = clone $this;
        $obj->currentlyPublished = $currentlyPublished;

        return $obj;
    }

    /**
     * A generated ENUM descibing the current state of this Blog Post. Should always match state.
     *
     * @param CurrentState|value-of<CurrentState> $currentState
     */
    public function withCurrentState(CurrentState|string $currentState): self
    {
        $obj = clone $this;
        $obj['currentState'] = $currentState;

        return $obj;
    }

    /**
     * The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     */
    public function withDomain(string $domain): self
    {
        $obj = clone $this;
        $obj->domain = $domain;

        return $obj;
    }

    public function withDynamicPageDataSourceID(
        string $dynamicPageDataSourceID
    ): self {
        $obj = clone $this;
        $obj->dynamicPageDataSourceId = $dynamicPageDataSourceID;

        return $obj;
    }

    public function withDynamicPageDataSourceType(
        int $dynamicPageDataSourceType
    ): self {
        $obj = clone $this;
        $obj->dynamicPageDataSourceType = $dynamicPageDataSourceType;

        return $obj;
    }

    /**
     * For dynamic HubDB pages,
     * the ID of the HubDB table this post references.
     */
    public function withDynamicPageHubDBTableID(
        string $dynamicPageHubDBTableID
    ): self {
        $obj = clone $this;
        $obj->dynamicPageHubDbTableId = $dynamicPageHubDBTableID;

        return $obj;
    }

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    public function withEnableDomainStylesheets(
        bool $enableDomainStylesheets
    ): self {
        $obj = clone $this;
        $obj->enableDomainStylesheets = $enableDomainStylesheets;

        return $obj;
    }

    /**
     * Boolean to allow overriding the AMP settings for the blog.
     */
    public function withEnableGoogleAmpOutputOverride(
        bool $enableGoogleAmpOutputOverride
    ): self {
        $obj = clone $this;
        $obj->enableGoogleAmpOutputOverride = $enableGoogleAmpOutputOverride;

        return $obj;
    }

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    public function withEnableLayoutStylesheets(
        bool $enableLayoutStylesheets
    ): self {
        $obj = clone $this;
        $obj->enableLayoutStylesheets = $enableLayoutStylesheets;

        return $obj;
    }

    /**
     * The featuredImage of this Blog Post.
     */
    public function withFeaturedImage(string $featuredImage): self
    {
        $obj = clone $this;
        $obj->featuredImage = $featuredImage;

        return $obj;
    }

    /**
     * Alt Text of the featuredImage.
     */
    public function withFeaturedImageAltText(string $featuredImageAltText): self
    {
        $obj = clone $this;
        $obj->featuredImageAltText = $featuredImageAltText;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderId = $folderID;

        return $obj;
    }

    /**
     * Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page.
     */
    public function withFooterHTML(string $footerHTML): self
    {
        $obj = clone $this;
        $obj->footerHtml = $footerHTML;

        return $obj;
    }

    /**
     * Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     */
    public function withHeadHTML(string $headHTML): self
    {
        $obj = clone $this;
        $obj->headHtml = $headHTML;

        return $obj;
    }

    /**
     * The HTML title of the post.
     */
    public function withHTMLTitle(string $htmlTitle): self
    {
        $obj = clone $this;
        $obj->htmlTitle = $htmlTitle;

        return $obj;
    }

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    public function withIncludeDefaultCustomCss(
        bool $includeDefaultCustomCss
    ): self {
        $obj = clone $this;
        $obj->includeDefaultCustomCss = $includeDefaultCustomCss;

        return $obj;
    }

    /**
     * The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param array<string,LayoutSection> $layoutSections
     */
    public function withLayoutSections(array $layoutSections): self
    {
        $obj = clone $this;
        $obj->layoutSections = $layoutSections;

        return $obj;
    }

    /**
     * Optional override to set the URL to be used in the rel=canonical link tag on the page.
     */
    public function withLinkRelCanonicalURL(string $linkRelCanonicalURL): self
    {
        $obj = clone $this;
        $obj->linkRelCanonicalUrl = $linkRelCanonicalURL;

        return $obj;
    }

    public function withMabExperimentID(string $mabExperimentID): self
    {
        $obj = clone $this;
        $obj->mabExperimentId = $mabExperimentID;

        return $obj;
    }

    /**
     * A description that goes in <meta> tag on the page.
     */
    public function withMetaDescription(string $metaDescription): self
    {
        $obj = clone $this;
        $obj->metaDescription = $metaDescription;

        return $obj;
    }

    /**
     * The internal name of the post.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPageExpiryDate(int $pageExpiryDate): self
    {
        $obj = clone $this;
        $obj->pageExpiryDate = $pageExpiryDate;

        return $obj;
    }

    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $obj = clone $this;
        $obj->pageExpiryEnabled = $pageExpiryEnabled;

        return $obj;
    }

    public function withPageExpiryRedirectID(int $pageExpiryRedirectID): self
    {
        $obj = clone $this;
        $obj->pageExpiryRedirectId = $pageExpiryRedirectID;

        return $obj;
    }

    public function withPageExpiryRedirectURL(
        string $pageExpiryRedirectURL
    ): self {
        $obj = clone $this;
        $obj->pageExpiryRedirectUrl = $pageExpiryRedirectURL;

        return $obj;
    }

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * The HTML of the main post body.
     */
    public function withPostBody(string $postBody): self
    {
        $obj = clone $this;
        $obj->postBody = $postBody;

        return $obj;
    }

    /**
     * The summary of the blog post that will appear on the main listing page.
     */
    public function withPostSummary(string $postSummary): self
    {
        $obj = clone $this;
        $obj->postSummary = $postSummary;

        return $obj;
    }

    /**
     * Rules for require member registration to access private content.
     *
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $obj = clone $this;
        $obj->publicAccessRules = $publicAccessRules;

        return $obj;
    }

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $obj = clone $this;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;

        return $obj;
    }

    /**
     * The date (ISO8601 format) the blog post is to be published at.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    public function withPublishImmediately(bool $publishImmediately): self
    {
        $obj = clone $this;
        $obj->publishImmediately = $publishImmediately;

        return $obj;
    }

    /**
     * The contents of the RSS body for this Blog Post.
     */
    public function withRssBody(string $rssBody): self
    {
        $obj = clone $this;
        $obj->rssBody = $rssBody;

        return $obj;
    }

    /**
     * The contents of the RSS summary for this Blog Post.
     */
    public function withRssSummary(string $rssSummary): self
    {
        $obj = clone $this;
        $obj->rssSummary = $rssSummary;

        return $obj;
    }

    /**
     * The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    /**
     * An enumeration describing the current publish state of the post.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * The IDs of the tags associated with this post.
     *
     * @param list<int> $tagIDs
     */
    public function withTagIDs(array $tagIDs): self
    {
        $obj = clone $this;
        $obj->tagIds = $tagIDs;

        return $obj;
    }

    /**
     * @param array<string,mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $obj = clone $this;
        $obj->themeSettingsValues = $themeSettingsValues;

        return $obj;
    }

    /**
     * ID of the primary blog post that this post was translated from.
     */
    public function withTranslatedFromID(string $translatedFromID): self
    {
        $obj = clone $this;
        $obj->translatedFromId = $translatedFromID;

        return $obj;
    }

    /**
     * @param array<string,PagesContentLanguageVariation> $translations
     */
    public function withTranslations(array $translations): self
    {
        $obj = clone $this;
        $obj->translations = $translations;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj->updated = $updated;

        return $obj;
    }

    /**
     * The ID of the user that updated the post.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedById = $updatedByID;

        return $obj;
    }

    /**
     * A generated field representing the URL of this blog post.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Boolean to determine if this post should use a featured image.
     */
    public function withUseFeaturedImage(bool $useFeaturedImage): self
    {
        $obj = clone $this;
        $obj->useFeaturedImage = $useFeaturedImage;

        return $obj;
    }

    /**
     * A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     *
     * @param array<string,mixed> $widgetContainers
     */
    public function withWidgetContainers(array $widgetContainers): self
    {
        $obj = clone $this;
        $obj->widgetContainers = $widgetContainers;

        return $obj;
    }

    /**
     * A data structure containing the data for all the modules for this page.
     *
     * @param array<string,mixed> $widgets
     */
    public function withWidgets(array $widgets): self
    {
        $obj = clone $this;
        $obj->widgets = $widgets;

        return $obj;
    }
}
