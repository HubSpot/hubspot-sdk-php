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
 * Returns any website content matching the given search criteria for a given HubSpot account. Searches can be filtered by content type, domain, or URL path. Includes options for weighing results by recency and popularity, along with language support.
 *
 * @see HubspotSDK\Services\Cms\SiteSearchService::search()
 *
 * @phpstan-type SiteSearchSearchParamsShape = array{
 *   analytics?: bool|null,
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
 *   type?: list<string>|null,
 *   types?: list<Type|value-of<Type>>|null,
 * }
 */
final class SiteSearchSearchParams implements BaseModel
{
    /** @use SdkModel<SiteSearchSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?bool $analytics;

    #[Optional]
    public ?bool $autocomplete;

    #[Optional]
    public ?float $boostLimit;

    #[Optional]
    public ?string $boostRecent;

    /** @var list<string>|null $domain */
    #[Optional(list: 'string')]
    public ?array $domain;

    /** @var list<int>|null $groupID */
    #[Optional(list: 'int')]
    public ?array $groupID;

    #[Optional]
    public ?string $hubdbQuery;

    /** @var value-of<Language>|null $language */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /** @var value-of<Length>|null $length */
    #[Optional(enum: Length::class)]
    public ?string $length;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?bool $matchPrefix;

    #[Optional]
    public ?int $offset;

    /** @var list<string>|null $pathPrefix */
    #[Optional(list: 'string')]
    public ?array $pathPrefix;

    #[Optional]
    public ?float $popularityBoost;

    /** @var list<string>|null $property */
    #[Optional(list: 'string')]
    public ?array $property;

    #[Optional]
    public ?string $q;

    #[Optional]
    public ?int $tableID;

    /** @var list<string>|null $type */
    #[Optional(list: 'string')]
    public ?array $type;

    /** @var list<value-of<Type>>|null $types */
    #[Optional(list: Type::class)]
    public ?array $types;

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
     * @param list<string>|null $type
     * @param list<Type|value-of<Type>>|null $types
     */
    public static function with(
        ?bool $analytics = null,
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
        ?array $types = null,
    ): self {
        $self = new self;

        null !== $analytics && $self['analytics'] = $analytics;
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
        null !== $types && $self['types'] = $types;

        return $self;
    }

    public function withAnalytics(bool $analytics): self
    {
        $self = clone $this;
        $self['analytics'] = $analytics;

        return $self;
    }

    public function withAutocomplete(bool $autocomplete): self
    {
        $self = clone $this;
        $self['autocomplete'] = $autocomplete;

        return $self;
    }

    public function withBoostLimit(float $boostLimit): self
    {
        $self = clone $this;
        $self['boostLimit'] = $boostLimit;

        return $self;
    }

    public function withBoostRecent(string $boostRecent): self
    {
        $self = clone $this;
        $self['boostRecent'] = $boostRecent;

        return $self;
    }

    /**
     * @param list<string> $domain
     */
    public function withDomain(array $domain): self
    {
        $self = clone $this;
        $self['domain'] = $domain;

        return $self;
    }

    /**
     * @param list<int> $groupID
     */
    public function withGroupID(array $groupID): self
    {
        $self = clone $this;
        $self['groupID'] = $groupID;

        return $self;
    }

    public function withHubdbQuery(string $hubdbQuery): self
    {
        $self = clone $this;
        $self['hubdbQuery'] = $hubdbQuery;

        return $self;
    }

    /**
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * @param Length|value-of<Length> $length
     */
    public function withLength(Length|string $length): self
    {
        $self = clone $this;
        $self['length'] = $length;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withMatchPrefix(bool $matchPrefix): self
    {
        $self = clone $this;
        $self['matchPrefix'] = $matchPrefix;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * @param list<string> $pathPrefix
     */
    public function withPathPrefix(array $pathPrefix): self
    {
        $self = clone $this;
        $self['pathPrefix'] = $pathPrefix;

        return $self;
    }

    public function withPopularityBoost(float $popularityBoost): self
    {
        $self = clone $this;
        $self['popularityBoost'] = $popularityBoost;

        return $self;
    }

    /**
     * @param list<string> $property
     */
    public function withProperty(array $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }

    public function withTableID(int $tableID): self
    {
        $self = clone $this;
        $self['tableID'] = $tableID;

        return $self;
    }

    /**
     * @param list<string> $type
     */
    public function withType(array $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<Type|value-of<Type>> $types
     */
    public function withTypes(array $types): self
    {
        $self = clone $this;
        $self['types'] = $types;

        return $self;
    }
}
