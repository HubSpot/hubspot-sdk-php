<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Language;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Length;
use HubspotSDK\Cms\SiteSearch\SiteSearchSearchParams\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns any website content matching the given search criteria for a given HubSpot account. Searches can be filtered by content type, domain, or URL path.
 *
 * @see HubspotSDK\Services\Cms\SiteSearchService::search()
 *
 * @phpstan-type SiteSearchSearchParamsShape = array{
 *   autocomplete?: bool,
 *   boostLimit?: float,
 *   boostRecent?: string,
 *   domain?: list<string>,
 *   groupID?: list<int>,
 *   hubdbQuery?: string,
 *   language?: Language|value-of<Language>,
 *   length?: Length|value-of<Length>,
 *   limit?: int,
 *   matchPrefix?: bool,
 *   offset?: int,
 *   pathPrefix?: list<string>,
 *   popularityBoost?: float,
 *   property?: list<string>,
 *   q?: string,
 *   tableID?: int,
 *   type?: list<Type|value-of<Type>>,
 * }
 */
final class SiteSearchSearchParams implements BaseModel
{
    /** @use SdkModel<SiteSearchSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether or not you are showing autocomplete results. Defaults to false.
     */
    #[Optional]
    public ?bool $autocomplete;

    /**
     * Specifies the maximum amount a result will be boosted based on its view count. Defaults to 5.0. Read more about elasticsearch boosting [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-boost.html).
     */
    #[Optional]
    public ?float $boostLimit;

    /**
     * Specifies a relative time window where scores of documents published outside this time window decay. This can only be used for blog posts. For example, boostRecent=10d will boost documents published within the last 10 days. Supported timeunits are ms (milliseconds), s (seconds), m (minutes), h (hours), d (days).
     */
    #[Optional]
    public ?string $boostRecent;

    /**
     * A domain to match search results for. Multiple domains can be provided with &.
     *
     * @var list<string>|null $domain
     */
    #[Optional(list: 'string')]
    public ?array $domain;

    /**
     * Specifies which blog(s) to be searched by blog ID. Can be used multiple times to search more than one blog.
     *
     * @var list<int>|null $groupID
     */
    #[Optional(list: 'int')]
    public ?array $groupID;

    /**
     * Specify a HubDB query to further filter the search results.
     */
    #[Optional]
    public ?string $hubdbQuery;

    /**
     * Specifies the language of content to be searched. This value must be a valid [ISO 639-1 language code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) (e.g. `es` for Spanish).
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
     *
     * @var value-of<Length>|null $length
     */
    #[Optional(enum: Length::class)]
    public ?string $length;

    /**
     * Specifies the number of results to be returned in a single response. Defaults to `10`. Maximum value is `100`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Inverts the behavior of the pathPrefix filter when set to `false`. Defaults to `true`.
     */
    #[Optional]
    public ?bool $matchPrefix;

    /**
     * Used to page through the results. If there are more results than specified by the `limit` parameter, you will need to use the value of offset returned in the previous request to get the next set of results.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Specifies a path prefix to filter search results. Will only return results with URL paths that start with the specified parameter. Can be used multiple times.
     *
     * @var list<string>|null $pathPrefix
     */
    #[Optional(list: 'string')]
    public ?array $pathPrefix;

    /**
     * Specifies how strongly a result is boosted based on its view count. Defaults to 1.0.
     */
    #[Optional]
    public ?float $popularityBoost;

    /**
     * Specifies which properties to include in the search. Options include `title`, `description`, and `html`. All properties will be searched by default.
     *
     * @var list<string>|null $property
     */
    #[Optional(list: 'string')]
    public ?array $property;

    /**
     * The term to search for.
     */
    #[Optional]
    public ?string $q;

    /**
     * Specifies a specific HubDB table to search. Only returns results from the specified table. Can be used in tandem with the `hubdbQuery` parameter to further filter results.
     */
    #[Optional]
    public ?int $tableID;

