<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Angle;
use HubspotSDK\Cms\BackgroundImage;
use HubspotSDK\Cms\Blogs\Posts\BatchResponseBlogPost;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\BlogPost\Language;
use HubspotSDK\Cms\BreakpointStyles;
use HubspotSDK\Cms\ColorStop;
use HubspotSDK\Cms\Gradient;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\RgbaColor;
use HubspotSDK\Cms\RowMetaData;
use HubspotSDK\Cms\SideOrCorner;
use HubspotSDK\Cms\Styles;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<array{
     *   id: string,
     *   abStatus: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
     *   abTestID: string,
     *   archivedAt: int,
     *   archivedInDashboard: bool,
     *   attachedStylesheets: list<array<string,mixed>>,
     *   authorName: string,
     *   blogAuthorID: string,
     *   campaign: string,
     *   categoryID: int,
     *   contentGroupID: string,
     *   contentTypeCategory: '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|ContentTypeCategory,
     *   created: string|\DateTimeInterface,
     *   createdByID: string,
     *   currentlyPublished: bool,
     *   currentState: 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|CurrentState,
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
     *   language: 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Language,
     *   layoutSections: array<string,array{
     *     cells: list<mixed>,
     *     cssClass: string,
     *     cssID: string,
     *     cssStyle: string,
     *     label: string,
     *     name: string,
     *     params: array<string,mixed>,
     *     rowMetaData: list<array{
     *       cssClass: string,
     *       styles: array{
     *         backgroundColor: array{a: float, b: int, g: int, r: int}|RgbaColor,
     *         backgroundGradient: array{
     *           angle: array{units: string, value: float}|Angle,
     *           colors: list<array{
     *             color: array{a: float, b: int, g: int, r: int}|RgbaColor
     *           }|ColorStop>,
     *           sideOrCorner: array{
     *             horizontalSide: string, verticalSide: string
     *           }|SideOrCorner,
     *         }|Gradient,
     *         backgroundImage: array{
     *           backgroundPosition: string, backgroundSize: string, imageURL: string
     *         }|BackgroundImage,
     *         flexboxPositioning: string,
     *         forceFullWidthSection: bool,
     *         maxWidthSectionCentering: int,
     *         verticalAlignment: string,
     *         breakpointStyles?: array<string,array{
     *           hidden: bool, margin: mixed, padding: mixed
     *         }|BreakpointStyles>,
     *       }|Styles,
     *     }|RowMetaData>,
     *     rows: list<array<string,mixed>>,
     *     styles: array{
     *       backgroundColor: array{a: float, b: int, g: int, r: int}|RgbaColor,
     *       backgroundGradient: array{
     *         angle: array{units: string, value: float}|Angle,
     *         colors: list<array{
     *           color: array{a: float, b: int, g: int, r: int}|RgbaColor
     *         }|ColorStop>,
     *         sideOrCorner: array{
     *           horizontalSide: string, verticalSide: string
     *         }|SideOrCorner,
     *       }|Gradient,
     *       backgroundImage: array{
     *         backgroundPosition: string, backgroundSize: string, imageURL: string
     *       }|BackgroundImage,
     *       flexboxPositioning: string,
     *       forceFullWidthSection: bool,
     *       maxWidthSectionCentering: int,
     *       verticalAlignment: string,
     *       breakpointStyles?: array<string,array{
     *         hidden: bool, margin: mixed, padding: mixed
     *       }|BreakpointStyles>,
     *     }|Styles,
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
     *   password: string,
     *   postBody: string,
     *   postSummary: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   publishImmediately: bool,
     *   rssBody: string,
     *   rssSummary: string,
     *   slug: string,
     *   state: string,
     *   tagIDs: list<int>,
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
     * }|BlogPost> $inputs Blog posts to input
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost;

    /**
     * @api
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived Query param: Specifies whether to update deleted Blog Posts. Defaults to `false`.
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseBlogPost;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived query param: Specifies whether to return deleted blog posts Defaults to `false`
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseBlogPost;
}
