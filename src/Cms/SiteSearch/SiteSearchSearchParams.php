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
 *   autocomplete?: bool|null,
 *   boostLimit?: float|null,
 *   boostRecent?: string|null,
 *   domain?: list<string>|null,
 *   groupID?: list<int>|null,
 *   hubdbQuery?: string|null,
 *   language?: null|Language|value-of<Language>,
 *   length?: null|Length|value-of<Length>,
 *   limit?: int|null,
 *   matchPrefix?: bool|null,
 *   offset?: int|null,
 *   pathPrefix?: list<string>|null,
 *   popularityBoost?: float|null,
 *   property?: list<string>|null,
 *   q?: string|null,
 *   tableID?: int|null,
 *   type?: list<Type|value-of<Type>>|null,
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
     * @param list<string>|null $domain
     * @param list<int>|null $groupID
     * @param Language|value-of<Language>|null $language
     * @param Length|value-of<Length>|null $length
     * @param list<string>|null $pathPrefix
     * @param list<string>|null $property
     * @param list<Type|value-of<Type>>|null $type
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
        $self = new self;

        null !== $autocomplete && $self['autocomplete'] = $autocomplete;
        null !== $boostLimit && $self['boostLimit'] = $boostLimit;
        null !== $boostRecent && $self['boostRecent'] = $boostRecent;
        null !== $domain && $self['domain'] = $domain;
        null !== $groupID && $self['groupID'] = $groupID;
        null !== $hubdbQuery && $self['hubdbQuery'] = $hubdbQuery;
        null !== $language && $self['language'] = $language;
        null !== $length && $self['length'] = $length;
        null !== $limit && $self['limit'] = $limit;
        null !== $matchPrefix && $self['matchPrefix'] = $matchPrefix;
        null !== $offset && $self['offset'] = $offset;
        null !== $pathPrefix && $self['pathPrefix'] = $pathPrefix;
        null !== $popularityBoost && $self['popularityBoost'] = $popularityBoost;
        null !== $property && $self['property'] = $property;
        null !== $q && $self['q'] = $q;
        null !== $tableID && $self['tableID'] = $tableID;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Specifies whether or not you are showing autocomplete results. Defaults to false.
     */
    public function withAutocomplete(bool $autocomplete): self
    {
        $self = clone $this;
        $self['autocomplete'] = $autocomplete;

        return $self;
    }

    /**
     * Specifies the maximum amount a result will be boosted based on its view count. Defaults to 5.0. Read more about elasticsearch boosting [here](https://www.elastic.co/guide/en/elasticsearch/reference/current/mapping-boost.html).
     */
    public function withBoostLimit(float $boostLimit): self
    {
        $self = clone $this;
        $self['boostLimit'] = $boostLimit;

        return $self;
    }

    /**
     * Specifies a relative time window where scores of documents published outside this time window decay. This can only be used for blog posts. For example, boostRecent=10d will boost documents published within the last 10 days. Supported timeunits are ms (milliseconds), s (seconds), m (minutes), h (hours), d (days).
     */
    public function withBoostRecent(string $boostRecent): self
    {
        $self = clone $this;
        $self['boostRecent'] = $boostRecent;

        return $self;
    }

    /**
     * A domain to match search results for. Multiple domains can be provided with &.
     *
     * @param list<string> $domain
     */
    public function withDomain(array $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * Specifies which blog(s) to be searched by blog ID. Can be used multiple times to search more than one blog.
     *
     * @param list<int> $groupID
     */
    public function withGroupID(array $groupID): self
    {
        $self = clone $this;
        $self['groupID'] = $groupID;

        return $self;
    }

    /**
     * Specify a HubDB query to further filter the search results.
     */
    public function withHubdbQuery(string $hubdbQuery): self
    {
        $self = clone $this;
        $self['hubdbQuery'] = $hubdbQuery;

        return $self;
    }

    /**
     * Specifies the language of content to be searched. This value must be a valid [ISO 639-1 language code](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes) (e.g. `es` for Spanish).
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Specifies the length of the search results. Can be set to `LONG` or `SHORT`. `SHORT` will return the first 128 characters of the content's meta description. `LONG` will build a more detailed content snippet based on the html/content of the page.
     *
     * @param Length|value-of<Length> $length
     */
    public function withLength(Length|string $length): self
    {
        $self = clone $this;
        $self['length'] = $length;

        return $self;
    }

    /**
     * Specifies the number of results to be returned in a single response. Defaults to `10`. Maximum value is `100`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Inverts the behavior of the pathPrefix filter when set to `false`. Defaults to `true`.
     */
    public function withMatchPrefix(bool $matchPrefix): self
    {
        $self = clone $this;
        $self['matchPrefix'] = $matchPrefix;

        return $self;
    }

    /**
     * Used to page through the results. If there are more results than specified by the `limit` parameter, you will need to use the value of offset returned in the previous request to get the next set of results.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Specifies a path prefix to filter search results. Will only return results with URL paths that start with the specified parameter. Can be used multiple times.
     *
     * @param list<string> $pathPrefix
     */
    public function withPathPrefix(array $pathPrefix): self
    {
        $self = clone $this;
        $self['pathPrefix'] = $pathPrefix;

        return $self;
    }

    /**
     * Specifies how strongly a result is boosted based on its view count. Defaults to 1.0.
     */
    public function withPopularityBoost(float $popularityBoost): self
    {
        $self = clone $this;
        $self['popularityBoost'] = $popularityBoost;

        return $self;
    }

    /**
     * Specifies which properties to include in the search. Options include `title`, `description`, and `html`. All properties will be searched by default.
     *
     * @param list<string> $property
     */
    public function withProperty(array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * The term to search for.
     */
    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }

    /**
     * Specifies a specific HubDB table to search. Only returns results from the specified table. Can be used in tandem with the `hubdbQuery` parameter to further filter results.
     */
    public function withTableID(int $tableID): self
    {
        $self = clone $this;
        $self['tableID'] = $tableID;

        return $self;
    }

    /**
     * Specifies the type of content to search. Can be one or more of SITE_PAGE, LANDING_PAGE, BLOG_POST, LISTING_PAGE, and KNOWLEDGE_ARTICLE. Defaults to all content types except LANDING_PAGE and KNOWLEDGE_ARTICLE.
     *
     * @param list<Type|value-of<Type>> $type
     */
    public function withType(array $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