    /**
     * Specifies the type of content to search. Can be one or more of SITE_PAGE, LANDING_PAGE, BLOG_POST, LISTING_PAGE, and KNOWLEDGE_ARTICLE. Defaults to all content types except LANDING_PAGE and KNOWLEDGE_ARTICLE.
     *
     * @var list<value-of<Type>>|null $type
     */
    #[Optional(list: Type::class)]
    public ?array $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $domain
     * @param list<int> $groupID
     * @param Language|value-of<Language> $language
     * @param Length|value-of<Length> $length
     * @param list<string> $pathPrefix
     * @param list<string> $property
     * @param list<Type|value-of<Type>> $type
     */
    public static function with(
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
    ): self {
        $obj = new self;

        null !== $autocomplete && $obj['autocomplete'] = $autocomplete;
        null !== $boostLimit && $obj['boostLimit'] = $boostLimit;
        null !== $boostRecent && $obj['boostRecent'] = $boostRecent;
        null !== $domain && $obj['domain'] = $domain;
        null !== $groupID && $obj['groupID'] = $groupID;
        null !== $hubdbQuery && $obj['hubdbQuery'] = $hubdbQuery;
        null !== $language && $obj['language'] = $language;
        null !== $length && $obj['length'] = $length;
        null !== $limit && $obj['limit'] = $limit;
        null !== $matchPrefix && $obj['matchPrefix'] = $matchPrefix;
        null !== $offset && $obj['offset'] = $offset;
        null !== $pathPrefix && $obj['pathPrefix'] = $pathPrefix;
        null !== $popularityBoost && $obj['popularityBoost'] = $popularityBoost;
        null !== $property && $obj['property'] = $property;
        null !== $q && $obj['q'] = $q;
        null !== $tableID && $obj['tableID'] = $tableID;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Specifies whether or not you are showing autocomplete results. Defaults to false.
     */
    public function withAutocomplete(bool $autocomplete): self
    {
        $obj = clone $this;
        $obj['autocomplete'] = $autocomplete;

        return $obj;
    }

    /**
     * Specifies the maximum amount a result will be boosted based on its view count. Defaults to 5.0. Read more about elasticsearch boosting [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-boost.html).
     */
    public function withBoostLimit(float $boostLimit): self
    {
        $obj = clone $this;
        $obj['boostLimit'] = $boostLimit;

        return $obj;
    }

    /**
     * Specifies a relative time window where scores of documents published outside this time window decay. This can only be used for blog posts. For example, boostRecent=10d will boost documents published within the last 10 days. Supported timeunits are ms (milliseconds), s (seconds), m (minutes), h (hours), d (days).
     */
    public function withBoostRecent(string $boostRecent): self
    {
        $obj = clone $this;
        $obj['boostRecent'] = $boostRecent;

        return $obj;
    }

    /**
     * A domain to match search results for. Multiple domains can be provided with &.
     *
     * @param list<string> $domain
     */
    public function withDomain(array $domain): self
    {
        $obj = clone $this;
        $obj['domain'] = $domain;

        return $obj;
    }

    /**
     * Specifies which blog(s) to be searched by blog ID. Can be used multiple times to search more than one blog.
     *
     * @param list<int> $groupID
     */
    public function withGroupID(array $groupID): self
    {
        $obj = clone $this;
        $obj['groupID'] = $groupID;

        return $obj;
    }

    /**
     * Specify a HubDB query to further filter the search results.
     */
    public function withHubdbQuery(string $hubdbQuery): self
    {
        $obj = clone $this;
        $obj['hubdbQuery'] = $hubdbQuery;

        return $obj;
    }

    /**
     * Specifies the language of content to be searched. This value must be a valid [ISO 639-1 language code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) (e.g. `es` for Spanish).
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
     *
     * @param Length|value-of<Length> $length
     */
    public function withLength(Length|string $length): self
    {
        $obj = clone $this;
        $obj['length'] = $length;

        return $obj;
    }

    /**
     * Specifies the number of results to be returned in a single response. Defaults to `10`. Maximum value is `100`.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Inverts the behavior of the pathPrefix filter when set to `false`. Defaults to `true`.
     */
    public function withMatchPrefix(bool $matchPrefix): self
    {
        $obj = clone $this;
        $obj['matchPrefix'] = $matchPrefix;

        return $obj;
    }

    /**
     * Used to page through the results. If there are more results than specified by the `limit` parameter, you will need to use the value of offset returned in the previous request to get the next set of results.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * Specifies a path prefix to filter search results. Will only return results with URL paths that start with the specified parameter. Can be used multiple times.
     *
     * @param list<string> $pathPrefix
     */
    public function withPathPrefix(array $pathPrefix): self
    {
        $obj = clone $this;
        $obj['pathPrefix'] = $pathPrefix;

        return $obj;
    }

    /**
     * Specifies how strongly a result is boosted based on its view count. Defaults to 1.0.
     */
    public function withPopularityBoost(float $popularityBoost): self
    {
        $obj = clone $this;
        $obj['popularityBoost'] = $popularityBoost;

        return $obj;
    }

    /**
     * Specifies which properties to include in the search. Options include `title`, `description`, and `html`. All properties will be searched by default.
     *
     * @param list<string> $property
     */
    public function withProperty(array $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }

    /**
     * The term to search for.
     */
    public function withQ(string $q): self
    {
        $obj = clone $this;
        $obj['q'] = $q;

        return $obj;
    }

    /**
     * Specifies a specific HubDB table to search. Only returns results from the specified table. Can be used in tandem with the `hubdbQuery` parameter to further filter results.
     */
    public function withTableID(int $tableID): self
    {
        $obj = clone $this;
        $obj['tableID'] = $tableID;

        return $obj;
    }

    /**
     * Specifies the type of content to search. Can be one or more of SITE_PAGE, LANDING_PAGE, BLOG_POST, LISTING_PAGE, and KNOWLEDGE_ARTICLE. Defaults to all content types except LANDING_PAGE and KNOWLEDGE_ARTICLE.
     *
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
