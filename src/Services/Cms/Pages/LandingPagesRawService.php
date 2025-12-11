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
use HubspotSDK\Cms\Styles;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\LandingPagesRawContract;

final class LandingPagesRawService implements LandingPagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Landing Page
     *
     * @param array{
     *   id: string,
     *   abStatus: value-of<AbStatus>,
     *   abTestID: string,
     *   archivedAt: string|\DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|ContentTypeCategory,
     *   created: string|\DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<CurrentState>,
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
     *   language: value-of<Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssID: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
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
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIDs?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|LandingPageCreateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function create(
        array|LandingPageCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID path param: The Landing Page id
     * @param array{
     *   id: string,
     *   abStatus: value-of<LandingPageUpdateParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: string|\DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|LandingPageUpdateParams\ContentTypeCategory,
     *   created: string|\DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<LandingPageUpdateParams\CurrentState>,
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
     *   language: value-of<LandingPageUpdateParams\Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssID: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
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
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIDs?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     *   archived?: bool,
     * }|LandingPageUpdateParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|LandingPageUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|LandingPageListParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<Page>>
     *
     * @throws APIException
     */
    public function list(
        array|LandingPageListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = LandingPageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Landing Page id
     * @param array{archived?: bool}|LandingPageDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|LandingPageDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id: string, language: string, primaryID: string, primaryLanguage?: string
     * }|LandingPageAttachToLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function attachToLangGroup(
        array|LandingPageAttachToLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageAttachToLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{id: string, cloneName?: string}|LandingPageCloneParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function clone(
        array|LandingPageCloneParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = LandingPageCloneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   contentID: string, variationName: string
     * }|LandingPageCreateAbTestVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createAbTestVariation(
        array|LandingPageCreateAbTestVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateAbTestVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<array{
     *     id: string,
     *     abStatus: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|Page\AbStatus,
     *     abTestID: string,
     *     archivedAt: string|\DateTimeInterface,
     *     archivedInDashboard: bool,
     *     attachedStylesheets: list<array<string,mixed>>,
     *     authorName: string,
     *     campaign: string,
     *     categoryID: int,
     *     contentGroupID: string,
     *     contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|Page\ContentTypeCategory,
     *     created: string|\DateTimeInterface,
     *     createdByID: string,
     *     currentlyPublished: bool,
     *     currentState: 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|Page\CurrentState,
     *     domain: string,
     *     dynamicPageDataSourceID: string,
     *     dynamicPageDataSourceType: int,
     *     dynamicPageHubDBTableID: string,
     *     enableDomainStylesheets: bool,
     *     enableLayoutStylesheets: bool,
     *     featuredImage: string,
     *     featuredImageAltText: string,
     *     folderID: string,
     *     footerHTML: string,
     *     headHTML: string,
     *     htmlTitle: string,
     *     includeDefaultCustomCss: bool,
     *     language: 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Page\Language,
     *     layoutSections: array<string,mixed>,
     *     linkRelCanonicalURL: string,
     *     mabExperimentID: string,
     *     metaDescription: string,
     *     name: string,
     *     pageExpiryDate: int,
     *     pageExpiryEnabled: bool,
     *     pageExpiryRedirectID: int,
     *     pageExpiryRedirectURL: string,
     *     pageRedirected: bool,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     publishImmediately: bool,
     *     slug: string,
     *     state: string,
     *     subcategory: string,
     *     templatePath: string,
     *     themeSettingsValues: array<string,mixed>,
     *     translatedFromID: string,
     *     translations: array<string,mixed>,
     *     updated: string|\DateTimeInterface,
     *     updatedByID: string,
     *     url: string,
     *     useFeaturedImage: bool,
     *     widgetContainers: array<string,mixed>,
     *     widgets: array<string,mixed>,
     *   }|Page>,
     * }|LandingPageCreateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function createBatch(
        array|LandingPageCreateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id: string,
     *   category: int,
     *   created: string|\DateTimeInterface,
     *   deletedAt: string|\DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: string|\DateTimeInterface,
     * }|LandingPageCreateFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function createFolder(
        array|LandingPageCreateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<array{
     *     id: string,
     *     category: int,
     *     created: string|\DateTimeInterface,
     *     deletedAt: string|\DateTimeInterface,
     *     name: string,
     *     parentFolderID: int,
     *     updated: string|\DateTimeInterface,
     *   }|ContentFolder>,
     * }|LandingPageCreateFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function createFoldersBatch(
        array|LandingPageCreateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id: string, language?: string, primaryLanguage?: string
     * }|LandingPageCreateLanguageVariationParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function createLanguageVariation(
        array|LandingPageCreateLanguageVariationParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageCreateLanguageVariationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{inputs: list<string>}|LandingPageDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|LandingPageDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Folder id
     * @param array{archived?: bool}|LandingPageDeleteFolderParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFolder(
        string $objectID,
        array|LandingPageDeleteFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{inputs: list<string>}|LandingPageDeleteFoldersBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteFoldersBatch(
        array|LandingPageDeleteFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDeleteFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{id: string}|LandingPageDetachFromLangGroupParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        array|LandingPageDetachFromLangGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageDetachFromLangGroupParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   abTestID: string, winnerID: string
     * }|LandingPageEndAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function endAbTest(
        array|LandingPageEndAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageEndAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Landing Page id
     * @param array{archived?: bool, property?: string}|LandingPageGetParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        array|LandingPageGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|LandingPageGetBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function getBatch(
        array|LandingPageGetBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Landing Page id
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Folder id
     * @param array{
     *   archived?: bool, property?: string
     * }|LandingPageGetFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function getFolder(
        string $objectID,
        array|LandingPageGetFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFolderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $revisionID the Folder version id
     * @param array{objectID: string}|LandingPageGetFolderRevisionParams $params
     *
     * @return BaseResponse<VersionContentFolder>
     *
     * @throws APIException
     */
    public function getFolderRevision(
        string $revisionID,
        array|LandingPageGetFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFolderRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<string>, archived?: bool
     * }|LandingPageGetFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function getFoldersBatch(
        array|LandingPageGetFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $revisionID the Landing Page version id
     * @param array{objectID: string}|LandingPageGetRevisionParams $params
     *
     * @return BaseResponse<VersionPage>
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        array|LandingPageGetRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageGetRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Folder id
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|LandingPageListFolderRevisionsParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionContentFolder>>
     *
     * @throws APIException
     */
    public function listFolderRevisions(
        string $objectID,
        array|LandingPageListFolderRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListFolderRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   createdAfter?: string|\DateTimeInterface,
     *   createdAt?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     *   limit?: int,
     *   property?: string,
     *   sort?: list<string>,
     *   updatedAfter?: string|\DateTimeInterface,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedBefore?: string|\DateTimeInterface,
     * }|LandingPageListFoldersParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<ContentFolder>>
     *
     * @throws APIException
     */
    public function listFolders(
        array|LandingPageListFoldersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListFoldersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Landing Page id
     * @param array{
     *   after?: string, before?: string, limit?: int
     * }|LandingPageListRevisionsParams $params
     *
     * @return BaseResponse<\HubspotSDK\Page<VersionPage>>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        array|LandingPageListRevisionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageListRevisionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the id of the Landing Page for which it's draft will be pushed live
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   abTestID: string, variationID: string
     * }|LandingPageRerunAbTestParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function rerunAbTest(
        array|LandingPageRerunAbTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRerunAbTestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the id of the Landing Page for which it's draft will be reset
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $revisionID the Folder version id to restore
     * @param array{objectID: string}|LandingPageRestoreFolderRevisionParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function restoreFolderRevision(
        string $revisionID,
        array|LandingPageRestoreFolderRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreFolderRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $revisionID the Landing Page version id to restore
     * @param array{objectID: string}|LandingPageRestoreRevisionParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        array|LandingPageRestoreRevisionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreRevisionParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param int $revisionID the Landing Page version id to restore
     * @param array{objectID: string}|LandingPageRestoreRevisionToDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        array|LandingPageRestoreRevisionToDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageRestoreRevisionToDraftParams::parseRequest(
            $params,
            $requestOptions,
        );
        $objectID = $parsed['objectID'];
        unset($parsed['objectID']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id: string, publishDate: string|\DateTimeInterface
     * }|LandingPageScheduleParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function schedule(
        array|LandingPageScheduleParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageScheduleParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{id: string}|LandingPageSetNewLangPrimaryParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function setNewLangPrimary(
        array|LandingPageSetNewLangPrimaryParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageSetNewLangPrimaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|LandingPageUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponsePage>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|LandingPageUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID the Landing Page id
     * @param array{
     *   id: string,
     *   abStatus: value-of<LandingPageUpdateDraftParams\AbStatus>,
     *   abTestID: string,
     *   archivedAt: string|\DateTimeInterface,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|LandingPageUpdateDraftParams\ContentTypeCategory,
     *   created: string|\DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: value-of<LandingPageUpdateDraftParams\CurrentState>,
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
     *   language: value-of<LandingPageUpdateDraftParams\Language>,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssID: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<mixed>,
     *     rows: list<array<string,mixed>>,
     *     styles: array<mixed>|Styles,
     *     type: string,
     *     w: int,
     *     x: int,
     *   }|LayoutSection>,
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
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   slug: string,
     *   state: string,
     *   subcategory: string,
     *   templatePath: string,
     *   themeSettingsValues: array<string,mixed>,
     *   translatedFromID: string,
     *   translations: array<string,array{
     *     id: int,
     *     archivedInDashboard: bool,
     *     authorName: string,
     *     campaign: string,
     *     created: string|\DateTimeInterface,
     *     name: string,
     *     password: string,
     *     publicAccessRules: list<mixed>,
     *     publicAccessRulesEnabled: bool,
     *     publishDate: string|\DateTimeInterface,
     *     slug: string,
     *     state: string,
     *     updated: string|\DateTimeInterface,
     *     tagIDs?: list<int>,
     *   }|PagesContentLanguageVariation>,
     *   updated: string|\DateTimeInterface,
     *   updatedByID: string,
     *   url: string,
     *   useFeaturedImage: bool,
     *   widgetContainers: array<string,mixed>,
     *   widgets: array<string,mixed>,
     * }|LandingPageUpdateDraftParams $params
     *
     * @return BaseResponse<Page>
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        array|LandingPageUpdateDraftParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateDraftParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $objectID path param: The Folder id
     * @param array{
     *   id: string,
     *   category: int,
     *   created: string|\DateTimeInterface,
     *   deletedAt: string|\DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
     *   updated: string|\DateTimeInterface,
     *   archived?: bool,
     * }|LandingPageUpdateFolderParams $params
     *
     * @return BaseResponse<ContentFolder>
     *
     * @throws APIException
     */
    public function updateFolder(
        string $objectID,
        array|LandingPageUpdateFolderParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateFolderParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|LandingPageUpdateFoldersBatchParams $params
     *
     * @return BaseResponse<BatchResponseContentFolder>
     *
     * @throws APIException
     */
    public function updateFoldersBatch(
        array|LandingPageUpdateFoldersBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateFoldersBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   languages: array<string,string>, primaryID: string
     * }|LandingPageUpdateLanguagesParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateLanguages(
        array|LandingPageUpdateLanguagesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LandingPageUpdateLanguagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/pages/landing-pages/multi-language/update-languages',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
