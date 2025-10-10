<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PostCreateParams); // set properties as needed
 * $client->cms.blogs.posts->create(...$params->toArray());
 * ```
 * Create a new post.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->create(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->create
 *
 * @phpstan-type post_create_params = array{
 *   id: string,
 *   abStatus: AbStatus|value-of<AbStatus>,
 *   abTestID: string,
 *   archivedAt: int,
 *   archivedInDashboard: bool,
 *   attachedStylesheets: list<array<string, mixed>>,
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
 *   layoutSections: array<string, LayoutSection>,
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
 *   themeSettingsValues: array<string, mixed>,
 *   translatedFromID: string,
 *   translations: array<string, ContentLanguageVariation>,
 *   updated: \DateTimeInterface,
 *   updatedByID: string,
 *   url: string,
 *   useFeaturedImage: bool,
 *   widgetContainers: array<string, mixed>,
 *   widgets: array<string, mixed>,
 * }
 */
final class PostCreateParams implements BaseModel
{
    /** @use SdkModel<post_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    /** @var value-of<AbStatus> $abStatus */
    #[Api(enum: AbStatus::class)]
    public string $abStatus;

    #[Api('abTestId')]
    public string $abTestID;

    #[Api]
    public int $archivedAt;

    #[Api]
    public bool $archivedInDashboard;

    /** @var list<array<string, mixed>> $attachedStylesheets */
    #[Api(list: new MapOf('mixed'))]
    public array $attachedStylesheets;

    #[Api]
    public string $authorName;

    #[Api('blogAuthorId')]
    public string $blogAuthorID;

    #[Api]
    public string $campaign;

    #[Api('categoryId')]
    public int $categoryID;

    #[Api('contentGroupId')]
    public string $contentGroupID;

    /** @var value-of<ContentTypeCategory> $contentTypeCategory */
    #[Api(enum: ContentTypeCategory::class)]
    public string $contentTypeCategory;

    #[Api]
    public \DateTimeInterface $created;

    #[Api('createdById')]
    public string $createdByID;

    #[Api]
    public bool $currentlyPublished;

    /** @var value-of<CurrentState> $currentState */
    #[Api(enum: CurrentState::class)]
    public string $currentState;

    #[Api]
    public string $domain;

    #[Api('dynamicPageDataSourceId')]
    public string $dynamicPageDataSourceID;

    #[Api]
    public int $dynamicPageDataSourceType;

    #[Api('dynamicPageHubDbTableId')]
    public string $dynamicPageHubDBTableID;

    #[Api]
    public bool $enableDomainStylesheets;

    #[Api]
    public bool $enableGoogleAmpOutputOverride;

    #[Api]
    public bool $enableLayoutStylesheets;

    #[Api]
    public string $featuredImage;

    #[Api]
    public string $featuredImageAltText;

    #[Api('folderId')]
    public string $folderID;

    #[Api('footerHtml')]
    public string $footerHTML;

    #[Api('headHtml')]
    public string $headHTML;

    #[Api]
    public string $htmlTitle;

    #[Api]
    public bool $includeDefaultCustomCss;

    /** @var value-of<Language> $language */
    #[Api(enum: Language::class)]
    public string $language;

    /** @var array<string, LayoutSection> $layoutSections */
    #[Api(map: LayoutSection::class)]
    public array $layoutSections;

    #[Api('linkRelCanonicalUrl')]
    public string $linkRelCanonicalURL;

    #[Api('mabExperimentId')]
    public string $mabExperimentID;

    #[Api]
    public string $metaDescription;

    #[Api]
    public string $name;

    #[Api]
    public int $pageExpiryDate;

    #[Api]
    public bool $pageExpiryEnabled;

    #[Api('pageExpiryRedirectId')]
    public int $pageExpiryRedirectID;

    #[Api('pageExpiryRedirectUrl')]
    public string $pageExpiryRedirectURL;

    #[Api]
    public string $password;

    #[Api]
    public string $postBody;

    #[Api]
    public string $postSummary;

    /** @var list<mixed> $publicAccessRules */
    #[Api(list: 'mixed')]
    public array $publicAccessRules;

    #[Api]
    public bool $publicAccessRulesEnabled;

    #[Api]
    public \DateTimeInterface $publishDate;

    #[Api]
    public bool $publishImmediately;

    #[Api]
    public string $rssBody;

    #[Api]
    public string $rssSummary;

    #[Api]
    public string $slug;

    #[Api]
    public string $state;

    /** @var list<int> $tagIDs */
    #[Api('tagIds', list: 'int')]
    public array $tagIDs;

    /** @var array<string, mixed> $themeSettingsValues */
    #[Api(map: 'mixed')]
    public array $themeSettingsValues;

    #[Api('translatedFromId')]
    public string $translatedFromID;

    /** @var array<string, ContentLanguageVariation> $translations */
    #[Api(map: ContentLanguageVariation::class)]
    public array $translations;

    #[Api]
    public \DateTimeInterface $updated;

    #[Api('updatedById')]
    public string $updatedByID;

    #[Api]
    public string $url;

    #[Api]
    public bool $useFeaturedImage;

    /** @var array<string, mixed> $widgetContainers */
    #[Api(map: 'mixed')]
    public array $widgetContainers;

    /** @var array<string, mixed> $widgets */
    #[Api(map: 'mixed')]
    public array $widgets;

    /**
     * `new PostCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCreateParams::with(
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
     * (new PostCreateParams)
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
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     * @param CurrentState|value-of<CurrentState> $currentState
     * @param Language|value-of<Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param list<mixed> $publicAccessRules
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param array<string, ContentLanguageVariation> $translations
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
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
        $obj = new self;

        $obj->id = $id;
        $obj['abStatus'] = $abStatus;
        $obj->abTestID = $abTestID;
        $obj->archivedAt = $archivedAt;
        $obj->archivedInDashboard = $archivedInDashboard;
        $obj->attachedStylesheets = $attachedStylesheets;
        $obj->authorName = $authorName;
        $obj->blogAuthorID = $blogAuthorID;
        $obj->campaign = $campaign;
        $obj->categoryID = $categoryID;
        $obj->contentGroupID = $contentGroupID;
        $obj['contentTypeCategory'] = $contentTypeCategory;
        $obj->created = $created;
        $obj->createdByID = $createdByID;
        $obj->currentlyPublished = $currentlyPublished;
        $obj['currentState'] = $currentState;
        $obj->domain = $domain;
        $obj->dynamicPageDataSourceID = $dynamicPageDataSourceID;
        $obj->dynamicPageDataSourceType = $dynamicPageDataSourceType;
        $obj->dynamicPageHubDBTableID = $dynamicPageHubDBTableID;
        $obj->enableDomainStylesheets = $enableDomainStylesheets;
        $obj->enableGoogleAmpOutputOverride = $enableGoogleAmpOutputOverride;
        $obj->enableLayoutStylesheets = $enableLayoutStylesheets;
        $obj->featuredImage = $featuredImage;
        $obj->featuredImageAltText = $featuredImageAltText;
        $obj->folderID = $folderID;
        $obj->footerHTML = $footerHTML;
        $obj->headHTML = $headHTML;
        $obj->htmlTitle = $htmlTitle;
        $obj->includeDefaultCustomCss = $includeDefaultCustomCss;
        $obj['language'] = $language;
        $obj->layoutSections = $layoutSections;
        $obj->linkRelCanonicalURL = $linkRelCanonicalURL;
        $obj->mabExperimentID = $mabExperimentID;
        $obj->metaDescription = $metaDescription;
        $obj->name = $name;
        $obj->pageExpiryDate = $pageExpiryDate;
        $obj->pageExpiryEnabled = $pageExpiryEnabled;
        $obj->pageExpiryRedirectID = $pageExpiryRedirectID;
        $obj->pageExpiryRedirectURL = $pageExpiryRedirectURL;
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
        $obj->tagIDs = $tagIDs;
        $obj->themeSettingsValues = $themeSettingsValues;
        $obj->translatedFromID = $translatedFromID;
        $obj->translations = $translations;
        $obj->updated = $updated;
        $obj->updatedByID = $updatedByID;
        $obj->url = $url;
        $obj->useFeaturedImage = $useFeaturedImage;
        $obj->widgetContainers = $widgetContainers;
        $obj->widgets = $widgets;

        return $obj;
    }

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
        $obj->abTestID = $abTestID;

        return $obj;
    }

    public function withArchivedAt(int $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $obj = clone $this;
        $obj->archivedInDashboard = $archivedInDashboard;

        return $obj;
    }

    /**
     * @param list<array<string, mixed>> $attachedStylesheets
     */
    public function withAttachedStylesheets(array $attachedStylesheets): self
    {
        $obj = clone $this;
        $obj->attachedStylesheets = $attachedStylesheets;

        return $obj;
    }

    public function withAuthorName(string $authorName): self
    {
        $obj = clone $this;
        $obj->authorName = $authorName;

        return $obj;
    }

    public function withBlogAuthorID(string $blogAuthorID): self
    {
        $obj = clone $this;
        $obj->blogAuthorID = $blogAuthorID;

        return $obj;
    }

    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    public function withCategoryID(int $categoryID): self
    {
        $obj = clone $this;
        $obj->categoryID = $categoryID;

        return $obj;
    }

    public function withContentGroupID(string $contentGroupID): self
    {
        $obj = clone $this;
        $obj->contentGroupID = $contentGroupID;

        return $obj;
    }

    /**
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

    public function withCreatedByID(string $createdByID): self
    {
        $obj = clone $this;
        $obj->createdByID = $createdByID;

        return $obj;
    }

    public function withCurrentlyPublished(bool $currentlyPublished): self
    {
        $obj = clone $this;
        $obj->currentlyPublished = $currentlyPublished;

        return $obj;
    }

    /**
     * @param CurrentState|value-of<CurrentState> $currentState
     */
    public function withCurrentState(CurrentState|string $currentState): self
    {
        $obj = clone $this;
        $obj['currentState'] = $currentState;

        return $obj;
    }

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
        $obj->dynamicPageDataSourceID = $dynamicPageDataSourceID;

        return $obj;
    }

    public function withDynamicPageDataSourceType(
        int $dynamicPageDataSourceType
    ): self {
        $obj = clone $this;
        $obj->dynamicPageDataSourceType = $dynamicPageDataSourceType;

        return $obj;
    }

    public function withDynamicPageHubDBTableID(
        string $dynamicPageHubDBTableID
    ): self {
        $obj = clone $this;
        $obj->dynamicPageHubDBTableID = $dynamicPageHubDBTableID;

        return $obj;
    }

    public function withEnableDomainStylesheets(
        bool $enableDomainStylesheets
    ): self {
        $obj = clone $this;
        $obj->enableDomainStylesheets = $enableDomainStylesheets;

        return $obj;
    }

    public function withEnableGoogleAmpOutputOverride(
        bool $enableGoogleAmpOutputOverride
    ): self {
        $obj = clone $this;
        $obj->enableGoogleAmpOutputOverride = $enableGoogleAmpOutputOverride;

        return $obj;
    }

    public function withEnableLayoutStylesheets(
        bool $enableLayoutStylesheets
    ): self {
        $obj = clone $this;
        $obj->enableLayoutStylesheets = $enableLayoutStylesheets;

        return $obj;
    }

    public function withFeaturedImage(string $featuredImage): self
    {
        $obj = clone $this;
        $obj->featuredImage = $featuredImage;

        return $obj;
    }

    public function withFeaturedImageAltText(string $featuredImageAltText): self
    {
        $obj = clone $this;
        $obj->featuredImageAltText = $featuredImageAltText;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    public function withFooterHTML(string $footerHTML): self
    {
        $obj = clone $this;
        $obj->footerHTML = $footerHTML;

        return $obj;
    }

    public function withHeadHTML(string $headHTML): self
    {
        $obj = clone $this;
        $obj->headHTML = $headHTML;

        return $obj;
    }

    public function withHTMLTitle(string $htmlTitle): self
    {
        $obj = clone $this;
        $obj->htmlTitle = $htmlTitle;

        return $obj;
    }

    public function withIncludeDefaultCustomCss(
        bool $includeDefaultCustomCss
    ): self {
        $obj = clone $this;
        $obj->includeDefaultCustomCss = $includeDefaultCustomCss;

        return $obj;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param array<string, LayoutSection> $layoutSections
     */
    public function withLayoutSections(array $layoutSections): self
    {
        $obj = clone $this;
        $obj->layoutSections = $layoutSections;

        return $obj;
    }

    public function withLinkRelCanonicalURL(string $linkRelCanonicalURL): self
    {
        $obj = clone $this;
        $obj->linkRelCanonicalURL = $linkRelCanonicalURL;

        return $obj;
    }

    public function withMabExperimentID(string $mabExperimentID): self
    {
        $obj = clone $this;
        $obj->mabExperimentID = $mabExperimentID;

        return $obj;
    }

    public function withMetaDescription(string $metaDescription): self
    {
        $obj = clone $this;
        $obj->metaDescription = $metaDescription;

        return $obj;
    }

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
        $obj->pageExpiryRedirectID = $pageExpiryRedirectID;

        return $obj;
    }

    public function withPageExpiryRedirectURL(
        string $pageExpiryRedirectURL
    ): self {
        $obj = clone $this;
        $obj->pageExpiryRedirectURL = $pageExpiryRedirectURL;

        return $obj;
    }

    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    public function withPostBody(string $postBody): self
    {
        $obj = clone $this;
        $obj->postBody = $postBody;

        return $obj;
    }

    public function withPostSummary(string $postSummary): self
    {
        $obj = clone $this;
        $obj->postSummary = $postSummary;

        return $obj;
    }

    /**
     * @param list<mixed> $publicAccessRules
     */
    public function withPublicAccessRules(array $publicAccessRules): self
    {
        $obj = clone $this;
        $obj->publicAccessRules = $publicAccessRules;

        return $obj;
    }

    public function withPublicAccessRulesEnabled(
        bool $publicAccessRulesEnabled
    ): self {
        $obj = clone $this;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;

        return $obj;
    }

    public function withPublishDate(\DateTimeInterface $publishDate): self
    {
        $obj = clone $this;
        $obj->publishDate = $publishDate;

        return $obj;
    }

    public function withPublishImmediately(bool $publishImmediately): self
    {
        $obj = clone $this;
        $obj->publishImmediately = $publishImmediately;

        return $obj;
    }

    public function withRssBody(string $rssBody): self
    {
        $obj = clone $this;
        $obj->rssBody = $rssBody;

        return $obj;
    }

    public function withRssSummary(string $rssSummary): self
    {
        $obj = clone $this;
        $obj->rssSummary = $rssSummary;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * @param list<int> $tagIDs
     */
    public function withTagIDs(array $tagIDs): self
    {
        $obj = clone $this;
        $obj->tagIDs = $tagIDs;

        return $obj;
    }

    /**
     * @param array<string, mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $obj = clone $this;
        $obj->themeSettingsValues = $themeSettingsValues;

        return $obj;
    }

    public function withTranslatedFromID(string $translatedFromID): self
    {
        $obj = clone $this;
        $obj->translatedFromID = $translatedFromID;

        return $obj;
    }

    /**
     * @param array<string, ContentLanguageVariation> $translations
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

    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedByID = $updatedByID;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withUseFeaturedImage(bool $useFeaturedImage): self
    {
        $obj = clone $this;
        $obj->useFeaturedImage = $useFeaturedImage;

        return $obj;
    }

    /**
     * @param array<string, mixed> $widgetContainers
     */
    public function withWidgetContainers(array $widgetContainers): self
    {
        $obj = clone $this;
        $obj->widgetContainers = $widgetContainers;

        return $obj;
    }

    /**
     * @param array<string, mixed> $widgets
     */
    public function withWidgets(array $widgets): self
    {
        $obj = clone $this;
        $obj->widgets = $widgets;

        return $obj;
    }
}
