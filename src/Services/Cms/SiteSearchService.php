<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\SiteSearch\IndexedData;
use HubspotSDK\Cms\SiteSearch\PublicSearchResults;
use HubspotSDK\Cms\SiteSearch\SiteSearchGetIndexedDataParams\Type;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SiteSearchContract;

final class SiteSearchService implements SiteSearchContract
{
    /**
     * @api
     */
    public SiteSearchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SiteSearchRawService($client);
    }

    /**
     * @api
     *
     * For a given account and document ID (page ID, blog post ID, HubDB row ID, etc.), return all indexed data for that document. This is useful when debugging why a particular document is not returned from a custom search.
     *
     * @param string $contentID ID of the target document when searching for indexed properties
     * @param 'BLOG_POST'|'KNOWLEDGE_ARTICLE'|'LANDING_PAGE'|'LISTING_PAGE'|'SITE_PAGE'|Type $type The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        string|Type|null $type = null,
        ?RequestOptions $requestOptions = null,
    ): IndexedData {
        $params = ['type' => $type];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getIndexedData($contentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns any website content matching the given search criteria for a given HubSpot account. Searches can be filtered by content type, domain, or URL path.
     *
     * @param bool $autocomplete Specifies whether or not you are showing autocomplete results. Defaults to false.
     * @param float $boostLimit Specifies the maximum amount a result will be boosted based on its view count. Defaults to 5.0. Read more about elasticsearch boosting [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-boost.html).
     * @param string $boostRecent Specifies a relative time window where scores of documents published outside this time window decay. This can only be used for blog posts. For example, boostRecent=10d will boost documents published within the last 10 days. Supported timeunits are ms (milliseconds), s (seconds), m (minutes), h (hours), d (days).
     * @param list<string> $domain A domain to match search results for. Multiple domains can be provided with &.
     * @param list<int> $groupID Specifies which blog(s) to be searched by blog ID. Can be used multiple times to search more than one blog.
     * @param string $hubdbQuery specify a HubDB query to further filter the search results
     * @param 'af'|'af-na'|'af-za'|'agq'|'agq-cm'|'ak'|'ak-gh'|'am'|'am-et'|'ar'|'ar-001'|'ar-ae'|'ar-bh'|'ar-dj'|'ar-dz'|'ar-eg'|'ar-eh'|'ar-er'|'ar-il'|'ar-iq'|'ar-jo'|'ar-km'|'ar-kw'|'ar-lb'|'ar-ly'|'ar-ma'|'ar-mr'|'ar-om'|'ar-ps'|'ar-qa'|'ar-sa'|'ar-sd'|'ar-so'|'ar-ss'|'ar-sy'|'ar-td'|'ar-tn'|'ar-ye'|'as'|'as-in'|'asa'|'asa-tz'|'ast'|'ast-es'|'az'|'az-az'|'bas'|'bas-cm'|'be'|'be-by'|'bem'|'bem-zm'|'bez'|'bez-tz'|'bg'|'bg-bg'|'bm'|'bm-ml'|'bn'|'bn-bd'|'bn-in'|'bo'|'bo-cn'|'bo-in'|'br'|'br-fr'|'brx'|'brx-in'|'bs'|'bs-ba'|'ca'|'ca-ad'|'ca-es'|'ca-fr'|'ca-it'|'ccp'|'ccp-bd'|'ccp-in'|'ce'|'ce-ru'|'ceb'|'ceb-ph'|'cgg'|'cgg-ug'|'chr'|'chr-us'|'ckb'|'ckb-iq'|'ckb-ir'|'cs'|'cs-cz'|'cu'|'cu-ru'|'cy'|'cy-gb'|'da'|'da-dk'|'da-gl'|'dav'|'dav-ke'|'de'|'de-at'|'de-be'|'de-ch'|'de-de'|'de-gr'|'de-it'|'de-li'|'de-lu'|'dje'|'dje-ne'|'doi'|'doi-in'|'dsb'|'dsb-de'|'dua'|'dua-cm'|'dyo'|'dyo-sn'|'dz'|'dz-bt'|'ebu'|'ebu-ke'|'ee'|'ee-gh'|'ee-tg'|'el'|'el-cy'|'el-gr'|'en'|'en-001'|'en-150'|'en-ae'|'en-ag'|'en-ai'|'en-as'|'en-at'|'en-au'|'en-bb'|'en-be'|'en-bi'|'en-bm'|'en-bs'|'en-bw'|'en-bz'|'en-ca'|'en-cc'|'en-ch'|'en-ck'|'en-cm'|'en-cn'|'en-cx'|'en-cy'|'en-de'|'en-dg'|'en-dk'|'en-dm'|'en-er'|'en-fi'|'en-fj'|'en-fk'|'en-fm'|'en-gb'|'en-gd'|'en-gg'|'en-gh'|'en-gi'|'en-gm'|'en-gu'|'en-gy'|'en-hk'|'en-ie'|'en-il'|'en-im'|'en-in'|'en-io'|'en-je'|'en-jm'|'en-ke'|'en-ki'|'en-kn'|'en-ky'|'en-lc'|'en-lr'|'en-ls'|'en-lu'|'en-mg'|'en-mh'|'en-mo'|'en-mp'|'en-ms'|'en-mt'|'en-mu'|'en-mw'|'en-mx'|'en-my'|'en-na'|'en-nf'|'en-ng'|'en-nl'|'en-nr'|'en-nu'|'en-nz'|'en-pg'|'en-ph'|'en-pk'|'en-pn'|'en-pr'|'en-pw'|'en-rw'|'en-sb'|'en-sc'|'en-sd'|'en-se'|'en-sg'|'en-sh'|'en-si'|'en-sl'|'en-ss'|'en-sx'|'en-sz'|'en-tc'|'en-tk'|'en-to'|'en-tt'|'en-tv'|'en-tz'|'en-ug'|'en-um'|'en-us'|'en-vc'|'en-vg'|'en-vi'|'en-vu'|'en-ws'|'en-za'|'en-zm'|'en-zw'|'eo'|'eo-001'|'es'|'es-419'|'es-ar'|'es-bo'|'es-br'|'es-bz'|'es-cl'|'es-co'|'es-cr'|'es-cu'|'es-do'|'es-ea'|'es-ec'|'es-es'|'es-gq'|'es-gt'|'es-hn'|'es-ic'|'es-mx'|'es-ni'|'es-pa'|'es-pe'|'es-ph'|'es-pr'|'es-py'|'es-sv'|'es-us'|'es-uy'|'es-ve'|'et'|'et-ee'|'eu'|'eu-es'|'ewo'|'ewo-cm'|'fa'|'fa-af'|'fa-ir'|'ff'|'ff-bf'|'ff-cm'|'ff-gh'|'ff-gm'|'ff-gn'|'ff-gw'|'ff-lr'|'ff-mr'|'ff-ne'|'ff-ng'|'ff-sl'|'ff-sn'|'fi'|'fi-fi'|'fil'|'fil-ph'|'fo'|'fo-dk'|'fo-fo'|'fr'|'fr-be'|'fr-bf'|'fr-bi'|'fr-bj'|'fr-bl'|'fr-ca'|'fr-cd'|'fr-cf'|'fr-cg'|'fr-ch'|'fr-ci'|'fr-cm'|'fr-dj'|'fr-dz'|'fr-fr'|'fr-ga'|'fr-gf'|'fr-gn'|'fr-gp'|'fr-gq'|'fr-ht'|'fr-km'|'fr-lu'|'fr-ma'|'fr-mc'|'fr-mf'|'fr-mg'|'fr-ml'|'fr-mq'|'fr-mr'|'fr-mu'|'fr-nc'|'fr-ne'|'fr-pf'|'fr-pm'|'fr-re'|'fr-rw'|'fr-sc'|'fr-sn'|'fr-sy'|'fr-td'|'fr-tg'|'fr-tn'|'fr-vu'|'fr-wf'|'fr-yt'|'fur'|'fur-it'|'fy'|'fy-nl'|'ga'|'ga-gb'|'ga-ie'|'gd'|'gd-gb'|'gl'|'gl-es'|'gsw'|'gsw-ch'|'gsw-fr'|'gsw-li'|'gu'|'gu-in'|'guz'|'guz-ke'|'gv'|'gv-im'|'ha'|'ha-gh'|'ha-ne'|'ha-ng'|'haw'|'haw-us'|'he'|'he-il'|'hi'|'hi-in'|'hr'|'hr-ba'|'hr-hr'|'hsb'|'hsb-de'|'hu'|'hu-hu'|'hy'|'hy-am'|'ia'|'ia-001'|'id'|'id-id'|'ig'|'ig-ng'|'ii'|'ii-cn'|'is'|'is-is'|'it'|'it-ch'|'it-it'|'it-sm'|'it-va'|'ja'|'ja-jp'|'jgo'|'jgo-cm'|'jmc'|'jmc-tz'|'jv'|'jv-id'|'ka'|'ka-ge'|'kab'|'kab-dz'|'kam'|'kam-ke'|'kde'|'kde-tz'|'kea'|'kea-cv'|'khq'|'khq-ml'|'ki'|'ki-ke'|'kk'|'kk-kz'|'kkj'|'kkj-cm'|'kl'|'kl-gl'|'kln'|'kln-ke'|'km'|'km-kh'|'kn'|'kn-in'|'ko'|'ko-kp'|'ko-kr'|'kok'|'kok-in'|'ks'|'ks-in'|'ksb'|'ksb-tz'|'ksf'|'ksf-cm'|'ksh'|'ksh-de'|'ku'|'ku-tr'|'kw'|'kw-gb'|'ky'|'ky-kg'|'lag'|'lag-tz'|'lb'|'lb-lu'|'lg'|'lg-ug'|'lkt'|'lkt-us'|'ln'|'ln-ao'|'ln-cd'|'ln-cf'|'ln-cg'|'lo'|'lo-la'|'lrc'|'lrc-iq'|'lrc-ir'|'lt'|'lt-lt'|'lu'|'lu-cd'|'luo'|'luo-ke'|'luy'|'luy-ke'|'lv'|'lv-lv'|'mai'|'mai-in'|'mas'|'mas-ke'|'mas-tz'|'mer'|'mer-ke'|'mfe'|'mfe-mu'|'mg'|'mg-mg'|'mgh'|'mgh-mz'|'mgo'|'mgo-cm'|'mi'|'mi-nz'|'mk'|'mk-mk'|'ml'|'ml-in'|'mn'|'mn-mn'|'mni'|'mni-in'|'mr'|'mr-in'|'ms'|'ms-bn'|'ms-id'|'ms-my'|'ms-sg'|'mt'|'mt-mt'|'mua'|'mua-cm'|'my'|'my-mm'|'mzn'|'mzn-ir'|'naq'|'naq-na'|'nb'|'nb-no'|'nb-sj'|'nd'|'nd-zw'|'nds'|'nds-de'|'nds-nl'|'ne'|'ne-in'|'ne-np'|'nl'|'nl-aw'|'nl-be'|'nl-bq'|'nl-ch'|'nl-cw'|'nl-lu'|'nl-nl'|'nl-sr'|'nl-sx'|'nmg'|'nmg-cm'|'nn'|'nn-no'|'nnh'|'nnh-cm'|'no'|'no-no'|'nus'|'nus-ss'|'nyn'|'nyn-ug'|'om'|'om-et'|'om-ke'|'or'|'or-in'|'os'|'os-ge'|'os-ru'|'pa'|'pa-in'|'pa-pk'|'pcm'|'pcm-ng'|'pl'|'pl-pl'|'prg'|'prg-001'|'ps'|'ps-af'|'ps-pk'|'pt'|'pt-ao'|'pt-br'|'pt-ch'|'pt-cv'|'pt-gq'|'pt-gw'|'pt-lu'|'pt-mo'|'pt-mz'|'pt-pt'|'pt-st'|'pt-tl'|'qu'|'qu-bo'|'qu-ec'|'qu-pe'|'rm'|'rm-ch'|'rn'|'rn-bi'|'ro'|'ro-md'|'ro-ro'|'rof'|'rof-tz'|'ru'|'ru-by'|'ru-kg'|'ru-kz'|'ru-md'|'ru-ru'|'ru-ua'|'rw'|'rw-rw'|'rwk'|'rwk-tz'|'sa'|'sa-in'|'sah'|'sah-ru'|'saq'|'saq-ke'|'sat'|'sat-in'|'sbp'|'sbp-tz'|'sd'|'sd-in'|'sd-pk'|'se'|'se-fi'|'se-no'|'se-se'|'seh'|'seh-mz'|'ses'|'ses-ml'|'sg'|'sg-cf'|'shi'|'shi-ma'|'si'|'si-lk'|'sk'|'sk-sk'|'sl'|'sl-si'|'smn'|'smn-fi'|'sn'|'sn-zw'|'so'|'so-dj'|'so-et'|'so-ke'|'so-so'|'sq'|'sq-al'|'sq-mk'|'sq-xk'|'sr'|'sr-ba'|'sr-cs'|'sr-me'|'sr-rs'|'sr-xk'|'su'|'su-id'|'sv'|'sv-ax'|'sv-fi'|'sv-se'|'sw'|'sw-cd'|'sw-ke'|'sw-tz'|'sw-ug'|'sy'|'ta'|'ta-in'|'ta-lk'|'ta-my'|'ta-sg'|'te'|'te-in'|'teo'|'teo-ke'|'teo-ug'|'tg'|'tg-tj'|'th'|'th-th'|'ti'|'ti-er'|'ti-et'|'tk'|'tk-tm'|'tl'|'to'|'to-to'|'tr'|'tr-cy'|'tr-tr'|'tt'|'tt-ru'|'twq'|'twq-ne'|'tzm'|'tzm-ma'|'ug'|'ug-cn'|'uk'|'uk-ua'|'ur'|'ur-in'|'ur-pk'|'uz'|'uz-af'|'uz-uz'|'vai'|'vai-lr'|'vi'|'vi-vn'|'vo'|'vo-001'|'vun'|'vun-tz'|'wae'|'wae-ch'|'wo'|'wo-sn'|'xh'|'xh-za'|'xog'|'xog-ug'|'yav'|'yav-cm'|'yi'|'yi-001'|'yo'|'yo-bj'|'yo-ng'|'yue'|'yue-cn'|'yue-hk'|'zgh'|'zgh-ma'|'zh'|'zh-cn'|'zh-hans'|'zh-hant'|'zh-hk'|'zh-mo'|'zh-sg'|'zh-tw'|'zu'|'zu-za'|Language $language Specifies the language of content to be searched. This value must be a valid [ISO 639-1 language code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) (e.g. `es` for Spanish)
     * @param 'LONG'|'SHORT'|Length $length Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
     * @param int $limit Specifies the number of results to be returned in a single response. Defaults to `10`. Maximum value is `100`.
     * @param bool $matchPrefix Inverts the behavior of the pathPrefix filter when set to `false`. Defaults to `true`.
     * @param int $offset Used to page through the results. If there are more results than specified by the `limit` parameter, you will need to use the value of offset returned in the previous request to get the next set of results.
     * @param list<string> $pathPrefix Specifies a path prefix to filter search results. Will only return results with URL paths that start with the specified parameter. Can be used multiple times.
     * @param float $popularityBoost Specifies how strongly a result is boosted based on its view count. Defaults to 1.0.
     * @param list<string> $property Specifies which properties to include in the search. Options include `title`, `description`, and `html`. All properties will be searched by default.
     * @param string $q the term to search for
     * @param int $tableID Specifies a specific HubDB table to search. Only returns results from the specified table. Can be used in tandem with the `hubdbQuery` parameter to further filter results.
     * @param list<'LANDING_PAGE'|'BLOG_POST'|'SITE_PAGE'|'KNOWLEDGE_ARTICLE'|'LISTING_PAGE'|\HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type> $type Specifies the type of content to search. Can be one or more of SITE_PAGE, LANDING_PAGE, BLOG_POST, LISTING_PAGE, and KNOWLEDGE_ARTICLE. Defaults to all content types except LANDING_PAGE and KNOWLEDGE_ARTICLE
     *
     * @throws APIException
     */
    public function search(
        ?bool $autocomplete = null,
        ?float $boostLimit = null,
        ?string $boostRecent = null,
        ?array $domain = null,
        ?array $groupID = null,
        ?string $hubdbQuery = null,
        string|Language|null $language = null,
        string|Length|null $length = null,
        ?int $limit = null,
        ?bool $matchPrefix = null,
        ?int $offset = null,
        ?array $pathPrefix = null,
        ?float $popularityBoost = null,
        ?array $property = null,
        ?string $q = null,
        ?int $tableID = null,
        ?array $type = null,
        ?RequestOptions $requestOptions = null,
    ): PublicSearchResults {
        $params = [
            'autocomplete' => $autocomplete,
            'boostLimit' => $boostLimit,
            'boostRecent' => $boostRecent,
            'domain' => $domain,
            'groupID' => $groupID,
            'hubdbQuery' => $hubdbQuery,
            'language' => $language,
            'length' => $length,
            'limit' => $limit,
            'matchPrefix' => $matchPrefix,
            'offset' => $offset,
            'pathPrefix' => $pathPrefix,
            'popularityBoost' => $popularityBoost,
            'property' => $property,
            'q' => $q,
            'tableID' => $tableID,
            'type' => $type,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
