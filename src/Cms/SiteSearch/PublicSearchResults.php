<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContentSearchResultShape from \HubspotSDK\Cms\SiteSearch\ContentSearchResult
 *
 * @phpstan-type PublicSearchResultsShape = array{
 *   limit: int,
 *   offset: int,
 *   page: int,
 *   results: list<ContentSearchResult|ContentSearchResultShape>,
 *   total: int,
 *   searchTerm?: string|null,
 * }
 */
final class PublicSearchResults implements BaseModel
{
    /** @use SdkModel<PublicSearchResultsShape> */
    use SdkModel;

    /**
     * The number of results returned in a single response.
     */
    #[Required]
    public int $limit;

    /**
     * The starting point for the next set of results in pagination.
     */
    #[Required]
    public int $offset;

    /**
     * The current page number in the paginated results.
     */
    #[Required]
    public int $page;

    /** @var list<ContentSearchResult> $results */
    #[Required(list: ContentSearchResult::class)]
    public array $results;

    /**
     * The total number of results found for the search term.
     */
    #[Required]
    public int $total;

    /**
     * The term used in the search query.
     */
    #[Optional]
    public ?string $searchTerm;

    /**
     * `new PublicSearchResults()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicSearchResults::with(
     *   limit: ..., offset: ..., page: ..., results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicSearchResults)
     *   ->withLimit(...)
     *   ->withOffset(...)
     *   ->withPage(...)
     *   ->withResults(...)
     *   ->withTotal(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ContentSearchResult|ContentSearchResultShape> $results
     */
    public static function with(
        int $limit,
        int $offset,
        int $page,
        array $results,
        int $total,
        ?string $searchTerm = null,
    ): self {
        $self = new self;

        $self['limit'] = $limit;
        $self['offset'] = $offset;
        $self['page'] = $page;
        $self['results'] = $results;
        $self['total'] = $total;

        null !== $searchTerm && $self['searchTerm'] = $searchTerm;

        return $self;
    }

    /**
     * The number of results returned in a single response.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The starting point for the next set of results in pagination.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The current page number in the paginated results.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * @param list<ContentSearchResult|ContentSearchResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The total number of results found for the search term.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * The term used in the search query.
     */
    public function withSearchTerm(string $searchTerm): self
    {
        $self = clone $this;
        $self['searchTerm'] = $searchTerm;

        return $self;
    }
}
