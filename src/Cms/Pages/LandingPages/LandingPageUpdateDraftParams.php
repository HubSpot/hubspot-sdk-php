<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\AbStatus;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\CurrentState;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\Language;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * Sparse updates the draft version of a single Landing Page object identified by the id in the path.
 * You only need to specify the column values that you are modifying.
 *
 * @see HubspotSDK\Cms\Pages\LandingPages->updateDraft
 *
 * @phpstan-type LandingPageUpdateDraftParamsShape = array{
 *   id: string,
 *   abStatus: AbStatus|value-of<AbStatus>,
 *   abTestId: string,
 *   archivedAt: \DateTimeInterface,
 *   archivedInDashboard: bool,
 *   attachedStylesheets: list<array<string,mixed>>,
 *   authorName: string,
 *   campaign: string,
 *   categoryId: int,
 *   contentGroupId: string,
 *   contentTypeCategory: ContentTypeCategory|value-of<ContentTypeCategory>,
 *   created: \DateTimeInterface,
 *   createdById: string,
 *   currentlyPublished: bool,
 *   currentState: CurrentState|value-of<CurrentState>,
 *   domain: string,
 *   dynamicPageDataSourceId: string,
 *   dynamicPageDataSourceType: int,
 *   dynamicPageHubDbTableId: string,
 *   enableDomainStylesheets: bool,
 *   enableLayoutStylesheets: bool,
 *   featuredImage: string,
 *   featuredImageAltText: string,
 *   folderId: string,
 *   footerHtml: string,
 *   headHtml: string,
 *   htmlTitle: string,
 *   includeDefaultCustomCss: bool,
 *   language: Language|value-of<Language>,
 *   layoutSections: array<string,LayoutSection>,
 *   linkRelCanonicalUrl: string,
 *   mabExperimentId: string,
 *   metaDescription: string,
 *   name: string,
 *   pageExpiryDate: int,
 *   pageExpiryEnabled: bool,
 *   pageExpiryRedirectId: int,
 *   pageExpiryRedirectUrl: string,
 *   pageRedirected: bool,
 *   password: string,
 *   publicAccessRules: list<mixed>,
 *   publicAccessRulesEnabled: bool,
 *   publishDate: \DateTimeInterface,
 *   publishImmediately: bool,
 *   slug: string,
 *   state: string,
 *   subcategory: string,
 *   templatePath: string,
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
final class LandingPageUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<LandingPageUpdateDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique ID of the page.
     */
    #[Api]
    public string $id;

    /**
     * The status of the AB test associated with this page, if applicable.
     *
     * @var value-of<AbStatus> $abStatus
     */
    #[Api(enum: AbStatus::class)]
    public string $abStatus;

    /**
     * The ID of the AB test associated with this page, if applicable.
     */
    #[Api]
    public string $abTestId;

    /**
     * The timestamp (ISO8601 format) when this page was deleted.
     */
    #[Api]
    public \DateTimeInterface $archivedAt;

    /**
     * If True, the page will not show up in your dashboard, although the page could still be live.
     */
    #[Api]
    public bool $archivedInDashboard;

    /**
     * List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @var list<array<string,mixed>> $attachedStylesheets
     */
    #[Api(list: new MapOf('mixed'))]
    public array $attachedStylesheets;

    /**
     * The name of the user that updated this page.
     */
    #[Api]
    public string $authorName;

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    #[Api]
    public string $campaign;

    /**
     * ID of the type of object this is. Should always .
     */
    #[Api]
    public int $categoryId;

    #[Api]
    public string $contentGroupId;

    /**
     * An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     *
     * @var value-of<ContentTypeCategory> $contentTypeCategory
     */
    #[Api(enum: ContentTypeCategory::class)]
    public string $contentTypeCategory;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The ID of the user that created this page.
     */
    #[Api]
    public string $createdById;

    #[Api]
    public bool $currentlyPublished;

    /**
     * A generated ENUM descibing the current state of this page.
     *
     * @var value-of<CurrentState> $currentState
     */
    #[Api(enum: CurrentState::class)]
    public string $currentState;

    /**
     * The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     */
    #[Api]
    public string $domain;

    #[Api]
    public string $dynamicPageDataSourceId;

    #[Api]
    public int $dynamicPageDataSourceType;

    /**
     * The ID of the HubDB table this page references, if applicable.
     */
    #[Api]
    public string $dynamicPageHubDbTableId;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Api]
    public bool $enableDomainStylesheets;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Api]
    public bool $enableLayoutStylesheets;

    /**
     * The featuredImage of this page.
     */
    #[Api]
    public string $featuredImage;

    /**
     * Alt Text of the featuredImage.
     */
    #[Api]
    public string $featuredImageAltText;

    /**
     * The ID of the associated folder this landing page is organized under in the app dashboard.
     */
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
     * The html title of this page.
     */
    #[Api]
    public string $htmlTitle;

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    #[Api]
    public bool $includeDefaultCustomCss;

    /**
     * The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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

    /**
     * The ID of the MAB test (or dynamic test) associated with this page, if applicable.
     */
    #[Api]
    public string $mabExperimentId;

    /**
     * A description that goes in <meta> tag on the page.
     */
    #[Api]
    public string $metaDescription;

    /**
     * The internal name of the page.
     */
    #[Api]
    public string $name;

    /**
     * The date at which this page should expire and begin redirecting to another url or page.
     */
    #[Api]
    public int $pageExpiryDate;

    /**
     * Boolean describing if the page expiration feature is enabled for this page.
     */
    #[Api]
    public bool $pageExpiryEnabled;

    /**
     * The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     */
    #[Api]
    public int $pageExpiryRedirectId;

    /**
     * The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     */
    #[Api]
    public string $pageExpiryRedirectUrl;

    /**
     * A generated Boolean describing whether or not this page is currently expired and being redirected.
     */
    #[Api]
    public bool $pageRedirected;

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    #[Api]
    public string $password;

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
     * The date (ISO8601 format) the page is to be published at.
     */
    #[Api]
    public \DateTimeInterface $publishDate;

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    #[Api]
    public bool $publishImmediately;

    /**
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    #[Api]
    public string $slug;

    /**
     * An ENUM descibing the current state of this page.
     */
    #[Api]
    public string $state;

    /**
     * Details the type of page this is. Should always be landing_page or site_page.
     */
    #[Api]
    public string $subcategory;

    /**
     * String detailing the path of the template used for this page.
     */
    #[Api]
    public string $templatePath;

    /** @var array<string,mixed> $themeSettingsValues */
    #[Api(map: 'mixed')]
    public array $themeSettingsValues;

    /**
     * ID of the primary page this object was translated from.
     */
    #[Api]
    public string $translatedFromId;

    /** @var array<string,PagesContentLanguageVariation> $translations */
    #[Api(map: PagesContentLanguageVariation::class)]
    public array $translations;

    #[Api]
    public \DateTimeInterface $updated;

    /**
     * The ID of the user that updated this page.
     */
    #[Api]
    public string $updatedById;

    /**
     * A generated field representing the URL of this page.
     */
    #[Api]
    public string $url;

    /**
     * Boolean to determine if this page should use a featuredImage.
     */
    #[Api]
    public bool $useFeaturedImage;

    /**
     * A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
     * `new LandingPageUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LandingPageUpdateDraftParams::with(
     *   id: ...,
     *   abStatus: ...,
     *   abTestId: ...,
     *   archivedAt: ...,
     *   archivedInDashboard: ...,
     *   attachedStylesheets: ...,
     *   authorName: ...,
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
     *   pageRedirected: ...,
     *   password: ...,
     *   publicAccessRules: ...,
     *   publicAccessRulesEnabled: ...,
     *   publishDate: ...,
     *   publishImmediately: ...,
     *   slug: ...,
     *   state: ...,
     *   subcategory: ...,
     *   templatePath: ...,
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
     * (new LandingPageUpdateDraftParams)
     *   ->withID(...)
     *   ->withAbStatus(...)
     *   ->withAbTestID(...)
     *   ->withArchivedAt(...)
     *   ->withArchivedInDashboard(...)
     *   ->withAttachedStylesheets(...)
     *   ->withAuthorName(...)
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
     *   ->withPageRedirected(...)
     *   ->withPassword(...)
     *   ->withPublicAccessRules(...)
     *   ->withPublicAccessRulesEnabled(...)
     *   ->withPublishDate(...)
     *   ->withPublishImmediately(...)
     *   ->withSlug(...)
     *   ->withState(...)
     *   ->withSubcategory(...)
     *   ->withTemplatePath(...)
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
     * @param array<string,mixed> $themeSettingsValues
     * @param array<string,PagesContentLanguageVariation> $translations
     * @param array<string,mixed> $widgetContainers
     * @param array<string,mixed> $widgets
     */
    public static function with(
        string $id,
        AbStatus|string $abStatus,
        string $abTestId,
        \DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
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
        bool $pageRedirected,
        string $password,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        \DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $slug,
        string $state,
        string $subcategory,
        string $templatePath,
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
        $obj->pageRedirected = $pageRedirected;
        $obj->password = $password;
        $obj->publicAccessRules = $publicAccessRules;
        $obj->publicAccessRulesEnabled = $publicAccessRulesEnabled;
        $obj->publishDate = $publishDate;
        $obj->publishImmediately = $publishImmediately;
        $obj->slug = $slug;
        $obj->state = $state;
        $obj->subcategory = $subcategory;
        $obj->templatePath = $templatePath;
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
     * The unique ID of the page.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The status of the AB test associated with this page, if applicable.
     *
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $obj = clone $this;
        $obj['abStatus'] = $abStatus;

        return $obj;
    }

    /**
     * The ID of the AB test associated with this page, if applicable.
     */
    public function withAbTestID(string $abTestID): self
    {
        $obj = clone $this;
        $obj->abTestId = $abTestID;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this page was deleted.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * If True, the page will not show up in your dashboard, although the page could still be live.
     */
    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $obj = clone $this;
        $obj->archivedInDashboard = $archivedInDashboard;

        return $obj;
    }

    /**
     * List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
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
     * The name of the user that updated this page.
     */
    public function withAuthorName(string $authorName): self
    {
        $obj = clone $this;
        $obj->authorName = $authorName;

        return $obj;
    }

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    public function withCampaign(string $campaign): self
    {
        $obj = clone $this;
        $obj->campaign = $campaign;

        return $obj;
    }

    /**
     * ID of the type of object this is. Should always .
     */
    public function withCategoryID(int $categoryID): self
    {
        $obj = clone $this;
        $obj->categoryId = $categoryID;

        return $obj;
    }

    public function withContentGroupID(string $contentGroupID): self
    {
        $obj = clone $this;
        $obj->contentGroupId = $contentGroupID;

        return $obj;
    }

    /**
     * An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
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
     * The ID of the user that created this page.
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
     * A generated ENUM descibing the current state of this page.
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
     * The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
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
     * The ID of the HubDB table this page references, if applicable.
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
     * The featuredImage of this page.
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

    /**
     * The ID of the associated folder this landing page is organized under in the app dashboard.
     */
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
     * The html title of this page.
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
     * The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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

    /**
     * The ID of the MAB test (or dynamic test) associated with this page, if applicable.
     */
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
     * The internal name of the page.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The date at which this page should expire and begin redirecting to another url or page.
     */
    public function withPageExpiryDate(int $pageExpiryDate): self
    {
        $obj = clone $this;
        $obj->pageExpiryDate = $pageExpiryDate;

        return $obj;
    }

    /**
     * Boolean describing if the page expiration feature is enabled for this page.
     */
    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $obj = clone $this;
        $obj->pageExpiryEnabled = $pageExpiryEnabled;

        return $obj;
    }

    /**
     * The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     */
    public function withPageExpiryRedirectID(int $pageExpiryRedirectID): self
    {
        $obj = clone $this;
        $obj->pageExpiryRedirectId = $pageExpiryRedirectID;

        return $obj;
    }

    /**
     * The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     */
    public function withPageExpiryRedirectURL(
        string $pageExpiryRedirectURL
    ): self {
        $obj = clone $this;
        $obj->pageExpiryRedirectUrl = $pageExpiryRedirectURL;

        return $obj;
    }

    /**
     * A generated Boolean describing whether or not this page is currently expired and being redirected.
     */
    public function withPageRedirected(bool $pageRedirected): self
    {
        $obj = clone $this;
        $obj->pageRedirected = $pageRedirected;

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
     * The date (ISO8601 format) the page is to be published at.
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
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    /**
     * An ENUM descibing the current state of this page.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Details the type of page this is. Should always be landing_page or site_page.
     */
    public function withSubcategory(string $subcategory): self
    {
        $obj = clone $this;
        $obj->subcategory = $subcategory;

        return $obj;
    }

    /**
     * String detailing the path of the template used for this page.
     */
    public function withTemplatePath(string $templatePath): self
    {
        $obj = clone $this;
        $obj->templatePath = $templatePath;

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
     * ID of the primary page this object was translated from.
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
     * The ID of the user that updated this page.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $obj = clone $this;
        $obj->updatedById = $updatedByID;

        return $obj;
    }

    /**
     * A generated field representing the URL of this page.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * Boolean to determine if this page should use a featuredImage.
     */
    public function withUseFeaturedImage(bool $useFeaturedImage): self
    {
        $obj = clone $this;
        $obj->useFeaturedImage = $useFeaturedImage;

        return $obj;
    }

    /**
     * A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
