<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Angle;
use HubspotSDK\Cms\BackgroundImage;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\AbStatus;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\ContentTypeCategory;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\CurrentState;
use HubspotSDK\Cms\Blogs\Posts\PostCreateParams\Language;
use HubspotSDK\Cms\Blogs\Posts\VersionBlogPost;
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
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubspotSDK\Services\Cms\Blogs\Posts\BatchService;

final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public PostsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Create a new blog post, specifying its content in the request body.
     *
     * @param string $id the unique ID of the blog post
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|AbStatus $abStatus
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|ContentTypeCategory $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param string $createdByID the ID of the user that created the post
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|CurrentState $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Language $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,array{
     *   cells: list<LayoutSection>,
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
     *   rows: list<array<string,LayoutSection>>,
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
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param string|\DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an enumeration describing the current publish state of the post
     * @param list<int> $tagIDs the IDs of the tags associated with this post
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
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
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string|AbStatus $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|CurrentState $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        string|Language $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
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
    ): BlogPost {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'abStatus' => $abStatus,
                'abTestID' => $abTestID,
                'archivedAt' => $archivedAt,
                'archivedInDashboard' => $archivedInDashboard,
                'attachedStylesheets' => $attachedStylesheets,
                'authorName' => $authorName,
                'blogAuthorID' => $blogAuthorID,
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
                'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
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
                'password' => $password,
                'postBody' => $postBody,
                'postSummary' => $postSummary,
                'publicAccessRules' => $publicAccessRules,
                'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
                'publishDate' => $publishDate,
                'publishImmediately' => $publishImmediately,
                'rssBody' => $rssBody,
                'rssSummary' => $rssSummary,
                'slug' => $slug,
                'state' => $state,
                'tagIDs' => $tagIDs,
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
     * Partially updates a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $objectID path param: The ID of the blog post to update
     * @param string $id body param: The unique ID of the blog post
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus $abStatus Body param:
     * @param string $abTestID Body param:
     * @param int $archivedAt body param: The timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard body param: If True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets Body param: List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName body param: The name of the blog author associated with the post
     * @param string $blogAuthorID body param: The ID of the blog author associated with this post
     * @param string $campaign body param: The GUID of the marketing campaign the post is associated with
     * @param int $categoryID body param: ID of the object type
     * @param string $contentGroupID body param: The ID of the post's parent blog
     * @param '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory $contentTypeCategory Body param: An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param string|\DateTimeInterface $created Body param:
     * @param string $createdByID body param: The ID of the user that created the post
     * @param bool $currentlyPublished Body param:
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState $currentState Body param: A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain Body param: The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageDataSourceID Body param:
     * @param int $dynamicPageDataSourceType Body param:
     * @param string $dynamicPageHubDBTableID body param: For dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride body param: Boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets body param: Boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage body param: The featuredImage of this Blog Post
     * @param string $featuredImageAltText body param: Alt Text of the featuredImage
     * @param string $folderID Body param:
     * @param string $footerHTML body param: Custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Body param: Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle body param: The HTML title of the post
     * @param bool $includeDefaultCustomCss body param: Boolean to determine whether or not the Primary CSS Files should be applied
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language $language Body param: The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,array{
     *   cells: list<LayoutSection>,
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
     *   rows: list<array<string,LayoutSection>>,
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
     * @param string $mabExperimentID Body param:
     * @param string $metaDescription body param: A description that goes in <meta> tag on the page
     * @param string $name body param: The internal name of the post
     * @param int $pageExpiryDate Body param:
     * @param bool $pageExpiryEnabled Body param:
     * @param int $pageExpiryRedirectID Body param:
     * @param string $pageExpiryRedirectURL Body param:
     * @param string $password Body param: Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody body param: The HTML of the main post body
     * @param string $postSummary body param: The summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules body param: Rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled body param: Boolean to determine whether or not to respect publicAccessRules
     * @param string|\DateTimeInterface $publishDate body param: The date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately body param: Set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody body param: The contents of the RSS body for this Blog Post
     * @param string $rssSummary body param: The contents of the RSS summary for this Blog Post
     * @param string $slug Body param: The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state body param: An enumeration describing the current publish state of the post
     * @param list<int> $tagIDs body param: The IDs of the tags associated with this post
     * @param array<string,mixed> $themeSettingsValues Body param:
     * @param string $translatedFromID body param: ID of the primary blog post that this post was translated from
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
     * @param string $updatedByID body param: The ID of the user that updated the post
     * @param string $url body param: A generated field representing the URL of this blog post
     * @param bool $useFeaturedImage body param: Boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers Body param: A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets body param: A data structure containing the data for all the modules for this page
     * @param bool $archived Query param: Specifies whether to update deleted blog posts. Defaults to `false`.
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        string $id,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\AbStatus $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\CurrentState $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateParams\Language $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
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
    ): BlogPost {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'abStatus' => $abStatus,
                'abTestID' => $abTestID,
                'archivedAt' => $archivedAt,
                'archivedInDashboard' => $archivedInDashboard,
                'attachedStylesheets' => $attachedStylesheets,
                'authorName' => $authorName,
                'blogAuthorID' => $blogAuthorID,
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
                'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
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
                'password' => $password,
                'postBody' => $postBody,
                'postSummary' => $postSummary,
                'publicAccessRules' => $publicAccessRules,
                'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
                'publishDate' => $publishDate,
                'publishImmediately' => $publishImmediately,
                'rssBody' => $rssBody,
                'rssSummary' => $rssSummary,
                'slug' => $slug,
                'state' => $state,
                'tagIDs' => $tagIDs,
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
     * Retrieve all blog posts, with paging and filtering options. This method would be useful for an integration that ingests posts and suggests edits.
     *
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived Specifies whether to return deleted blog posts. Defaults to `false`.
     * @param string|\DateTimeInterface $createdAfter only return blog posts created after the specified time
     * @param string|\DateTimeInterface $createdAt only return blog posts created at exactly the specified time
     * @param string|\DateTimeInterface $createdBefore only return blog posts created before the specified time
     * @param int $limit The maximum number of results to return. Default is 20.
     * @param list<string> $sort Specifies which fields to use for sorting results. Valid fields are `createdAt` (default), `name`, `updatedAt`, `createdBy`, `updatedBy`.
     * @param string|\DateTimeInterface $updatedAfter only return blog posts last updated after the specified time
     * @param string|\DateTimeInterface $updatedAt only return blog posts last updated at exactly the specified time
     * @param string|\DateTimeInterface $updatedBefore only return blog posts last updated before the specified time
     *
     * @return Page<BlogPost>
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
     * Delete a blog post by ID.
     *
     * @param string $objectID the ID of the blog post to delete
     * @param bool $archived whether to return only results that have been deleted
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['archived' => $archived]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Attach a blog post to a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
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
        $params = Util::removeNulls(
            [
                'id' => $id,
                'language' => $language,
                'primaryID' => $primaryID,
                'primaryLanguage' => $primaryLanguage,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->attachToLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clone a blog post, making a copy of it in a new blog post.
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
    ): BlogPost {
        $params = Util::removeNulls(['id' => $id, 'cloneName' => $cloneName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new language variation from an existing blog post
     *
     * @param string $id ID of blog post to clone
     * @param string $language target language of new variant
     *
     * @throws APIException
     */
    public function createLangVariation(
        string $id,
        ?string $language = null,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = Util::removeNulls(['id' => $id, 'language' => $language]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createLangVariation(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Detach a blog post from a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param string $id ID of the object to remove from a multi-language group
     *
     * @throws APIException
     */
    public function detachFromLangGroup(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->detachFromLangGroup(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a blog post by the post ID.
     *
     * @param string $objectID the ID of the blog post to retrieve
     * @param bool $archived Specifies whether to return deleted blog posts. Defaults to `false`.
     * @param string $property specific properties to return
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?bool $archived = null,
        ?string $property = null,
        ?RequestOptions $requestOptions = null,
    ): BlogPost {
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
     * Retrieve the full draft version of a blog post.
     *
     * @param string $objectID the ID of the blog post to retrieve the draft of
     *
     * @throws APIException
     */
    public function getDraftByID(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getDraftByID($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a previous version of a blog post.
     *
     * @param string $revisionID the ID of the version to retrieve
     * @param string $objectID the ID of the blog post
     *
     * @throws APIException
     */
    public function getPreviousVersion(
        string $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): VersionBlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all the previous versions of a blog post.
     *
     * @param string $objectID the ID of the blog post to retrieve previous versions of
     * @param string $after The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit The maximum number of results to return. Default is 100.
     *
     * @return Page<VersionBlogPost>
     *
     * @throws APIException
     */
    public function getPreviousVersions(
        string $objectID,
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            ['after' => $after, 'before' => $before, 'limit' => $limit]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPreviousVersions($objectID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Publish the draft version of the blog post, sending its content to the live page.
     *
     * @param string $objectID the ID of the post to publish
     *
     * @throws APIException
     */
    public function pushLive(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pushLive($objectID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Discard all drafted content, resetting the draft to contain the content in the currently published version.
     *
     * @param string $objectID the ID of the blog post to reset
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
     * Restores a blog post to one of its previous versions.
     *
     * @param string $revisionID the ID of the version to restore the blog post to
     * @param string $objectID the ID of the blog post
     *
     * @throws APIException
     */
    public function restorePreviousVersion(
        string $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersion($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
     *
     * @param int $revisionID the ID of the version to restore the blog post to
     * @param string $objectID the ID of the blog post
     *
     * @throws APIException
     */
    public function restorePreviousVersionToDraft(
        int $revisionID,
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BlogPost {
        $params = Util::removeNulls(['objectID' => $objectID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->restorePreviousVersionToDraft($revisionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Schedule a blog post to be published at a specified time.
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
        $params = Util::removeNulls(['id' => $id, 'publishDate' => $publishDate]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->schedule(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the primary language of a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content) to the language of the provided post (specified as an ID in the request body)
     *
     * @param string $id ID of object to set as primary in multi-language group
     *
     * @throws APIException
     */
    public function setLangPrimary(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setLangPrimary(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially updates the draft version of a single blog post by ID. You only need to specify the values that you want to update.
     *
     * @param string $objectID the ID of the blog post to update the draft of
     * @param string $id the unique ID of the blog post
     * @param 'automated_loser_variant'|'automated_master'|'automated_variant'|'loser_variant'|'mab_master'|'mab_variant'|'master'|'variant'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus $abStatus
     * @param int $archivedAt the timestamp (ISO8601 format) when this Blog Post was deleted
     * @param bool $archivedInDashboard if True, the post will not show up in your dashboard, although the post could still be live
     * @param list<array<string,mixed>> $attachedStylesheets List of stylesheets to attach to this blog post. These stylesheets are attached to just this page. Order of precedence is bottom to top, just like in the HTML.
     * @param string $authorName the name of the blog author associated with the post
     * @param string $blogAuthorID the ID of the blog author associated with this post
     * @param string $campaign the GUID of the marketing campaign the post is associated with
     * @param int $categoryID ID of the object type
     * @param string $contentGroupID the ID of the post's parent blog
     * @param '0'|'1'|'10'|'11'|'12'|'13'|'14'|'15'|'2'|'3'|'4'|'5'|'6'|'7'|'8'|'9'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory $contentTypeCategory An ENUM descibing the type of this object. Should always be BLOG_POST.
     * @param string $createdByID the ID of the user that created the post
     * @param 'AUTOMATED'|'AUTOMATED_AB'|'AUTOMATED_AB_VARIANT'|'AUTOMATED_DRAFT'|'AUTOMATED_DRAFT_AB'|'AUTOMATED_DRAFT_ABVARIANT'|'AUTOMATED_FOR_FORM'|'AUTOMATED_FOR_FORM_BUFFER'|'AUTOMATED_FOR_FORM_DRAFT'|'AUTOMATED_FOR_FORM_LEGACY'|'AUTOMATED_LOSER_ABVARIANT'|'AUTOMATED_SENDING'|'BLOG_EMAIL_DRAFT'|'BLOG_EMAIL_PUBLISHED'|'DRAFT'|'DRAFT_AB'|'DRAFT_AB_VARIANT'|'ERROR'|'LOSER_AB_VARIANT'|'PAGE_STUB'|'PRE_PROCESSING'|'PROCESSING'|'PUBLISHED'|'PUBLISHED_AB'|'PUBLISHED_AB_VARIANT'|'PUBLISHED_OR_SCHEDULED'|'RSS_TO_EMAIL_DRAFT'|'RSS_TO_EMAIL_PUBLISHED'|'SCHEDULED'|'SCHEDULED_AB'|'SCHEDULED_OR_PUBLISHED'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState $currentState A generated ENUM descibing the current state of this Blog Post. Should always match state.
     * @param string $domain The domain that the post lives on. If null, the post will default to the domain of the parent blog.
     * @param string $dynamicPageHubDBTableID for dynamic HubDB pages,
     * the ID of the HubDB table this post references
     * @param bool $enableDomainStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param bool $enableGoogleAmpOutputOverride boolean to allow overriding the AMP settings for the blog
     * @param bool $enableLayoutStylesheets boolean to determine whether or not the styles from the template should be applied
     * @param string $featuredImage the featuredImage of this Blog Post
     * @param string $featuredImageAltText alt Text of the featuredImage
     * @param string $footerHTML custom HTML for embed codes, javascript that should be placed before the </body> tag of the page
     * @param string $headHTML Custom HTML for embed codes, javascript, etc. that goes in the <head> tag of the page.
     * @param string $htmlTitle the HTML title of the post
     * @param bool $includeDefaultCustomCss boolean to determine whether or not the Primary CSS Files should be applied
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-ee'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-fr'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language $language The explicitly defined ISO 639 language code of the post. If null, the post will default to the language of the parent blog.
     * @param array<string,array{
     *   cells: list<LayoutSection>,
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
     *   rows: list<array<string,LayoutSection>>,
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
     * @param string $metaDescription a description that goes in <meta> tag on the page
     * @param string $name the internal name of the post
     * @param string $password Set this to create a password protected page. Entering the password will be required to view the page.
     * @param string $postBody the HTML of the main post body
     * @param string $postSummary the summary of the blog post that will appear on the main listing page
     * @param list<mixed> $publicAccessRules rules for require member registration to access private content
     * @param bool $publicAccessRulesEnabled boolean to determine whether or not to respect publicAccessRules
     * @param string|\DateTimeInterface $publishDate the date (ISO8601 format) the blog post is to be published at
     * @param bool $publishImmediately set this to true if you want to be published immediately when the schedule publish endpoint is called, and to ignore the publish_date setting
     * @param string $rssBody the contents of the RSS body for this Blog Post
     * @param string $rssSummary the contents of the RSS summary for this Blog Post
     * @param string $slug The URL slug of the blog post. This field is appended to the domain to construct the url of this post.
     * @param string $state an enumeration describing the current publish state of the post
     * @param list<int> $tagIDs the IDs of the tags associated with this post
     * @param array<string,mixed> $themeSettingsValues
     * @param string $translatedFromID ID of the primary blog post that this post was translated from
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
     * @param string $updatedByID the ID of the user that updated the post
     * @param string $url a generated field representing the URL of this blog post
     * @param bool $useFeaturedImage boolean to determine if this post should use a featured image
     * @param array<string,mixed> $widgetContainers A data structure containing the data for all the modules inside the containers for this post. This will only be populated if the page has widget containers.
     * @param array<string,mixed> $widgets a data structure containing the data for all the modules for this page
     *
     * @throws APIException
     */
    public function updateDraft(
        string $objectID,
        string $id,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\AbStatus $abStatus,
        string $abTestID,
        int $archivedAt,
        bool $archivedInDashboard,
        array $attachedStylesheets,
        string $authorName,
        string $blogAuthorID,
        string $campaign,
        int $categoryID,
        string $contentGroupID,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\ContentTypeCategory $contentTypeCategory,
        string|\DateTimeInterface $created,
        string $createdByID,
        bool $currentlyPublished,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\CurrentState $currentState,
        string $domain,
        string $dynamicPageDataSourceID,
        int $dynamicPageDataSourceType,
        string $dynamicPageHubDBTableID,
        bool $enableDomainStylesheets,
        bool $enableGoogleAmpOutputOverride,
        bool $enableLayoutStylesheets,
        string $featuredImage,
        string $featuredImageAltText,
        string $folderID,
        string $footerHTML,
        string $headHTML,
        string $htmlTitle,
        bool $includeDefaultCustomCss,
        string|\HubspotSDK\Cms\Blogs\Posts\PostUpdateDraftParams\Language $language,
        array $layoutSections,
        string $linkRelCanonicalURL,
        string $mabExperimentID,
        string $metaDescription,
        string $name,
        int $pageExpiryDate,
        bool $pageExpiryEnabled,
        int $pageExpiryRedirectID,
        string $pageExpiryRedirectURL,
        string $password,
        string $postBody,
        string $postSummary,
        array $publicAccessRules,
        bool $publicAccessRulesEnabled,
        string|\DateTimeInterface $publishDate,
        bool $publishImmediately,
        string $rssBody,
        string $rssSummary,
        string $slug,
        string $state,
        array $tagIDs,
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
    ): BlogPost {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'abStatus' => $abStatus,
                'abTestID' => $abTestID,
                'archivedAt' => $archivedAt,
                'archivedInDashboard' => $archivedInDashboard,
                'attachedStylesheets' => $attachedStylesheets,
                'authorName' => $authorName,
                'blogAuthorID' => $blogAuthorID,
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
                'enableGoogleAmpOutputOverride' => $enableGoogleAmpOutputOverride,
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
                'password' => $password,
                'postBody' => $postBody,
                'postSummary' => $postSummary,
                'publicAccessRules' => $publicAccessRules,
                'publicAccessRulesEnabled' => $publicAccessRulesEnabled,
                'publishDate' => $publishDate,
                'publishImmediately' => $publishImmediately,
                'rssBody' => $rssBody,
                'rssSummary' => $rssSummary,
                'slug' => $slug,
                'state' => $state,
                'tagIDs' => $tagIDs,
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

    /**
     * @api
     *
     * Explicitly set new languages for each post in a [multi-language group](https://developers.hubspot.com/docs/guides/cms/content/multi-language-content).
     *
     * @param array<string,string> $languages map of object IDs to associated languages of object in the multi-language group
     * @param string $primaryID ID of the primary object in the multi-language group
     *
     * @throws APIException
     */
    public function updateLangs(
        array $languages,
        string $primaryID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(
            ['languages' => $languages, 'primaryID' => $primaryID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateLangs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
