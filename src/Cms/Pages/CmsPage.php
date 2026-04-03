<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Cms\ContentLanguageVariation;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\CmsPage\AbStatus;
use HubspotSDK\Cms\Pages\CmsPage\ContentTypeCategory;
use HubspotSDK\Cms\Pages\CmsPage\CurrentState;
use HubspotSDK\Cms\Pages\CmsPage\Language;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubspotSDK\Cms\ContentLanguageVariation
 *
 * @phpstan-type CmsPageShape = array{
 *   id: string,
 *   abStatus: AbStatus|value-of<AbStatus>,
 *   abTestID: string,
 *   archivedAt: \DateTimeInterface,
 *   archivedInDashboard: bool,
 *   attachedStylesheets: list<array<string,mixed>>,
 *   authorName: string,
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
 *   translatedFromID: string,
 *   translations: array<string,ContentLanguageVariation|ContentLanguageVariationShape>,
 *   updated: \DateTimeInterface,
 *   updatedByID: string,
 *   url: string,
 *   useFeaturedImage: bool,
 *   widgetContainers: array<string,mixed>,
 *   widgets: array<string,mixed>,
 * }
 */
final class CmsPage implements BaseModel
{
    /** @use SdkModel<CmsPageShape> */
    use SdkModel;

    /**
     * The unique ID of the page.
     */
    #[Required]
    public string $id;

    /**
     * The status of the AB test associated with this page, if applicable.
     *
     * @var value-of<AbStatus> $abStatus
     */
    #[Required(enum: AbStatus::class)]
    public string $abStatus;

    /**
     * The ID of the AB test associated with this page, if applicable.
     */
    #[Required('abTestId')]
    public string $abTestID;

    /**
     * The timestamp (ISO8601 format) when this page was deleted.
     */
    #[Required]
    public \DateTimeInterface $archivedAt;

    /**
     * If True, the page will not show up in your dashboard, although the page could still be live.
     */
    #[Required]
    public bool $archivedInDashboard;

    /**
     * List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     *
     * @var list<array<string,mixed>> $attachedStylesheets
     */
    #[Required(list: new MapOf('mixed'))]
    public array $attachedStylesheets;

    /**
     * The name of the user that updated this page.
     */
    #[Required]
    public string $authorName;

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    #[Required]
    public string $campaign;

    /**
     * ID of the type of object this is. Should always .
     */
    #[Required('categoryId')]
    public int $categoryID;

    /**
     * The unique identifier for the content group associated with the page.
     */
    #[Required('contentGroupId')]
    public string $contentGroupID;

    /**
     * An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     *
     * @var value-of<ContentTypeCategory> $contentTypeCategory
     */
    #[Required(enum: ContentTypeCategory::class)]
    public string $contentTypeCategory;

    /**
     * The timestamp indicating when the page was created.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * The ID of the user that created this page.
     */
    #[Required('createdById')]
    public string $createdByID;

    /**
     * Indicates whether the page is currently published.
     */
    #[Required]
    public bool $currentlyPublished;

    /**
     * A generated ENUM descibing the current state of this page.
     *
     * @var value-of<CurrentState> $currentState
     */
    #[Required(enum: CurrentState::class)]
    public string $currentState;

    /**
     * The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     */
    #[Required]
    public string $domain;

    /**
     * The identifier for the data source used by the dynamic page.
     */
    #[Required('dynamicPageDataSourceId')]
    public string $dynamicPageDataSourceID;

    /**
     * The type of data source used by the dynamic page.
     */
    #[Required]
    public int $dynamicPageDataSourceType;

