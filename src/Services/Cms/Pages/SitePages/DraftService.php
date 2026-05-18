<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Pages\SitePages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\ContentLanguageVariation;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\SitePages\Draft\DraftUpdateDraftParams\AbStatus;
use HubSpotSDK\Cms\Pages\SitePages\Draft\DraftUpdateDraftParams\ContentTypeCategory;
use HubSpotSDK\Cms\Pages\SitePages\Draft\DraftUpdateDraftParams\CurrentState;
use HubSpotSDK\Cms\Pages\SitePages\Draft\DraftUpdateDraftParams\Language;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Pages\SitePages\DraftContract;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubSpotSDK\Cms\ContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class DraftService implements DraftContract
{
    /**
     * @api
     */
    public DraftRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DraftRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the full draft version of a website page, specified by its ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): PagesPage {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the website page and apply them to the live version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publishDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to match the live version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resetSitePageDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetSitePageDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update the draft version of a website page, specified by page ID. You only need to specify the values for the details that you're modifying.
     *
     * @param string $id the unique ID of the page
     * @param AbStatus|value-of<AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID the unique identifier for the content group associated with the page
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created the timestamp indicating when the page was created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished indicates whether the page is currently published
     * @param CurrentState|value-of<CurrentState> $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID the identifier for the data source used by the dynamic page
     * @param int $dynamicPageDataSourceType the type of data source used by the dynamic page
     * @param string $dynamicPageHubDBTableID The ID of the HubDB table this page references, if applicable
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this page
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $folderID the ID of the associated folder this landing page is organized under in the app dashboard
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the html title of this page
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param Language|value-of<Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string,mixed> $layoutSections a structure detailing the layout sections of the page
     * @param string $linkRelCanonicalURL optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID The ID of the MAB test (or dynamic test) associated with this page, if applicable
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the page
     * @param int $pageExpiryDate the date at which this page should expire and begin redirecting to another url or page
     * @param bool $pageExpiryEnabled Boolean describing if the page expiration feature is enabled for this page
     * @param int $pageExpiryRedirectID The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     * @param string $pageExpiryRedirectURL The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     * @param bool $pageRedirected a generated Boolean describing whether or not this page is currently expired and being redirected
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate the date (ISO8601 format) the page is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $slug The path of the this page. This field is appended to the domain to construct the url of this page.
     * @param string $state an ENUM descibing the current state of this page
     * @param string $subcategory Details the type of page this is. Should always be landing_page or site_page
     * @param string $templatePath string detailing the path of the template used for this page
     * @param array<string,mixed> $themeSettingsValues a collection of settings specific to the theme applied to the page
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations a map of translations for the page, each associated with a specific language variation
     * @param \DateTimeInterface $updated the timestamp indicating when the page was last updated
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
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
        RequestOptions|array|null $requestOptions = null,
    ): PagesPage {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'abStatus' => $abStatus,
                'abTestID' => $abTestID,
                'archivedAt' => $archivedAt,
                'archivedInDashboard' => $archivedInDashboard,
                'attachedStylesheets' => $attachedStylesheets,
                'authorName' => $authorName,
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
                'pageRedirected' => $pageRedirected,
                'password' => $password,
                'publicAccessRules' => $publicAccessRules,
                'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
                'publishDate' => $publishDate,
                'publishImmediately' => $publishImmediately,
                'slug' => $slug,
                'state' => $state,
                'subcategory' => $subcategory,
                'templatePath' => $templatePath,
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
