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
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SiteSearchContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * @param Type|value-of<Type> $type The type of document. Can be one of `SITE_PAGE`, `BLOG_POST`, or `KNOWLEDGE_ARTICLE`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getIndexedData(
        string $contentID,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): IndexedData {
        $params = Util::removeNulls(['type' => $type]);

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
     * @param Language|value-of<Language> $language Specifies the language of content to be searched. This value must be a valid [ISO 639-1 language code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) (e.g. `es` for Spanish)
     * @param Length|value-of<Length> $length Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
     * @param int $limit Specifies the number of results to be returned in a single response. Defaults to `10`. Maximum value is `100`.
     * @param bool $matchPrefix Inverts the behavior of the pathPrefix filter when set to `false`. Defaults to `true`.
     * @param int $offset Used to page through the results. If there are more results than specified by the `limit` parameter, you will need to use the value of offset returned in the previous request to get the next set of results.
     * @param list<string> $pathPrefix Specifies a path prefix to filter search results. Will only return results with URL paths that start with the specified parameter. Can be used multiple times.
     * @param float $popularityBoost Specifies how strongly a result is boosted based on its view count. Defaults to 1.0.
     * @param list<string> $property Specifies which properties to include in the search. Options include `title`, `description`, and `html`. All properties will be searched by default.
     * @param string $q the term to search for
     * @param int $tableID Specifies a specific HubDB table to search. Only returns results from the specified table. Can be used in tandem with the `hubdbQuery` parameter to further filter results.
     * @param list<\HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type|value-of<\HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type>> $type Specifies the type of content to search. Can be one or more of SITE_PAGE, LANDING_PAGE, BLOG_POST, LISTING_PAGE, and KNOWLEDGE_ARTICLE. Defaults to all content types except LANDING_PAGE and KNOWLEDGE_ARTICLE
     * @param RequestOpts|null $requestOptions
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
        Language|string|null $language = null,
        Length|string|null $length = null,
        ?int $limit = null,
        ?bool $matchPrefix = null,
        ?int $offset = null,
        ?array $pathPrefix = null,
        ?float $popularityBoost = null,
        ?array $property = null,
        ?string $q = null,
        ?int $tableID = null,
        ?array $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicSearchResults {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