    /**
     * The ID of the HubDB table this page references, if applicable.
     */
    #[Required('dynamicPageHubDbTableId')]
    public string $dynamicPageHubDBTableID;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Required]
    public bool $enableDomainStylesheets;

    /**
     * Boolean to determine whether or not the styles from the template should be applied.
     */
    #[Required]
    public bool $enableLayoutStylesheets;

    /**
     * The featuredImage of this page.
     */
    #[Required]
    public string $featuredImage;

    /**
     * Alt Text of the featuredImage.
     */
    #[Required]
    public string $featuredImageAltText;

    /**
     * The ID of the associated folder this landing page is organized under in the app dashboard.
     */
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
     * The html title of this page.
     */
    #[Required]
    public string $htmlTitle;

    /**
     * Boolean to determine whether or not the Primary CSS Files should be applied.
     */
    #[Required]
    public bool $includeDefaultCustomCss;

    /**
     * The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     *
     * @var value-of<Language> $language
     */
    #[Required(enum: Language::class)]
    public string $language;

    /**
     * A structure detailing the layout sections of the page.
     *
     * @var array<string,mixed> $layoutSections
     */
    #[Required(map: LayoutSection::class)]
    public array $layoutSections;

    /**
     * Optional override to set the URL to be used in the rel=canonical link tag on the page.
     */
    #[Required('linkRelCanonicalUrl')]
    public string $linkRelCanonicalURL;

    /**
     * The ID of the MAB test (or dynamic test) associated with this page, if applicable.
     */
    #[Required('mabExperimentId')]
    public string $mabExperimentID;

    /**
     * A description that goes in <meta> tag on the page.
     */
    #[Required]
    public string $metaDescription;

    /**
     * The internal name of the page.
     */
    #[Required]
    public string $name;

    /**
     * The date at which this page should expire and begin redirecting to another url or page.
     */
    #[Required]
    public int $pageExpiryDate;

    /**
     * Boolean describing if the page expiration feature is enabled for this page.
     */
    #[Required]
    public bool $pageExpiryEnabled;

    /**
     * The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     */
    #[Required('pageExpiryRedirectId')]
    public int $pageExpiryRedirectID;

    /**
     * The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     */
    #[Required('pageExpiryRedirectUrl')]
    public string $pageExpiryRedirectURL;

    /**
     * A generated Boolean describing whether or not this page is currently expired and being redirected.
     */
    #[Required]
    public bool $pageRedirected;

    /**
     * Set this to create a password protected page. Entering the password will be required to view the page.
     */
    #[Required]
    public string $password;

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
     * The date (ISO8601 format) the page is to be published at.
     */
    #[Required]
    public \DateTimeInterface $publishDate;

    /**
     * Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting.
     */
    #[Required]
    public bool $publishImmediately;

    /**
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    #[Required]
    public string $slug;

    /**
     * An ENUM descibing the current state of this page.
     */
    #[Required]
    public string $state;

    /**
     * Details the type of page this is. Should always be landing_page or site_page.
     */
    #[Required]
    public string $subcategory;

    /**
     * String detailing the path of the template used for this page.
     */
    #[Required]
    public string $templatePath;

    /**
     * A collection of settings specific to the theme applied to the page.
     *
     * @var array<string,mixed> $themeSettingsValues
     */
    #[Required(map: 'mixed')]
    public array $themeSettingsValues;

    /**
     * ID of the primary page this object was translated from.
     */
    #[Required('translatedFromId')]
    public string $translatedFromID;

    /**
     * A map of translations for the page, each associated with a specific language variation.
     *
     * @var array<string,ContentLanguageVariation> $translations
     */
    #[Required(map: ContentLanguageVariation::class)]
    public array $translations;

    /**
     * The timestamp indicating when the page was last updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * The ID of the user that updated this page.
     */
    #[Required('updatedById')]
    public string $updatedByID;

    /**
     * A generated field representing the URL of this page.
     */
    #[Required]
    public string $url;

    /**
     * Boolean to determine if this page should use a featuredImage.
     */
    #[Required]
    public bool $useFeaturedImage;

    /**
     * A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
     * `new CmsPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsPage::with(
     *   id: ...,
     *   abStatus: ...,
     *   abTestID: ...,
     *   archivedAt: ...,
     *   archivedInDashboard: ...,
     *   attachedStylesheets: ...,
     *   authorName: ...,
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
     * (new CmsPage)
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
     * @param array<string,mixed> $layoutSections
     * @param list<mixed> $publicAccessRules
     * @param array<string,mixed> $themeSettingsValues
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations
     * @param array<string,mixed> $widgetContainers
     * @param array<string,mixed> $widgets
     */
    public static function with(
        string $id,
        AbStatus|string $abStatus,
        string $abTestID,
        \DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
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
        $self['pageRedirected'] = $pageRedirected;
        $self['password'] = $password;
        $self['publicAccessRules'] = $publicAccessRules;
        $self['publicAccessRulesEnabled'] = $publicAccessRulesEnabled;
        $self['publishDate'] = $publishDate;
        $self['publishImmediately'] = $publishImmediately;
        $self['slug'] = $slug;
        $self['state'] = $state;
        $self['subcategory'] = $subcategory;
        $self['templatePath'] = $templatePath;
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
     * The unique ID of the page.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The status of the AB test associated with this page, if applicable.
     *
     * @param AbStatus|value-of<AbStatus> $abStatus
     */
    public function withAbStatus(AbStatus|string $abStatus): self
    {
        $self = clone $this;
        $self['abStatus'] = $abStatus;

        return $self;
    }

    /**
     * The ID of the AB test associated with this page, if applicable.
     */
    public function withAbTestID(string $abTestID): self
    {
        $self = clone $this;
        $self['abTestID'] = $abTestID;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this page was deleted.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * If True, the page will not show up in your dashboard, although the page could still be live.
     */
    public function withArchivedInDashboard(bool $archivedInDashboard): self
    {
        $self = clone $this;
        $self['archivedInDashboard'] = $archivedInDashboard;

        return $self;
    }

    /**
     * List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
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
     * The name of the user that updated this page.
     */
    public function withAuthorName(string $authorName): self
    {
        $self = clone $this;
        $self['authorName'] = $authorName;

        return $self;
    }

    /**
     * The GUID of the marketing campaign this page is a part of.
     */
    public function withCampaign(string $campaign): self
    {
        $self = clone $this;
        $self['campaign'] = $campaign;

        return $self;
    }

    /**
     * ID of the type of object this is. Should always .
     */
    public function withCategoryID(int $categoryID): self
    {
        $self = clone $this;
        $self['categoryID'] = $categoryID;

        return $self;
    }

    /**
     * The unique identifier for the content group associated with the page.
     */
    public function withContentGroupID(string $contentGroupID): self
    {
        $self = clone $this;
        $self['contentGroupID'] = $contentGroupID;

        return $self;
    }

    /**
     * An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
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

    /**
     * The timestamp indicating when the page was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The ID of the user that created this page.
     */
    public function withCreatedByID(string $createdByID): self
    {
        $self = clone $this;
        $self['createdByID'] = $createdByID;

        return $self;
    }

    /**
     * Indicates whether the page is currently published.
     */
    public function withCurrentlyPublished(bool $currentlyPublished): self
    {
        $self = clone $this;
        $self['currentlyPublished'] = $currentlyPublished;

        return $self;
    }

    /**
     * A generated ENUM descibing the current state of this page.
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
     * The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     */
    public function withDomain(string $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * The identifier for the data source used by the dynamic page.
     */
    public function withDynamicPageDataSourceID(
        string $dynamicPageDataSourceID
    ): self {
        $self = clone $this;
        $self['dynamicPageDataSourceID'] = $dynamicPageDataSourceID;

        return $self;
    }

    /**
     * The type of data source used by the dynamic page.
     */
    public function withDynamicPageDataSourceType(
        int $dynamicPageDataSourceType
    ): self {
        $self = clone $this;
        $self['dynamicPageDataSourceType'] = $dynamicPageDataSourceType;

        return $self;
    }

    /**
     * The ID of the HubDB table this page references, if applicable.
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
     * The featuredImage of this page.
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

    /**
     * The ID of the associated folder this landing page is organized under in the app dashboard.
     */
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
     * The html title of this page.
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
     * The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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
     * A structure detailing the layout sections of the page.
     *
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

    /**
     * The ID of the MAB test (or dynamic test) associated with this page, if applicable.
     */
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
     * The internal name of the page.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The date at which this page should expire and begin redirecting to another url or page.
     */
    public function withPageExpiryDate(int $pageExpiryDate): self
    {
        $self = clone $this;
        $self['pageExpiryDate'] = $pageExpiryDate;

        return $self;
    }

    /**
     * Boolean describing if the page expiration feature is enabled for this page.
     */
    public function withPageExpiryEnabled(bool $pageExpiryEnabled): self
    {
        $self = clone $this;
        $self['pageExpiryEnabled'] = $pageExpiryEnabled;

        return $self;
    }

    /**
     * The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     */
    public function withPageExpiryRedirectID(int $pageExpiryRedirectID): self
    {
        $self = clone $this;
        $self['pageExpiryRedirectID'] = $pageExpiryRedirectID;

        return $self;
    }

    /**
     * The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     */
    public function withPageExpiryRedirectURL(
        string $pageExpiryRedirectURL
    ): self {
        $self = clone $this;
        $self['pageExpiryRedirectURL'] = $pageExpiryRedirectURL;

        return $self;
    }

    /**
     * A generated Boolean describing whether or not this page is currently expired and being redirected.
     */
    public function withPageRedirected(bool $pageRedirected): self
    {
        $self = clone $this;
        $self['pageRedirected'] = $pageRedirected;

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
     * The date (ISO8601 format) the page is to be published at.
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
     * The path of the this page. This field is appended to the domain to construct the url of this page.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * An ENUM descibing the current state of this page.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Details the type of page this is. Should always be landing_page or site_page.
     */
    public function withSubcategory(string $subcategory): self
    {
        $self = clone $this;
        $self['subcategory'] = $subcategory;

        return $self;
    }

    /**
     * String detailing the path of the template used for this page.
     */
    public function withTemplatePath(string $templatePath): self
    {
        $self = clone $this;
        $self['templatePath'] = $templatePath;

        return $self;
    }

    /**
     * A collection of settings specific to the theme applied to the page.
     *
     * @param array<string,mixed> $themeSettingsValues
     */
    public function withThemeSettingsValues(array $themeSettingsValues): self
    {
        $self = clone $this;
        $self['themeSettingsValues'] = $themeSettingsValues;

        return $self;
    }

    /**
     * ID of the primary page this object was translated from.
     */
    public function withTranslatedFromID(string $translatedFromID): self
    {
        $self = clone $this;
        $self['translatedFromID'] = $translatedFromID;

        return $self;
    }

    /**
     * A map of translations for the page, each associated with a specific language variation.
     *
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations
     */
    public function withTranslations(array $translations): self
    {
        $self = clone $this;
        $self['translations'] = $translations;

        return $self;
    }

    /**
     * The timestamp indicating when the page was last updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

        return $self;
    }

    /**
     * The ID of the user that updated this page.
     */
    public function withUpdatedByID(string $updatedByID): self
    {
        $self = clone $this;
        $self['updatedByID'] = $updatedByID;

        return $self;
    }

    /**
     * A generated field representing the URL of this page.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Boolean to determine if this page should use a featuredImage.
     */
    public function withUseFeaturedImage(bool $useFeaturedImage): self
    {
        $self = clone $this;
        $self['useFeaturedImage'] = $useFeaturedImage;

        return $self;
    }

    /**
     * A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
