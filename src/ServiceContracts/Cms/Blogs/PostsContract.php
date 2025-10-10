<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs;

use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\CollectionResponseWithTotalVersionBlogPost;
use HubspotSDK\Cms\Blogs\Posts\ContentLanguageVariation;
use HubspotSDK\Cms\Blogs\Posts\LayoutSection;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface PostsContract
{
    /**
     * @api
     *
     * @param string $id
     * @param AbStatus|value-of<AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param ContentTypeCategory|value-of<ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param CurrentState|value-of<CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param Language|value-of<Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
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
        $blogAuthorID,
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
        $enableGoogleAmpOutputOverride,
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
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
     * @param bool $archived
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
        $blogAuthorID,
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
        $enableGoogleAmpOutputOverride,
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
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param string $after
     * @param bool $archived
     * @param \DateTimeInterface $createdAfter
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdBefore
     * @param int $limit
     * @param string $property
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAfter
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedBefore
     *
     * @return Page<BlogPost>
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
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<BlogPost>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        $archived = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     * @param \HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostAttachToLangGroupParams\Language> $language
     * @param string $primaryID
     * @param string $primaryLanguage
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        $id,
        $language,
        $primaryID,
        $primaryLanguage = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     * @param string $cloneName
     *
     * @throws APIException
     */
    public function clone(
        $id,
        $cloneName = omit,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id
     * @param string $language
     *
     * @throws APIException
     */
    public function createLangVariation(
        $id,
        $language = omit,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createLangVariationRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionBlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getPreviousVersionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VersionBlogPost;

    /**
     * @api
     *
     * @param string $after
     * @param string $before
     * @param int $limit
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        $after = omit,
        $before = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalVersionBlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getPreviousVersionsRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalVersionBlogPost;

    /**
     * @api
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param bool $archived
     * @param string $property
     *
     * @throws APIException
     */
    public function read(
        string $objectID,
        $archived = omit,
        $property = omit,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $objectID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionRaw(
        string $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): BlogPost;

    /**
     * @api
     *
     * @param string $objectID
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraftRaw(
        int $revisionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BlogPost;

    /**
     * @api
     *
     * @param string $id
     * @param \DateTimeInterface $publishDate
     *
     * @throws APIException
     */
    public function schedule(
        $id,
        $publishDate,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function setLangPrimary(
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function setLangPrimaryRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus> $abStatus
     * @param string $abTestID
     * @param int $archivedAt
     * @param bool $archivedInDashboard
     * @param list<array<string, mixed>> $attachedStylesheets
     * @param string $authorName
     * @param string $blogAuthorID
     * @param string $campaign
     * @param int $categoryID
     * @param string $contentGroupID
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory> $contentTypeCategory
     * @param \DateTimeInterface $created
     * @param string $createdByID
     * @param bool $currentlyPublished
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState> $currentState
     * @param string $domain
     * @param string $dynamicPageDataSourceID
     * @param int $dynamicPageDataSourceType
     * @param string $dynamicPageHubDBTableID
     * @param bool $enableDomainStylesheets
     * @param bool $enableGoogleAmpOutputOverride
     * @param bool $enableLayoutStylesheets
     * @param string $featuredImage
     * @param string $featuredImageAltText
     * @param string $folderID
     * @param string $footerHTML
     * @param string $headHTML
     * @param string $htmlTitle
     * @param bool $includeDefaultCustomCss
     * @param \HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language|value-of<\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language> $language
     * @param array<string, LayoutSection> $layoutSections
     * @param string $linkRelCanonicalURL
     * @param string $mabExperimentID
     * @param string $metaDescription
     * @param string $name
     * @param int $pageExpiryDate
     * @param bool $pageExpiryEnabled
     * @param int $pageExpiryRedirectID
     * @param string $pageExpiryRedirectURL
     * @param string $password
     * @param string $postBody
     * @param string $postSummary
     * @param list<mixed> $publicAccessRules
     * @param bool $publicAccessRulesEnabled
     * @param \DateTimeInterface $publishDate
     * @param bool $publishImmediately
     * @param string $rssBody
     * @param string $rssSummary
     * @param string $slug
     * @param string $state
     * @param list<int> $tagIDs
     * @param array<string, mixed> $themeSettingsValues
     * @param string $translatedFromID
     * @param array<string, ContentLanguageVariation> $translations
     * @param \DateTimeInterface $updated
     * @param string $updatedByID
     * @param string $url
     * @param bool $useFeaturedImage
     * @param array<string, mixed> $widgetContainers
     * @param array<string, mixed> $widgets
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
        $blogAuthorID,
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
        $enableGoogleAmpOutputOverride,
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
        $password,
        $postBody,
        $postSummary,
        $publicAccessRules,
        $publicAccessRulesEnabled,
        $publishDate,
        $publishImmediately,
        $rssBody,
        $rssSummary,
        $slug,
        $state,
        $tagIDs,
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
    ): BlogPost;

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
    ): BlogPost;

    /**
     * @api
     *
     * @param array<string, string> $languages
     * @param string $primaryID
     *
     * @throws APIException
     */
    public function updateLangs(
        $languages,
        $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateLangsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
