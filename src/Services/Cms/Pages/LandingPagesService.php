<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\ContentLanguageVariation;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\Language;
use HubspotSDK\Cms\Pages\PageData;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\LandingPagesContract;

/**
 * @phpstan-import-type ContentLanguageVariationShape from \HubspotSDK\Cms\ContentLanguageVariation
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class LandingPagesService implements LandingPagesContract
{
    /**
     * @api
     */
    public LandingPagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LandingPagesRawService($client);
    }

    /**
     * @api
     *
     * Create a new landing page.
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
    public function create(
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
    ): PageData {
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
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sparse updates a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID Path param
     * @param string $id body param: The unique ID of the page
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\AbStatus|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\AbStatus> $abStatus Body param: The status of the AB test associated with this page, if applicable
     * @param string $abTestID Body param: The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt body param: The timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard body param: If True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets Body param: List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName body param: The name of the user that updated this page
     * @param string $campaign body param: The GUID of the marketing campaign this page is a part of
     * @param int $categoryID Body param: ID of the type of object this is. Should always .
     * @param string $contentGroupID body param: The unique identifier for the content group associated with the page
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\ContentTypeCategory> $contentTypeCategory Body param: An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created body param: The timestamp indicating when the page was created
     * @param string $createdByID body param: The ID of the user that created this page
     * @param bool $currentlyPublished body param: Indicates whether the page is currently published
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\CurrentState|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\CurrentState> $currentState body param: A generated ENUM descibing the current state of this page
     * @param string $domain Body param: The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID body param: The identifier for the data source used by the dynamic page
     * @param int $dynamicPageDataSourceType body param: The type of data source used by the dynamic page
     * @param string $dynamicPageHubDBTableID Body param: The ID of the HubDB table this page references, if applicable
     * @param bool $enableDomainStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableLayoutStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage body param: The featuredImage of this page
     * @param string $featuredImageAltText body param: Alt Text of the featuredImage
     * @param string $folderID body param: The ID of the associated folder this landing page is organized under in the app dashboard
     * @param string $footerHTML body param: Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Body param: Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle body param: The html title of this page
     * @param bool $includeDefaultCustomCss body param: Boolean to determine whether or not the Primary CSS Files should be applied
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\Language|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\Language> $language Body param: The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string,mixed> $layoutSections body param: A structure detailing the layout sections of the page
     * @param string $linkRelCanonicalURL body param: Optional override to set the URL to be used in the rel=canonical link tag on the page
     * @param string $mabExperimentID Body param: The ID of the MAB test (or dynamic test) associated with this page, if applicable
     * @param string $metaDescription body param: A description that goes in <meta> tag on the page
     * @param string $name body param: The internal name of the page
     * @param int $pageExpiryDate body param: The date at which this page should expire and begin redirecting to another url or page
     * @param bool $pageExpiryEnabled Body param: Boolean describing if the page expiration feature is enabled for this page
     * @param int $pageExpiryRedirectID Body param: The ID of another page this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectUrl.
     * @param string $pageExpiryRedirectURL Body param: The URL this page's url should redirect to once this page expires. Should only set this or pageExpiryRedirectId.
     * @param bool $pageRedirected body param: A generated Boolean describing whether or not this page is currently expired and being redirected
     * @param string $password Body param: Set this to create a password protected page. Entering the password will be required to view the page.
     * @param list<mixed> $publicAccessRules body param: Rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled body param: Boolean to determine whether or not to respect publicAccessRules
     * @param \DateTimeInterface $publishDate body param: The date (ISO8601 format) the page is to be published at
     * @param bool $publishImmediately body param: Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $slug Body param: The path of the this page. This field is appended to the domain to construct the url of this page.
     * @param string $state body param: An ENUM descibing the current state of this page
     * @param string $subcategory Body param: Details the type of page this is. Should always be landing_page or site_page
     * @param string $templatePath body param: String detailing the path of the template used for this page
     * @param array<string,mixed> $themeSettingsValues body param: A collection of settings specific to the theme applied to the page
     * @param string $translatedFromID body param: ID of the primary page this object was translated from
     * @param array<string,ContentLanguageVariation|ContentLanguageVariationShape> $translations body param: A map of translations for the page, each associated with a specific language variation
     * @param \DateTimeInterface $updated body param: The timestamp indicating when the page was last updated
     * @param string $updatedByID body param: The ID of the user that updated this page
     * @param string $url body param: A generated field representing the URL of this page
     * @param bool $useFeaturedImage body param: Boolean to determine if this page should use a featuredImage
     * @param array<string,mixed> $widgetContainers Body param: A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets body param: A data structure containing the data for all the modules for this page
     * @param bool $archived query param: Whether to return only results that have been archived
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\AbStatus|string $abStatus,
        string $abTestID,
        \DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\CurrentState|string $currentState,
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
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams\Language|string $language,
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
        ?bool $archived = null,
        RequestOptions|array|null $requestOptions = null,
    ): PageData {
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
     * Get the list of landing pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param int $limit the maximum number of results to display per page
     * @param list<string> $sort
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PageData>
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
     * Delete a landing page, specified by its ID.
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
     * Create a copy of an existing landing page.
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
    ): PageData {
        $params = Util::removeNulls(['id' => $id, 'cloneName' => $cloneName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a landing page, specified by its ID.
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
    ): PageData {
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
     * Retrieve the full draft version of a landing page, specified by page ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): PageData {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Landing Page and apply them to the live version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pushDraftLive(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pushDraftLive($objectID, requestOptions: $requestOptions);

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
     * Schedule a landing page to be published.
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
     * Partially updates the draft version of a single landing page, specified by its ID. You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the page
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\AbStatus|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID the unique identifier for the content group associated with the page
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created the timestamp indicating when the page was created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished indicates whether the page is currently published
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\CurrentState|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\CurrentState> $currentState a generated ENUM descibing the current state of this page
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
     * @param \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\Language|value-of<\HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\AbStatus|string $abStatus,
        string $abTestID,
        \DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\ContentTypeCategory|string $contentTypeCategory,
        \DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\CurrentState|string $currentState,
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
        \HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams\Language|string $language,
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
    ): PageData {
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
