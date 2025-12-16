<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\BlogPost\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\Language;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * Model definition for a Blog Post.
 *
 * @phpstan-import-type PagesContentLanguageVariationShape from \HubspotSDK\Cms\Pages\PagesContentLanguageVariation
 *
 * @phpstan-type BlogPostShape = array{
 *   id: string,
 *   abStatus: AbStatus|value-of<AbStatus>,
 *   abTestID: string,
 *   archivedAt: int,
 *   archivedInDashboard: bool,
 *   attachedStylesheets: list<array<string,mixed>>,
 *   authorName: string,
 *   blogAuthorID: string,
 *   campaign: string,
 *   categoryID: int,
 *   contentGroupID: string,
 *   contentTypeCategory: ContentTypeCategory|value-of<ContentTypeCategory>,
 *   created: \DateTimeInterface,
 *   createdByID: string,
 *   currentlyPublished: bool,
 *   currentState: CurrentState|value-of<CurrentState>,
 *   domain: string,
 *   dynamicPageDataSourceID: string,
 *   dynamicPageDataSourceType: int,
 *   dynamicPageHubDBTableID: string,
 *   enableDomainStylesheets: bool,
 *   enableGoogleAmpOutputOverride: bool,
 *   enableLayoutStylesheets: bool,
 *   featuredImage: string,
 *   featuredImageAltText: string,
 *   folderID: string,
 *   footerHTML: string,
 *   headHTML: string,
 *   htmlTitle: string,
 *   includeDefaultCustomCss: bool,
 *   language: Language|value-of<Language>,
 *   layoutSections: array<string,mixed>,
 *   linkRelCanonicalURL: string,
 *   mabExperimentID: string,
 *   metaDescription: string,
 *   name: string,
 *   pageExpiryDate: int,
 *   pageExpiryEnabled: bool,
 *   pageExpiryRedirectID: int,
 *   pageExpiryRedirectURL: string,
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
 *   tagIDs: list<int>,
 *   themeSettingsValues: array<string,mixed>,
 *   translatedFromID: string,
 *   translations: array<string,PagesContentLanguageVariationShape>,
 *   updated: \DateTimeInterface,
 *   updatedByID: string,
 *   url: string,
 *   useFeaturedImage: bool,
 *   widgetContainers: array<string,mixed>,
 *   widgets: array<string,mixed>,
 * }
 */
final class BlogPost implements BaseModel
{
    /** @use SdkModel<BlogPostShape> */
    use SdkModel;

    /**
     * The unique ID of the blog post.
     */
    #[Required]
    public string $id;

    /** @var value-of<AbStatus> $abStatus */
    #[Required(enum: AbStatus::class)]
    public string $abStatus;

    #[Required('abTestId')]
    public string $abTestID;

    /**
     * The timestamp (ISO8601 format) when this Blog Post was deleted.
     */
    #[Required]
    public int $archivedAt;

    /**
     * If True, the post will not show up in your dashboard, although the post could still be live.
     */
    #[Required]
    public bool $archivedInDashboard;

    /**
     * List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @var list<array<string,mixed>> $attachedStylesheets
     */
    #[Required(list: new MapOf('mixed'))]
    public array $attachedStylesheets;

    /**
     * The name of the blog author associated with the post.
     */
    #[Required]
    public string $authorName;

    /**
     * The ID of the blog author associated with this post.
     */
    #[Required('blogAuthorId')]
    public string $blogAuthorID;

    /**
     * The GUID of the marketing campaign the post is associated with.
     */
    #[Required]
    public string $campaign;

    /**
     * ID of the object type.
     */
    #[Required('categoryId')]
    public int $categoryID;

    /**
     * The ID of the post's parent blog.
     */
    #[Required('contentGroupId')]
    public string $contentGroupID;

    /**
     * An ENUM descibing the type of this object. Should always be BLOG_POST.
     *
     * @var value-of<ContentTypeCategory> $contentTypeCategory
     */
    #[Required(enum: ContentTypeCategory::class)]
    public string $contentTypeCategory;

    #[Required]
    public \DateTimeInterface $created;

    /**
     * The ID of the user that created the post.
     */
    #[Required('createdById')]
    public string $createdByID;

