<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Angle;
use HubspotSDK\Cms\BackgroundImage;
use HubspotSDK\Cms\BreakpointStyles;
use HubspotSDK\Cms\ColorStop;
use HubspotSDK\Cms\Gradient;
use HubspotSDK\Cms\LayoutSection;
use HubspotSDK\Cms\Pages\BatchResponsePage;
use HubspotSDK\Cms\Pages\Page;
use HubspotSDK\Cms\Pages\Page\AbStatus;
use HubspotSDK\Cms\Pages\Page\ContentTypeCategory;
use HubspotSDK\Cms\Pages\Page\CurrentState;
use HubspotSDK\Cms\Pages\Page\Language;
use HubspotSDK\Cms\Pages\PagesContentLanguageVariation;
use HubspotSDK\Cms\Pages\VersionPage;
use HubspotSDK\Cms\RgbaColor;
use HubspotSDK\Cms\RowMetaData;
use HubspotSDK\Cms\SideOrCorner;
use HubspotSDK\Cms\Styles;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Pages\SitePagesContract;

final class SitePagesService implements SitePagesContract
{
    /**
     * @api
     */
    public SitePagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SitePagesRawService($client);
    }

    /**
     * @api
     *
     * Create a new Site Page
     *
     * @param string $id the unique ID of the page
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\AbStatus $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param string|\DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\ContentTypeCategory $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param string $createdByID the ID of the user that created this page
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\CurrentState $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
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
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\Language $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string,array{
     *   cells: list<mixed>,
     *   cssClass: string,
     *   cssID: string,
     *   cssStyle: string,
     *   label: string,
     *   name: string,
     *   params: array<string,mixed>,
     *   rowMetaData: list<array{
     *     cssClass: string,
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
     *   }|RowMetaData>,
     *   rows: list<array<string,mixed>>,
     *   styles: array{
     *     backgroundColor: array{a: float, b: int, g: int, r: int}|RgbaColor,
     *     backgroundGradient: array{
     *       angle: array{units: string, value: float}|Angle,
     *       colors: list<array{
     *         color: array{a: float, b: int, g: int, r: int}|RgbaColor
     *       }|ColorStop>,
     *       sideOrCorner: array{
     *         horizontalSide: string, verticalSide: string
     *       }|SideOrCorner,
     *     }|Gradient,
     *     backgroundImage: array{
     *       backgroundPosition: string, backgroundSize: string, imageURL: string
     *     }|BackgroundImage,
     *     flexboxPositioning: string,
     *     forceFullWidthSection: bool,
     *     maxWidthSectionCentering: int,
     *     verticalAlignment: string,
     *     breakpointStyles?: array<string,array{
     *       hidden: bool, margin: mixed, padding: mixed
     *     }|BreakpointStyles>,
     *   }|Styles,
     *   type: string,
     *   w: int,
     *   x: int,
     * }|LayoutSection> $layoutSections
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
     * @param string|\DateTimeInterface $publishDate the date (ISO8601 format) the page is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $slug The path of the this page. This field is appended to the domain to construct the url of this page.
     * @param string $state an ENUM descibing the current state of this page
     * @param string $subcategory Details the type of page this is. Should always be landing_page or site_page
     * @param string $templatePath string detailing the path of the template used for this page
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string,array{
     *   id: int,
     *   archivedInDashboard: bool,
     *   authorName: string,
     *   campaign: string,
     *   created: string|\DateTimeInterface,
     *   name: string,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   slug: string,
     *   state: string,
     *   updated: string|\DateTimeInterface,
     *   tagIDs?: list<int>,
     * }|PagesContentLanguageVariation> $translations
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\AbStatus $abStatus,
        string $abTestID,
        string|\DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\CurrentState $currentState,
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
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageCreateParams\Language $language,
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
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $slug,
        string $state,
        string $subcategory,
        string $templatePath,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        string|\DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
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

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sparse updates a single Site Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID path param: The Site Page id
     * @param string $id body param: The unique ID of the page
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\AbStatus $abStatus Body param: The status of the AB test associated with this page, if applicable
     * @param string $abTestID Body param: The ID of the AB test associated with this page, if applicable
     * @param string|\DateTimeInterface $archivedAt body param: The timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard body param: If True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets Body param: List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName body param: The name of the user that updated this page
     * @param string $campaign body param: The GUID of the marketing campaign this page is a part of
     * @param int $categoryID Body param: ID of the type of object this is. Should always .
     * @param string $contentGroupID Body param:
     * @param '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\ContentTypeCategory $contentTypeCategory Body param: An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param string|\DateTimeInterface $created Body param:
     * @param string $createdByID body param: The ID of the user that created this page
     * @param bool $currentlyPublished Body param:
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\CurrentState $currentState body param: A generated ENUM descibing the current state of this page
     * @param string $domain Body param: The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
     * @param string $dynamicPageDataSourceID Body param:
     * @param int $dynamicPageDataSourceType Body param:
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
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\Language $language Body param: The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string,array{
     *   cells: list<mixed>,
     *   cssClass: string,
     *   cssID: string,
     *   cssStyle: string,
     *   label: string,
     *   name: string,
     *   params: array<string,mixed>,
     *   rowMetaData: list<array{
     *     cssClass: string,
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
     *   }|RowMetaData>,
     *   rows: list<array<string,mixed>>,
     *   styles: array{
     *     backgroundColor: array{a: float, b: int, g: int, r: int}|RgbaColor,
     *     backgroundGradient: array{
     *       angle: array{units: string, value: float}|Angle,
     *       colors: list<array{
     *         color: array{a: float, b: int, g: int, r: int}|RgbaColor
     *       }|ColorStop>,
     *       sideOrCorner: array{
     *         horizontalSide: string, verticalSide: string
     *       }|SideOrCorner,
     *     }|Gradient,
     *     backgroundImage: array{
     *       backgroundPosition: string, backgroundSize: string, imageURL: string
     *     }|BackgroundImage,
     *     flexboxPositioning: string,
     *     forceFullWidthSection: bool,
     *     maxWidthSectionCentering: int,
     *     verticalAlignment: string,
     *     breakpointStyles?: array<string,array{
     *       hidden: bool, margin: mixed, padding: mixed
     *     }|BreakpointStyles>,
     *   }|Styles,
     *   type: string,
     *   w: int,
     *   x: int,
     * }|LayoutSection> $layoutSections Body param:
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
     * @param string|\DateTimeInterface $publishDate body param: The date (ISO8601 format) the page is to be published at
     * @param bool $publishImmediately body param: Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $slug Body param: The path of the this page. This field is appended to the domain to construct the url of this page.
     * @param string $state body param: An ENUM descibing the current state of this page
     * @param string $subcategory Body param: Details the type of page this is. Should always be landing_page or site_page
     * @param string $templatePath body param: String detailing the path of the template used for this page
     * @param array<string,mixed> $themeSettingsValues Body param:
     * @param string $translatedFromID body param: ID of the primary page this object was translated from
     * @param array<string,array{
     *   id: int,
     *   archivedInDashboard: bool,
     *   authorName: string,
     *   campaign: string,
     *   created: string|\DateTimeInterface,
     *   name: string,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   slug: string,
     *   state: string,
     *   updated: string|\DateTimeInterface,
     *   tagIDs?: list<int>,
     * }|PagesContentLanguageVariation> $translations Body param:
     * @param string|\DateTimeInterface $updated Body param:
     * @param string $updatedByID body param: The ID of the user that updated this page
     * @param string $url body param: A generated field representing the URL of this page
     * @param bool $useFeaturedImage body param: Boolean to determine if this page should use a featuredImage
     * @param array<string,mixed> $widgetContainers Body param: A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets body param: A data structure containing the data for all the modules for this page
     * @param bool $archived Query param: Specifies whether to update deleted Site Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\AbStatus $abStatus,
        string $abTestID,
        string|\DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\CurrentState $currentState,
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
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateParams\Language $language,
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
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $slug,
        string $state,
        string $subcategory,
        string $templatePath,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        string|\DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
        ?bool $archived = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the list of site pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted Site Pages. Defaults to `false`.
     * @param string|\DateTimeInterface $createdAfter only return Site Pages created after the specified time
     * @param string|\DateTimeInterface $createdAt only return Site Pages created at exactly the specified time
     * @param string|\DateTimeInterface $createdBefore only return Site Pages created before the specified time
     * @param int $limit The maximum number of results to return. Default is 100.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     * @param string|\DateTimeInterface $updatedAfter only return Site Pages last updated after the specified time
     * @param string|\DateTimeInterface $updatedAt only return Site Pages last updated at exactly the specified time
     * @param string|\DateTimeInterface $updatedBefore only return Site Pages last updated before the specified time
     *
     * @return \HubspotSDK\Page<Page>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        string|\DateTimeInterface|null $createdAfter = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdBefore = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        string|\DateTimeInterface|null $updatedAfter = null,
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedBefore = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete the Site Page object identified by the id in the path.
     *
     * @param string $objectID the Site Page id
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $id,
        string $language,
        string $primaryID,
        ?string $primaryLanguage = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryID' => $primaryID,
            'primaryLanguage' => $primaryLanguage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachToLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $id,
        ?string $cloneName = null,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['id' => $id, 'cloneName' => $cloneName];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $contentID,
        string $variationName,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['contentID' => $contentID, 'variationName' => $variationName];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAbTestVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create the Site Page objects detailed in the request body.
     *
     * @param list<array{
     *   id: string,
     *   abStatus: 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus,
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
     *   currentState: 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|CurrentState,
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
     *   language: 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Language,
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
     * }|Page> $inputs Pages to input
     *
     * @throws APIException
     */
    public function createBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $id,
        ?string $language = null,
        ?string $primaryLanguage = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'id' => $id,
            'language' => $language,
            'primaryLanguage' => $primaryLanguage,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLanguageVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->detachFromLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $abTestID,
        string $winnerID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['abTestID' => $abTestID, 'winnerID' => $winnerID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->endAbTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the Site Page object identified by the id in the path.
     *
     * @param string $objectID the Site Page id
     * @param bool $archived Specifies whether to return deleted Site Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = ['archived' => $archived, 'property' => $property];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the Site Page objects identified in the request body.
     *
     * @param list<string> $inputs body param: Strings to input
     * @param bool $archived Query param: Specifies whether to return deleted Site Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function getBatch(
        array $inputs,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the full draft version of the Site Page.
     *
     * @param string $objectID the Site Page id
     *
     * @throws APIException
     */
    public function getDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a previous version of a Site Page
     *
     * @param string $revisionID the Site Page version id
     * @param string $objectID the Site Page id
     *
     * @throws APIException
     */
    public function getRevision(
        string $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionPage {
        $params = ['objectID' => $objectID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all the previous versions of a Site Page.
     *
     * @param string $objectID the Site Page id
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @return \HubspotSDK\Page<VersionPage>
     *
     * @throws APIException
     */
    public function listRevisions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): \HubspotSDK\Page {
        $params = ['after' => $after, 'before' => $before, 'limit' => $limit];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRevisions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Take any changes from the draft version of the Site Page and apply them to the live version.
     *
     * @param string $objectID the id of the Site Page for which it's draft will be pushed live
     *
     * @throws APIException
     */
    public function publishDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->publishDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
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
        string $abTestID,
        string $variationID,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['abTestID' => $abTestID, 'variationID' => $variationID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->rerunAbTest(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discards any edits and resets the draft to the live version.
     *
     * @param string $objectID the id of the Site Page for which it's draft will be reset
     *
     * @throws APIException
     */
    public function resetDraft(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resetDraft($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a Site Page and restores it.
     *
     * @param string $revisionID the Site Page version id to restore
     * @param string $objectID the Site Page id
     *
     * @throws APIException
     */
    public function restoreRevision(
        string $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['objectID' => $objectID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevision($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a Site Page, sets it as the new draft version of the Site Page.
     *
     * @param int $revisionID the Site Page version id to restore
     * @param string $objectID the Site Page id
     *
     * @throws APIException
     */
    public function restoreRevisionToDraft(
        int $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): Page {
        $params = ['objectID' => $objectID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restoreRevisionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Schedule a Site Page to be Published
     *
     * @param string $id the ID of the object to be scheduled
     * @param string|\DateTimeInterface $publishDate the date the object should transition from scheduled to published
     *
     * @throws APIException
     */
    public function schedule(
        string $id,
        string|\DateTimeInterface $publishDate,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['id' => $id, 'publishDate' => $publishDate];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->schedule(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setNewLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the Site Page objects identified in the request body.
     *
     * @param list<mixed> $inputs body param: JSON nodes to input
     * @param bool $archived Query param: Specifies whether to update deleted Site Pages. Defaults to `false`.
     *
     * @throws APIException
     */
    public function updateBatch(
        array $inputs,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePage {
        $params = ['inputs' => $inputs, 'archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateBatch(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sparse updates the draft version of a single Site Page object identified by the id in the path.
     * You only need to specify the column values that you are modifying.
     *
     * @param string $objectID the Site Page id
     * @param string $id the unique ID of the page
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\AbStatus $abStatus The status of the AB test associated with this page, if applicable
     * @param string $abTestID The ID of the AB test associated with this page, if applicable
     * @param string|\DateTimeInterface $archivedAt the timestamp (ISO8601 format) when this page was deleted
     * @param bool $archivedInDashboard if True, the page will not show up in your dashboard, although the page could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this page. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the user that updated this page
     * @param string $campaign the GUID of the marketing campaign this page is a part of
     * @param int $categoryID ID of the type of object this is. Should always .
     * @param '0'|'1'|'10'|'11'|'12'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\ContentTypeCategory $contentTypeCategory An ENUM descibing the type of this object. Should be either LANDING_PAGE or SITE_PAGE.
     * @param string $createdByID the ID of the user that created this page
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\CurrentState $currentState a generated ENUM descibing the current state of this page
     * @param string $domain The domain this page will resolve to. If null, the page will default to the primary domain for this content type.
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
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\Language $language The explicitly defined ISO 639 language code of the page. If null, the page will default to the language of the Domain.
     * @param array<string,array{
     *   cells: list<mixed>,
     *   cssClass: string,
     *   cssID: string,
     *   cssStyle: string,
     *   label: string,
     *   name: string,
     *   params: array<string,mixed>,
     *   rowMetaData: list<array{
     *     cssClass: string,
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
     *   }|RowMetaData>,
     *   rows: list<array<string,mixed>>,
     *   styles: array{
     *     backgroundColor: array{a: float, b: int, g: int, r: int}|RgbaColor,
     *     backgroundGradient: array{
     *       angle: array{units: string, value: float}|Angle,
     *       colors: list<array{
     *         color: array{a: float, b: int, g: int, r: int}|RgbaColor
     *       }|ColorStop>,
     *       sideOrCorner: array{
     *         horizontalSide: string, verticalSide: string
     *       }|SideOrCorner,
     *     }|Gradient,
     *     backgroundImage: array{
     *       backgroundPosition: string, backgroundSize: string, imageURL: string
     *     }|BackgroundImage,
     *     flexboxPositioning: string,
     *     forceFullWidthSection: bool,
     *     maxWidthSectionCentering: int,
     *     verticalAlignment: string,
     *     breakpointStyles?: array<string,array{
     *       hidden: bool, margin: mixed, padding: mixed
     *     }|BreakpointStyles>,
     *   }|Styles,
     *   type: string,
     *   w: int,
     *   x: int,
     * }|LayoutSection> $layoutSections
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
     * @param string|\DateTimeInterface $publishDate the date (ISO8601 format) the page is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $slug The path of the this page. This field is appended to the domain to construct the url of this page.
     * @param string $state an ENUM descibing the current state of this page
     * @param string $subcategory Details the type of page this is. Should always be landing_page or site_page
     * @param string $templatePath string detailing the path of the template used for this page
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary page this object was translated from
     * @param array<string,array{
     *   id: int,
     *   archivedInDashboard: bool,
     *   authorName: string,
     *   campaign: string,
     *   created: string|\DateTimeInterface,
     *   name: string,
     *   password: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publishDate: string|\DateTimeInterface,
     *   slug: string,
     *   state: string,
     *   updated: string|\DateTimeInterface,
     *   tagIDs?: list<int>,
     * }|PagesContentLanguageVariation> $translations
     * @param string $updatedByID the ID of the user that updated this page
     * @param string $url a generated field representing the URL of this page
     * @param bool $useFeaturedImage boolean to determine if this page should use a featuredImage
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this page. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        string $id,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\AbStatus $abStatus,
        string $abTestID,
        string|\DateTimeInterface $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\CurrentState $currentState,
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
        string|\HubspotSDK\Cms\Pages\SitePages\SitePageUpdateDraftParams\Language $language,
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
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $slug,
        string $state,
        string $subcategory,
        string $templatePath,
        array $themeSettingsValues,
        string $translatedFromID,
        array $translations,
        string|\DateTimeInterface $updated,
        string $updatedByID,
        string $url,
        bool $useFeaturedImage,
        array $widgetContainers,
        array $widgets,
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

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateDraft($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Explicitly set new languages for each site page in a multi-language group.
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     *
     * @throws APIException
     */
    public function updateLanguages(
        array $languages,
        string $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['languages' => $languages, 'primaryID' => $primaryID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLanguages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
