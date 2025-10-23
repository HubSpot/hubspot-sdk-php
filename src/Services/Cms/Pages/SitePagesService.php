<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\CollectionResponseWithTotalVersionPage;
use HubspotSDK\Cms\Pages\ContentLanguageVariation;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\SitePages\SitePageAttachToLangGroupParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCloneParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateAbTestVariationParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateLanguageVariationParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\AbStatus;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\CurrentState;
use HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\Language;
use HubspotSDK\Cms\Pages\SitePages\SitePageDeleteBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageDeleteParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageDetachFromLangGroupParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageEndAbTestParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageGetRevisionParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageListParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageListRevisionsParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRerunAbTestParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRestoreRevisionParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageRestoreRevisionToDraftParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageScheduleParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageSetNewLangPrimaryParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateBatchParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateLanguagesParams;
use HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\SitePagesContract;

use const HubspotSDK\Core\OMIT as omit;

final class SitePagesService implements SitePagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Site Page
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
     * @param array<string, ContentLanguageVariation> $translations
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
        [$parsed, $options] = SitePageCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Sparse updates a single Site Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the page
     * @param SitePageUpdateParams\AbStatus|value-of<SitePageUpdateParams\AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID
     * @param SitePageUpdateParams\ContentTypeCategory|value-of<SitePageUpdateParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished
     * @param SitePageUpdateParams\CurrentState|value-of<SitePageUpdateParams\CurrentState> $currentState a generated ENUM descibing the current state of this page
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
     * @param SitePageUpdateParams\Language|value-of<SitePageUpdateParams\Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,
     * mixed,> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,
     * mixed,> $widgets A data structure containing the data for all the modules for this page
     * @param bool $archived Specifies whether to update deleted Site Pages. Defaults to `false`.
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
        [$parsed, $options] = SitePageUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/site-pages/%1$s', $objectID],
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Get the list of site pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Site Pages. Defaults to `false`.
     * @param \DateTimeInterface $createdAfter only return Site Pages created after the specified time
     * @param \DateTimeInterface $createdAt only return Site Pages created at exactly the specified time
     * @param \DateTimeInterface $createdBefore only return Site Pages created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param string $property
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param \DateTimeInterface $updatedAfter only return Site Pages last updated after the specified time
     * @param \DateTimeInterface $updatedAt only return Site Pages last updated at exactly the specified time
     * @param \DateTimeInterface $updatedBefore only return Site Pages last updated before the specified time
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
        [$parsed, $options] = SitePageListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'cms/v3/pages/site-pages',
            query: $parsed,
            options: $options,
            convert: Page::class,
            page: \HubspotSDK\Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Site Page object identified by the id in the path.
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
        [$parsed, $options] = SitePageDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/pages/site-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Attach a site page to a multi-language group.
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
        [$parsed, $options] = SitePageAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/multi-language/attach-to-lang-group',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Clone a Site Page
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
        [$parsed, $options] = SitePageCloneParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/clone',
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
        [$parsed, $options] = SitePageCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/ab-test/create-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Create the Site Page objects detailed in the request body.
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
        [$parsed, $options] = SitePageCreateBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Create a new language variation from an existing site page
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
        [$parsed, $options] = SitePageCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/multi-language/create-language-variation',
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Delete the Site Page objects identified in the request body.
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
        [$parsed, $options] = SitePageDeleteBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/batch/archive',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Detach a site page from a multi-language group.
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
        [$parsed, $options] = SitePageDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/multi-language/detach-from-lang-group',
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
        [$parsed, $options] = SitePageEndAbTestParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/ab-test/end',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve the Site Page object identified by the id in the path.
     *
     * @param bool $archived Specifies whether to return deleted Site Pages. Defaults to `false`.
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
        [$parsed, $options] = SitePageGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/site-pages/%1$s', $objectID],
            query: $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the Site Page objects identified in the request body.
     *
     * @param list<string> $inputs strings to input
     * @param bool $archived Specifies whether to return deleted Site Pages. Defaults to `false`.
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
        [$parsed, $options] = SitePageGetBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full draft version of the Site Page.
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
            path: ['cms/v3/pages/site-pages/%1$s/draft', $objectID],
            options: $requestOptions,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Site Page
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
        [$parsed, $options] = SitePageGetRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'cms/v3/pages/site-pages/%1$s/revisions/%2$s', $objectID, $revisionID,
            ],
            options: $options,
            convert: VersionPage::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Site Page.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $before
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionPage {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];

        return $this->listRevisionsRaw($objectID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRevisionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionPage {
        [$parsed, $options] = SitePageListRevisionsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/pages/site-pages/%1$s/revisions', $objectID],
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalVersionPage::class,
        );
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Site Page and apply them to the live version.
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
            path: ['cms/v3/pages/site-pages/%1$s/draft/push-live', $objectID],
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
        [$parsed, $options] = SitePageRerunAbTestParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/ab-test/rerun',
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
            path: ['cms/v3/pages/site-pages/%1$s/draft/reset', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Takes a specified version of a Site Page and restores it.
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
        [$parsed, $options] = SitePageRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/site-pages/%1$s/revisions/%2$s/restore',
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
     * Takes a specified version of a Site Page, sets it as the new draft version of the Site Page.
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
        [$parsed, $options] = SitePageRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'cms/v3/pages/site-pages/%1$s/revisions/%2$s/restore-to-draft',
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
     * Schedule a Site Page to be Published
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
        [$parsed, $options] = SitePageScheduleParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/schedule',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Set a site page as the primary language of a multi-language group.
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
        [$parsed, $options] = SitePageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: 'cms/v3/pages/site-pages/multi-language/set-new-lang-primary',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Update the Site Page objects identified in the request body.
     *
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived Specifies whether to update deleted Site Pages. Defaults to `false`.
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
        [$parsed, $options] = SitePageUpdateBatchParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/batch/update',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponsePage::class,
        );
    }

    /**
     * @api
     *
     * Sparse updates the draft version of a single Site Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $id the unique ID of the page
     * @param SitePageUpdateDraftParams\AbStatus|value-of<SitePageUpdateDraftParams\AbStatus> $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param \DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,
     * mixed,>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param string $contentGroupID
     * @param SitePageUpdateDraftParams\ContentTypeCategory|value-of<SitePageUpdateDraftParams\ContentTypeCategory> $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param \DateTimeInterface $created
     * @param string $createdByID the ID of the user that created this page
     * @param bool $currentlyPublished
     * @param SitePageUpdateDraftParams\CurrentState|value-of<SitePageUpdateDraftParams\CurrentState> $currentState a generated ENUM descibing the current state of this page
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
     * @param SitePageUpdateDraftParams\Language|value-of<SitePageUpdateDraftParams\Language> $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
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
     * @param array<string, ContentLanguageVariation> $translations
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
        [$parsed, $options] = SitePageUpdateDraftParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['cms/v3/pages/site-pages/%1$s/draft', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: Page::class,
        );
    }

    /**
     * @api
     *
     * Explicitly set new languages for each site page in a multi-language group.
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
        [$parsed, $options] = SitePageUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/site-pages/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
