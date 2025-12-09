<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SiteSearch;

use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Language;
use HubspotSDK\Cms\SiteSearch\ContentSearchResult\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicSearchResultsShape = array{
 *   limit: int,
 *   offset: int,
 *   page: int,
 *   results: list<ContentSearchResult>,
 *   total: int,
 *   searchTerm?: string|null,
 * }
 */
final class PublicSearchResults implements BaseModel
{
    /** @use SdkModel<PublicSearchResultsShape> */
    use SdkModel;

    #[Api]
    public int $limit;

    #[Api]
    public int $offset;

    #[Api]
    public int $page;

    /** @var list<ContentSearchResult> $results */
    #[Api(list: ContentSearchResult::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
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
     * @param list<ContentSearchResult|array{
     *   id: int,
     *   domain: string,
     *   score: float,
     *   type: value-of<Type>,
     *   url: string,
     *   authorFullName?: string|null,
     *   category?: string|null,
     *   combinedId?: string|null,
     *   description?: string|null,
     *   featuredImageUrl?: string|null,
     *   language?: value-of<Language>|null,
     *   publishedDate?: int|null,
     *   rowId?: int|null,
     *   subcategory?: string|null,
     *   tableId?: int|null,
     *   tags?: list<string>|null,
     *   title?: string|null,
     * }> $results
     */
    public static function with(
        int $limit,
        int $offset,
        int $page,
        array $results,
        int $total,
        ?string $searchTerm = null,
    ): self {
        $obj = new self;

        $obj['limit'] = $limit;
        $obj['offset'] = $offset;
        $obj['page'] = $page;
        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $searchTerm && $obj['searchTerm'] = $searchTerm;

        return $obj;
    }

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * @param list<ContentSearchResult|array{
     *   id: int,
     *   domain: string,
     *   score: float,
     *   type: value-of<Type>,
     *   url: string,
     *   authorFullName?: string|null,
     *   category?: string|null,
     *   combinedId?: string|null,
     *   description?: string|null,
     *   featuredImageUrl?: string|null,
     *   language?: value-of<Language>|null,
     *   publishedDate?: int|null,
     *   rowId?: int|null,
     *   subcategory?: string|null,
     *   tableId?: int|null,
     *   tags?: list<string>|null,
     *   title?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    public function withSearchTerm(string $searchTerm): self
    {
        $obj = clone $this;
        $obj['searchTerm'] = $searchTerm;

        return $obj;
    }
}
