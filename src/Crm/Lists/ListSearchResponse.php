<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicObjectListSearchResultShape from \HubSpotSDK\Crm\Lists\PublicObjectListSearchResult
 *
 * @phpstan-type ListSearchResponseShape = array{
 *   hasMore: bool,
 *   lists: list<PublicObjectListSearchResult|PublicObjectListSearchResultShape>,
 *   offset: int,
 *   total: int,
 * }
 */
final class ListSearchResponse implements BaseModel
{
    /** @use SdkModel<ListSearchResponseShape> */
    use SdkModel;

    /**
     * Whether or not there are more results to page through.
     */
    #[Required]
    public bool $hasMore;

    /**
     * The lists that matched the search criteria.
     *
     * @var list<PublicObjectListSearchResult> $lists
     */
    #[Required(list: PublicObjectListSearchResult::class)]
    public array $lists;

    /**
     * Value to be passed in a future request to paginate through list search results.
     */
    #[Required]
    public int $offset;

    /**
     * The total number of lists that match the search criteria.
     */
    #[Required]
    public int $total;

    /**
     * `new ListSearchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListSearchResponse::with(hasMore: ..., lists: ..., offset: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListSearchResponse)
     *   ->withHasMore(...)
     *   ->withLists(...)
     *   ->withOffset(...)
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
     * @param list<PublicObjectListSearchResult|PublicObjectListSearchResultShape> $lists
     */
    public static function with(
        bool $hasMore,
        array $lists,
        int $offset,
        int $total
    ): self {
        $self = new self;

        $self['hasMore'] = $hasMore;
        $self['lists'] = $lists;
        $self['offset'] = $offset;
        $self['total'] = $total;

        return $self;
    }

    /**
     * Whether or not there are more results to page through.
     */
    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    /**
     * The lists that matched the search criteria.
     *
     * @param list<PublicObjectListSearchResult|PublicObjectListSearchResultShape> $lists
     */
    public function withLists(array $lists): self
    {
        $self = clone $this;
        $self['lists'] = $lists;

        return $self;
    }

    /**
     * Value to be passed in a future request to paginate through list search results.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The total number of lists that match the search criteria.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