    #[Required]
    public bool $currentlyPublished;

    /**
     * A generated ENUM descibing the current state of this Blog Post. Should always match state.
     *
     * @var value-of<CurrentState> $currentState
     */
    #[Required(enum: CurrentState::class)]
    public string $currentState;

    /**
     * The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     */
    #[Required]
    public string $domain;

    #[Required('dynamicPageDataSourceId')]
    public string $dynamicPageDataSourceID;

    #[Required]
    public int $dynamicPageDataSourceType;

    /**
     * For dynamic HubDB pages,
     * the ID of the HubDB table this post references.
     */
    #[Required('dynamicPageHubDbTableId')]
    public string $dynamicPageHubDBTableID;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Required]
    public bool $enableDomainStylesheets;

    /**
     * Boolean to allow overriding the AMP settings for the blog.
     */
    #[Required]
    public bool $enableGoogleAmpOutputOverride;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Required]
    public bool $enableLayoutStylesheets;

    /**
     * The featuredImage of this Blog Post.
     */
    #[Required]
    public string $featuredImage;

    /**
     * Alt Text of the featuredImage.
     */
    #[Required]
    public string $featuredImageAltText;

    #[Required('folderId')]
    public string $folderID;

    /**
     * Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page.
     */
    #[Required('footerHtml')]
    public string $footerHTML;

    /**
     * Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     */
    #[Required('headHtml')]
    public string $headHTML;

    /**
     * The HTML title of the post.
     */
    #[Required]
    public string $htmlTitle;

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    #[Required]
    public bool $includeDefaultCustomCss;

    /**
     * The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /** @var array<string,mixed> $layoutSections */
    #[Required(map: LayoutSection::class)]
    public array $layoutSections;

    /**
     * Optional override to set the URL to be used in the rel=canonical link tag on the page.
     */
    #[Required('linkRelCanonicalUrl')]
    public string $linkRelCanonicalURL;

    #[Required('mabExperimentId')]
    public string $mabExperimentID;

    /**
     * A description that goes in <meta> tag on the page.
     */
    #[Required]
    public string $metaDescription;

    /**
     * The internal name of the post.
     */
    #[Required]
    public string $name;

    #[Required]
    public int $pageExpiryDate;

    #[Required]
    public bool $pageExpiryEnabled;

    #[Required('pageExpiryRedirectId')]
    public int $pageExpiryRedirectID;

    #[Required('pageExpiryRedirectUrl')]
    public string $pageExpiryRedirectURL;

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    #[Required]
    public string $password;

    /**
     * The HTML of the main post body.
     */
    #[Required]
    public string $postBody;

    /**
     * The summary of the blog post that will appear on the main listing page.
     */
    #[Required]
    public string $postSummary;

    /**
     * Rules for require member registration to access private content.
     *
     * @var list<mixed> $publicAccessRules
     */
    #[Required(list: 'mixed')]
    public array $publicAccessRules;

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    #[Required]
    public bool $publicAccessRulesEnabled;

    /**
     * The date (ISO8601 format) the blog post is to be published at.
     */
    #[Required]
    public \DateTimeInterface $publishDate;

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    #[Required]
    public bool $publishImmediately;

    /**
     * The contents of the RSS body for this Blog Post.
     */
    #[Required]
    public string $rssBody;

    /**
     * The contents of the RSS summary for this Blog Post.
     */
    #[Required]
    public string $rssSummary;

    /**
     * The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     */
    #[Required]
    public string $slug;

    /**
     * An enumeration describing the current publish state of the post.
     */
    #[Required]
    public string $state;

    /**
     * The IDs of the tags associated with this post.
     *
     * @var list<int> $tagIDs
     */
    #[Required('tagIds', list: 'int')]
    public array $tagIDs;

    /** @var array<string,mixed> $themeSettingsValues */
    #[Required(map: 'mixed')]
    public array $themeSettingsValues;

    /**
     * ID of the primary blog post that this post was translated from.
     */
    #[Required('translatedFromId')]
    public string $translatedFromID;

    /** @var array<string,PagesContentLanguageVariation> $translations */
    #[Required(map: PagesContentLanguageVariation::class)]
    public array $translations;

    #[Required]
    public \DateTimeInterface $updated;

    /**
     * The ID of the user that updated the post.
     */
    #[Required('updatedById')]
    public string $updatedByID;

    /**
     * A generated field representing the URL of this blog post.
     */
    #[Required]
    public string $url;

    /**
     * Boolean to determine if this post should use a featured image.
     */
    #[Required]
    public bool $useFeaturedImage;

    /**
     * A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     *
     * @var array<string,mixed> $widgetContainers
     */
    #[Required(map: 'mixed')]
    public array $widgetContainers;

    /**
     * A data structure containing the data for all the modules for this page.
     *
     * @var array<string,mixed> $widgets
     */
    #[Required(map: 'mixed')]
    public array $widgets;

    /**
     * `new BlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogPost::with(
     *   id: ...,
     *   abStatus: ...,
     *   abTestID: ...,
     *   archivedAt: ...,
     *   archivedInDashboard: ...,
     *   attachedStylesheets: ...,
     *   authorName: ...,
     *   blogAuthorID: ...,
     *   campaign: ...,
     *   categoryID: ...,
     *   contentGroupID: ...,
     *   contentTypeCategory: ...,
     *   created: ...,
     *   createdByID: ...,
     *   currentlyPublished: ...,
     *   currentState: ...,
     *   domain: ...,
     *   dynamicPageDataSourceID: ...,
     *   dynamicPageDataSourceType: ...,
     *   dynamicPageHubDBTableID: ...,
     *   enableDomainStylesheets: ...,
     *   enableGoogleAmpOutputOverride: ...,
     *   enableLayoutStylesheets: ...,
     *   featuredImage: ...,
     *   featuredImageAltText: ...,
     *   folderID: ...,
     *   footerHTML: ...,
     *   headHTML: ...,
     *   htmlTitle: ...,
     *   includeDefaultCustomCss: ...,
     *   language: ...,
     *   layoutSections: ...,
     *   linkRelCanonicalURL: ...,
     *   mabExperimentID: ...,
     *   metaDescription: ...,
     *   name: ...,
     *   pageExpiryDate: ...,
     *   pageExpiryEnabled: ...,
     *   pageExpiryRedirectID: ...,
     *   pageExpiryRedirectURL: ...,
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
     *   tagIDs: ...,
     *   themeSettingsValues: ...,
     *   translatedFromID: ...,
     *   translations: ...,
     *   updated: ...,
     *   updatedByID: ...,
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
     * @param array<string,mixed> $layoutSections
     * @param list<mixed> $publicAccessRules
     * @param list<int> $tagIDs
     * @param array<string,mixed> $themeSettingsValues
     * @param array<string,PagesContentLanguageVariationShape> $translations
     * @param array<string,mixed> $widgetContainers
     * @param array<string,mixed> $widgets
     */
    public static function with(
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
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['abStatus'] = $abStatus;
        $self['abTestID'] = $abTestID;
        $self['archivedAt'] = $archivedAt;
        $self['archivedInDashboard'] = $archivedInDashboard;
        $self['attachedStylesheets'] = $attachedStylesheets;
        $self['authorName'] = $authorName;
        $self['blogAuthorID'] = $blogAuthorID;
        $self['campaign'] = $campaign;
        $self['categoryID'] = $categoryID;
        $self['contentGroupID'] = $contentGroupID;
        $self['contentTypeCategory'] = $contentTypeCategory;
        $self['created'] = $created;
        $self['createdByID'] = $createdByID;
        $self['currentlyPublished'] = $currentlyPublished;
        $self['currentState'] = $currentState;
        $self['domain'] = $domain;
        $self['dynamicPageDataSourceID'] = $dynamicPageDataSourceID;
        $self['dynamicPageDataSourceType'] = $dynamicPageDataSourceType;
        $self['dynamicPageHubDBTableID'] = $dynamicPageHubDBTableID;
        $self['enableDomainStylesheets'] = $enableDomainStylesheets;
        $self['enableGoogleAmpOutputOverride'] = $enableGoogleAmpOutputOverride;
        $self['enableLayoutStylesheets'] = $enableLayoutStylesheets;
        $self['featuredImage'] = $featuredImage;
        $self['featuredImageAltText'] = $featuredImageAltText;
        $self['folderID'] = $folderID;
        $self['footerHTML'] = $footerHTML;
        $self['headHTML'] = $headHTML;
        $self['htmlTitle'] = $htmlTitle;
        $self['includeDefaultCustomCss'] = $includeDefaultCustomCss;
        $self['language'] = $language;
        $self['layoutSections'] = $layoutSections;
        $self['linkRelCanonicalURL'] = $linkRelCanonicalURL;
        $self['mabExperimentID'] = $mabExperimentID;
        $self['metaDescription'] = $metaDescription;
        $self['name'] = $name;
        $self['pageExpiryDate'] = $pageExpiryDate;
        $self['pageExpiryEnabled'] = $pageExpiryEnabled;
        $self['pageExpiryRedirectID'] = $pageExpiryRedirectID;
        $self['pageExpiryRedirectURL'] = $pageExpiryRedirectURL;
        $self['password'] = $password;
        $self['postBody'] = $postBody;
        $self['postSummary'] = $postSummary;
        $self['publicAccessRules'] = $publicAccessRules;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;
        $self['publishDate'] = $publishDate;
        $self['publishImmediately'] = $publishImmediately;
        $self['rssBody'] = $rssBody;
        $self['rssSummary'] = $rssSummary;
        $self['slug'] = $slug;
        $self['state'] = $state;
        $self['tagIDs'] = $tagIDs;
        $self['themeSettingsValues'] = $themeSettingsValues;
        $self['translatedFromID'] = $translatedFromID;
        $self['translations'] = $translations;
        $self['updated'] = $updated;
        $self['updatedByID'] = $updatedByID;
        $self['url'] = $url;
        $self['useFeaturedImage'] = $useFeaturedImage;
        $self['widgetContainers'] = $widgetContainers;
        $self['widgets'] = $widgets;

        return $self;
    }

    /**
     * The unique ID of the blog post.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $self = clone $this;
        $self['abStatus'] = $abStatus;

        return $self;
    }

    public function withAbTestID(string $abTestID): self
    {
        $self = clone $this;
        $self['abTestID'] = $abTestID;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this Blog Post was deleted.
     */
    public function withArchivedAt(int $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * If True, the post will not show up in your dashboard, although the post could still be live.
     */
    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $self = clone $this;
        $self['archivedInDashboard'] = $archivedInDashboard;

        return $self;
    }

    /**
     * List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @param list<array<string,mixed>> $attachedStylesheets
     */
    public function withAttachedStylesheets(array $attachedStylesheets): self
    {
        $self = clone $this;
        $self['attachedStylesheets'] = $attachedStylesheets;

        return $self;
    }

    /**
     * The name of the blog author associated with the post.
     */
    public function withAuthorName(string $authorName): self
    {
        $self = clone $this;
        $self['authorName'] = $authorName;

        return $self;
    }

    /**
     * The ID of the blog author associated with this post.
     */
    public function withBlogAuthorID(string $blogAuthorID): self
    {
        $self = clone $this;
        $self['blogAuthorID'] = $blogAuthorID;

        return $self;
    }

    /**
     * The GUID of the marketing campaign the post is associated with.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * ID of the object type.
     */
    public function withCategoryID(int $categoryID): self
    {
        $self = clone $this;
        $self['categoryID'] = $categoryID;

        return $self;
    }

    /**
     * The ID of the post's parent blog.
     */
    public function withContentGroupID(string $contentGroupID): self
    {
        $self = clone $this;
        $self['contentGroupID'] = $contentGroupID;

        return $self;
    }

    /**
     * An ENUM descibing the type of this object. Should always be BLOG_POST.
     *
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     */
    public function withContentTypeCategory(
        ContentTypeCategory|string $contentTypeCategory
    ): self {
        $self = clone $this;
        $self['contentTypeCategory'] = $contentTypeCategory;

        return $self;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The ID of the user that created the post.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    public function withCurrentlyPublished(bool $currentlyPublished): self
    {
        $self = clone $this;
        $self['currentlyPublished'] = $currentlyPublished;

        return $self;
    }

    /**
     * A generated ENUM descibing the current state of this Blog Post. Should always match state.
     *
     * @param CurrentState|value-of<CurrentState> $currentState
     */
    public function withCurrentState(CurrentState|string $currentState): self
    {
        $self = clone $this;
        $self['currentState'] = $currentState;

        return $self;
    }

    /**
     * The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    public function withDynamicPageDataSourceID(
        string $dynamicPageDataSourceID
    ): self {
        $self = clone $this;
        $self['dynamicPageDataSourceID'] = $dynamicPageDataSourceID;

        return $self;
    }

    public function withDynamicPageDataSourceType(
        int $dynamicPageDataSourceType
    ): self {
        $self = clone $this;
        $self['dynamicPageDataSourceType'] = $dynamicPageDataSourceType;

        return $self;
    }

    /**
     * For dynamic HubDB pages,
     * the ID of the HubDB table this post references.
     */
    public function withDynamicPageHubDBTableID(
        string $dynamicPageHubDBTableID
    ): self {
        $self = clone $this;
        $self['dynamicPageHubDBTableID'] = $dynamicPageHubDBTableID;

        return $self;
    }

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    public function withEnableDomainStylesheets(
        bool $enableDomainStylesheets
    ): self {
        $self = clone $this;
        $self['enableDomainStylesheets'] = $enableDomainStylesheets;

        return $self;
    }

    /**
     * Boolean to allow overriding the AMP settings for the blog.
     */
    public function withEnableGoogleAmpOutputOverride(
        bool $enableGoogleAmpOutputOverride
    ): self {
        $self = clone $this;
        $self['enableGoogleAmpOutputOverride'] = $enableGoogleAmpOutputOverride;

        return $self;
    }

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    public function withEnableLayoutStylesheets(
        bool $enableLayoutStylesheets
    ): self {
        $self = clone $this;
        $self['enableLayoutStylesheets'] = $enableLayoutStylesheets;

        return $self;
    }

    /**
     * The featuredImage of this Blog Post.
     */
    public function withFeaturedImage(string $featuredImage): self
    {
        $self = clone $this;
        $self['featuredImage'] = $featuredImage;

        return $self;
    }

    /**
     * Alt Text of the featuredImage.
     */
    public function withFeaturedImageAltText(string $featuredImageAltText): self
    {
        $self = clone $this;
        $self['featuredImageAltText'] = $featuredImageAltText;

        return $self;
    }

    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }

    /**
     * Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page.
     */
    public function withFooterHTML(string $footerHTML): self
    {
        $self = clone $this;
        $self['footerHTML'] = $footerHTML;

        return $self;
    }

    /**
     * Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     */
    public function withHeadHTML(string $headHTML): self
    {
        $self = clone $this;
        $self['headHTML'] = $headHTML;

        return $self;
    }

    /**
     * The HTML title of the post.
     */
    public function withHTMLTitle(string $htmlTitle): self
    {
        $self = clone $this;
        $self['htmlTitle'] = $htmlTitle;

        return $self;
    }

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    public function withIncludeDefaultCustomCss(
        bool $includeDefaultCustomCss
    ): self {
        $self = clone $this;
        $self['includeDefaultCustomCss'] = $includeDefaultCustomCss;

        return $self;
    }

    /**
     * The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * @param array<string,mixed> $layoutSections
     */
    public function withLayoutSections(array $layoutSections): self
    {
        $self = clone $this;
        $self['layoutSections'] = $layoutSections;

        return $self;
    }

    /**
     * Optional override to set the URL to be used in the rel=canonical link tag on the page.
     */
    public function withLinkRelCanonicalURL(string $linkRelCanonicalURL): self
    {
        $self = clone $this;
        $self['linkRelCanonicalURL'] = $linkRelCanonicalURL;

        return $self;
    }

    public function withMabExperimentID(string $mabExperimentID): self
    {
        $self = clone $this;
        $self['mabExperimentID'] = $mabExperimentID;

        return $self;
    }

    /**
     * A description that goes in <meta> tag on the page.
     */
    public function withMetaDescription(string $metaDescription): self
    {
        $self = clone $this;
        $self['metaDescription'] = $metaDescription;

        return $self;
    }

    /**
     * The internal name of the post.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withPageExpiryDate(int $pageExpiryDate): self
    {
        $self = clone $this;
        $self['pageExpiryDate'] = $pageExpiryDate;

        return $self;
    }

    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $self = clone $this;
        $self['pageExpiryEnabled'] = $pageExpiryEnabled;

        return $self;
    }

    public function withPageExpiryRedirectID(int $pageExpiryRedirectID): self
    {
        $self = clone $this;
        $self['pageExpiryRedirectID'] = $pageExpiryRedirectID;

        return $self;
    }

    public function withPageExpiryRedirectURL(
        string $pageExpiryRedirectURL
    ): self {
        $self = clone $this;
        $self['pageExpiryRedirectURL'] = $pageExpiryRedirectURL;

        return $self;
    }

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The HTML of the main post body.
     */
    public function withPostBody(string $postBody): self
    {
        $self = clone $this;
        $self['postBody'] = $postBody;

        return $self;
    }

    /**
     * The summary of the blog post that will appear on the main listing page.
     */
    public function withPostSummary(string $postSummary): self
    {
        $self = clone $this;
        $self['postSummary'] = $postSummary;

        return $self;
    }

    /**
     * Rules for require member registration to access private content.
     *
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $self = clone $this;
        $self['publicAccessRules'] = $publicAccessRules;

        return $self;
    }

    /**
     * Boolean to determine whether or not to respect publicAccessRules.
     */
    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $self = clone $this;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;

        return $self;
    }

    /**
     * The date (ISO8601 format) the blog post is to be published at.
     */
    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $self = clone $this;
        $self['publishDate'] = $publishDate;

        return $self;
    }

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    public function withPublishImmediately(bool $publishImmediately): self
    {
        $self = clone $this;
        $self['publishImmediately'] = $publishImmediately;

        return $self;
    }

    /**
     * The contents of the RSS body for this Blog Post.
     */
    public function withRssBody(string $rssBody): self
    {
        $self = clone $this;
        $self['rssBody'] = $rssBody;

        return $self;
    }

    /**
     * The contents of the RSS summary for this Blog Post.
     */
    public function withRssSummary(string $rssSummary): self
    {
        $self = clone $this;
        $self['rssSummary'] = $rssSummary;

        return $self;
    }

    /**
     * The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * An enumeration describing the current publish state of the post.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * The IDs of the tags associated with this post.
     *
     * @param list<int> $tagIDs
     */
    public function withTagIDs(array $tagIDs): self
    {
        $self = clone $this;
        $self['tagIDs'] = $tagIDs;

        return $self;
    }

    /**
     * @param array<string,mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $self = clone $this;
        $self['themeSettingsValues'] = $themeSettingsValues;

        return $self;
    }

    /**
     * ID of the primary blog post that this post was translated from.
     */
    public function withTranslatedFromID(string $translatedFromID): self
    {
        $self = clone $this;
        $self['translatedFromID'] = $translatedFromID;

        return $self;
    }

    /**
     * @param array<string,PagesContentLanguageVariationShape> $translations
     */
    public function withTranslations(array $translations): self
    {
        $self = clone $this;
        $self['translations'] = $translations;

        return $self;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * The ID of the user that updated the post.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }

    /**
     * A generated field representing the URL of this blog post.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Boolean to determine if this post should use a featured image.
     */
    public function withUseFeaturedImage(bool $useFeaturedImage): self
    {
        $self = clone $this;
        $self['useFeaturedImage'] = $useFeaturedImage;

        return $self;
    }

    /**
     * A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     *
     * @param array<string,mixed> $widgetContainers
     */
    public function withWidgetContainers(array $widgetContainers): self
    {
        $self = clone $this;
        $self['widgetContainers'] = $widgetContainers;

        return $self;
    }

    /**
     * A data structure containing the data for all the modules for this page.
     *
     * @param array<string,mixed> $widgets
     */
    public function withWidgets(array $widgets): self
    {
        $self = clone $this;
        $self['widgets'] = $widgets;

        return $self;
    }
}
