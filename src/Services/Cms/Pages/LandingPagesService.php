<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCloneParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageCreateParams\Language;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDeleteParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageEndAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageGetRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFolderRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListFoldersParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageListRevisionsParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRerunAbTestParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreFolderRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageRestoreRevisionToDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageScheduleParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateDraftParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFolderParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateFoldersBatchParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\LandingPages\LandingPageUpdateParams;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\Pages\VersionContentFolder;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\LandingPagesContract;

use const HubspotSDK\Core\OMIT as omit;

final class LandingPagesService implements LandingPagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Landing Page
     *
     * @param string $id the unique ID of the page
     * @param AbStatus|value-of<AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished
     * @param CurrentState|value-of<CurrentState> $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
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
     * @param array<string, LayoutSection> $layoutSections
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
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string, PagesContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
        $pageRedirected,
        $password,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $slug,
        $state,
        $subcategory,
        $templatePath,
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
    ): mixed {
        $params = [
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
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = LandingPageCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the page
     * @param LandingPageUpdateParams\AbStatus|value-of<LandingPageUpdateParams\AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID
     * @param LandingPageUpdateParams\ContentTypeCategory|value-of<LandingPageUpdateParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished
     * @param LandingPageUpdateParams\CurrentState|value-of<LandingPageUpdateParams\CurrentState> $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
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
     * @param LandingPageUpdateParams\Language|value-of<LandingPageUpdateParams\Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string, LayoutSection> $layoutSections
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
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string, PagesContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,
     * mixed,> $widgets A data structure containing the data for all the modules for this page
     * @param bool $archived Specifies whether to update deleted Landing Pages. Defaults to `false`.
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
        $pageRedirected,
        $password,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $slug,
        $state,
        $subcategory,
        $templatePath,
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
    ): Page {
        $params = [
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
        ];

        return $this->updateRaw($objectID, $params, $requestOptions);
    }

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
    ): Page {
        [$parsed, $options] = LandingPageUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Get the list of landing pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Landing Pages. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Landing Pages created after the specified time
     * @param \DateTimeInterface $createdAt only return Landing Pages created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Landing Pages created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Landing Pages last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Landing Pages last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Landing Pages last updated before the specified time
     *
     * @return \HubspotSDK\Page<Page>
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
    ): \HubspotSDK\Page {
        $params = [
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
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return \HubspotSDK\Page<Page>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): \HubspotSDK\Page {
        [$parsed, $options] = LandingPageListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/pages/landing-pages',
            query: $parsed,
            options: $options,
            convert: Page::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Landing Page object identified by the id in the path.
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteRaw($objectID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = LandingPageDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Attach a landing page to a multi-language group.
     *
     * @param string $id ID of the object to add to a multi-language group
     * @param string $language designated language of the object to add to a multi-language group
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
    ): mixed {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryID' => $primaryID,
            'primaryLanguage' => $primaryLanguage,
        ];

        return $this->attachToLangGroupRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = LandingPageAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a Landing Page
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
    ): Page {
        $params = ['id' => $id, 'cloneName' => $cloneName];

        return $this->cloneRaw($params, $requestOptions);
    }

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
    ): Page {
        [$parsed, $options] = LandingPageCloneParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/clone',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Create a new A/B test variation based on the information provided in the request body.
     *
     * @param string $contentID ID of the object to test
     * @param string $variationName name of A/B test variation
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        $contentID,
        $variationName,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['contentID' => $contentID, 'variationName' => $variationName];

        return $this->createAbTestVariationRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAbTestVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = LandingPageCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Create the Landing Page objects detailed in the request body.
     *
     * @param list<Page> $inputs pages to input
     *
     * @throws APIException
     */
    public function createBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs];

        return $this->createBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        [$parsed, $options] = LandingPageCreateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Create a new Folder
     *
     * @param string $id the unique ID of the content folder
     * @param int $category The type of object this folder applies to. Should always be LANDING_PAGE.
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this content folder was deleted
     * @param string $name The name of the folder which will show up in the app dashboard
     * @param int $parentFolderID The ID of the content folder this folder is nested under
     * @param \DateTimeInterface $updated
     *
     * @throws APIException
     */
    public function createFolder(
        $id,
        $category,
        $created,
        $deletedAt,
        $name,
        $parentFolderID,
        $updated,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder {
        $params = [
            'id' => $id,
            'category' => $category,
            'created' => $created,
            'deletedAt' => $deletedAt,
            'name' => $name,
            'parentFolderID' => $parentFolderID,
            'updated' => $updated,
        ];

        return $this->createFolderRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createFolderRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ContentFolder {
        [$parsed, $options] = LandingPageCreateFolderParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders',
            body: (object) $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Create the Folder objects detailed in the request body.
     *
     * @param list<ContentFolder> $inputs content folders to input
     *
     * @throws APIException
     */
    public function createFoldersBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        $params = ['inputs' => $inputs];

        return $this->createFoldersBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createFoldersBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        [$parsed, $options] = LandingPageCreateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing landing page
     *
     * @param string $id ID of content to clone
     * @param string $language target language of new variant
     * @param string $primaryLanguage language of primary content to clone
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        $id,
        $language = omit,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryLanguage' => $primaryLanguage,
        ];

        return $this->createLanguageVariationRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createLanguageVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [
            $parsed, $options,
        ] = LandingPageCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Landing Page objects identified in the request body.
     * Note: This is not the same as the dashboard `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to true.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function deleteBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageDeleteBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete the Folder object identified by the id in the path.
     *
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->deleteFolderRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteFolderRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageDeleteFolderParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete the Folder objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function deleteFoldersBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteFoldersBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteFoldersBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageDeleteFoldersBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Detach a landing page from a multi-language group.
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->detachFromLangGroupRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = LandingPageDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/detach-from-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * End an active A/B test and designate a winner.
     *
     * @param string $abTestID ID of the test to end
     * @param string $winnerID ID of the object to designate as the test winner
     *
     * @throws APIException
     */
    public function endAbTest(
        $abTestID,
        $winnerID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['abTestID' => $abTestID, 'winnerID' => $winnerID];

        return $this->endAbTestRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function endAbTestRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageEndAbTestParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/end',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the Landing Page object identified by the id in the path.
     *
     * @param bool $archived Specifies whether to return deleted Landing Pages. Defaults to `false`.
     * @param string $property
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['archived' => $archived, 'property' => $property];

        return $this->getRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = LandingPageGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Landing Page objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param bool $archived Specifies whether to return deleted Landing Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function getBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->getBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        [$parsed, $options] = LandingPageGetBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of the Landing Page.
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Folder object identified by the id in the path.
     *
     * @param bool $archived Specifies whether to return deleted Folders. Defaults to `false`.
     * @param string $property
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder {
        $params = ['archived' => $archived, 'property' => $property];

        return $this->getFolderRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getFolderRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ContentFolder {
        [$parsed, $options] = LandingPageGetFolderParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Folder
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionContentFolder {
        $params = ['objectID' => $objectID];

        return $this->getFolderRevisionRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getFolderRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionContentFolder {
        [$parsed, $options] = LandingPageGetFolderRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/pages/landing-pages/folders/%1$s/revisions/%2$s',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: VersionContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Update the Folder objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param bool $archived Specifies whether to return deleted Folders. Defaults to `false`.
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->getFoldersBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getFoldersBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        [$parsed, $options] = LandingPageGetFoldersBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Landing Page
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionPage {
        $params = ['objectID' => $objectID];

        return $this->getRevisionRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VersionPage {
        [$parsed, $options] = LandingPageGetRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s', $objectID, $revisionID,
            ],
            options: $options,
            convert: VersionPage::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Folder.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @return \HubspotSDK\Page<VersionContentFolder>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listFolderRevisionsRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return \HubspotSDK\Page<VersionContentFolder>
     *
     * @throws APIException
     */
    public function listFolderRevisionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): \HubspotSDK\Page {
        [$parsed, $options] = LandingPageListFolderRevisionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/folders/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: VersionContentFolder::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Get the list of Landing Page Folders. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Folders. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Folders created after the specified time
     * @param \DateTimeInterface $createdAt only return Folders created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Folders created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Folders last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Folders last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Folders last updated before the specified time
     *
     * @return \HubspotSDK\Page<ContentFolder>
     *
     * @throws APIException
     */
    public function listFolders(
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
    ): \HubspotSDK\Page {
        $params = [
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
        ];

        return $this->listFoldersRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return \HubspotSDK\Page<ContentFolder>
     *
     * @throws APIException
     */
    public function listFoldersRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): \HubspotSDK\Page {
        [$parsed, $options] = LandingPageListFoldersParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/pages/landing-pages/folders',
            query: $parsed,
            options: $options,
            convert: ContentFolder::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Landing Page.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @return \HubspotSDK\Page<VersionPage>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRevisionsRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return \HubspotSDK\Page<VersionPage>
     *
     * @throws APIException
     */
    public function listRevisionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): \HubspotSDK\Page {
        [$parsed, $options] = LandingPageListRevisionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/landing-pages/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: VersionPage::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Landing Page and apply them to the live version.
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/pages/landing-pages/%1$s/draft/push-live', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Rerun a previous A/B test.
     *
     * @param string $abTestID ID of the test to rerun
     * @param string $variationID ID of the object to reactivate as a test variation
     *
     * @throws APIException
     */
    public function rerunAbTest(
        $abTestID,
        $variationID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['abTestID' => $abTestID, 'variationID' => $variationID];

        return $this->rerunAbTestRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function rerunAbTestRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageRerunAbTestParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/ab-test/rerun',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to the live version.
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/pages/landing-pages/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Folder and restores it.
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): ContentFolder {
        $params = ['objectID' => $objectID];

        return $this->restoreFolderRevisionRaw(
            $revisionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreFolderRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ContentFolder {
        [$parsed, $options] = LandingPageRestoreFolderRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/folders/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Landing Page and restores it.
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['objectID' => $objectID];

        return $this->restoreRevisionRaw($revisionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreRevisionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = LandingPageRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s/restore',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Landing Page, sets it as the new draft version of the Landing Page.
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['objectID' => $objectID];

        return $this->restoreRevisionToDraftRaw(
            $revisionID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restoreRevisionToDraftRaw(
        int $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = LandingPageRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/landing-pages/%1$s/revisions/%2$s/restore-to-draft',
                $objectID,
                $revisionID,
            ],
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Schedule a Landing Page to be Published
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
    ): mixed {
        $params = ['id' => $id, 'publishDate' => $publishDate];

        return $this->scheduleRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = LandingPageScheduleParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/schedule',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Set a landing page as the primary language of a multi-language group.
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->setNewLangPrimaryRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setNewLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/pages/landing-pages/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update the Landing Page objects identified in the request body.
     *
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived Specifies whether to update deleted Landing Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function updateBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->updateBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        [$parsed, $options] = LandingPageUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/batch/update',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates the draft version of a single Landing Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the page
     * @param LandingPageUpdateDraftParams\AbStatus|value-of<LandingPageUpdateDraftParams\AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID
     * @param LandingPageUpdateDraftParams\ContentTypeCategory|value-of<LandingPageUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished
     * @param LandingPageUpdateDraftParams\CurrentState|value-of<LandingPageUpdateDraftParams\CurrentState> $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
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
     * @param LandingPageUpdateDraftParams\Language|value-of<LandingPageUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string, LayoutSection> $layoutSections
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
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string, PagesContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
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
        $pageRedirected,
        $password,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $slug,
        $state,
        $subcategory,
        $templatePath,
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
    ): Page {
        $params = [
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
        ];

        return $this->updateDraftRaw($objectID, $params, $requestOptions);
    }

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
    ): Page {
        [$parsed, $options] = LandingPageUpdateDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/%1$s/draft', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Folder object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the content folder
     * @param int $category The type of object this folder applies to. Should always be LANDING_PAGE.
     * @param \DateTimeInterface $created
     * @param \DateTimeInterface $deletedAt the timestamp (ISO8601 format) when this content folder was deleted
     * @param string $name The name of the folder which will show up in the app dashboard
     * @param int $parentFolderID The ID of the content folder this folder is nested under
     * @param \DateTimeInterface $updated
     * @param bool $archived Specifies whether to update deleted Folders. Defaults to `false`.
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        $id,
        $category,
        $created,
        $deletedAt,
        $name,
        $parentFolderID,
        $updated,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): ContentFolder {
        $params = [
            'id' => $id,
            'category' => $category,
            'created' => $created,
            'deletedAt' => $deletedAt,
            'name' => $name,
            'parentFolderID' => $parentFolderID,
            'updated' => $updated,
            'archived' => $archived,
        ];

        return $this->updateFolderRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateFolderRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ContentFolder {
        [$parsed, $options] = LandingPageUpdateFolderParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/landing-pages/folders/%1$s', $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Update the Folder objects identified in the request body.
     *
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function updateFoldersBatch(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->updateFoldersBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateFoldersBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseContentFolder {
        [$parsed, $options] = LandingPageUpdateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/folders/batch/update',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseContentFolder::class,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each landing page in a multi-language group.
     *
     * @param array<string,
     * string,> $languages Map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     *
     * @throws APIException
     */
    public function updateLanguages(
        $languages,
        $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['languages' => $languages, 'primaryID' => $primaryID];

        return $this->updateLanguagesRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateLanguagesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = LandingPageUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
