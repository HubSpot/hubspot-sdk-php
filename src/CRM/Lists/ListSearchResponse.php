<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * The response object with the list search hits and additional information regarding pagination.
 *
 * @phpstan-type ListSearchResponseShape = array{
 *   hasMore: bool,
 *   lists: list<PublicObjectListSearchResult>,
 *   offset: int,
 *   total: int,
 * }
 */
final class ListSearchResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ListSearchResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Whether or not there are more results to page through.
     */
    #[Api]
    public bool $hasMore;

    /**
     * The lists that matched the search criteria.
     *
     * @var list<PublicObjectListSearchResult> $lists
     */
    #[Api(list: PublicObjectListSearchResult::class)]
    public array $lists;

    /**
     * Value to be passed in a future request to paginate through list search results.
     */
    #[Api]
    public int $offset;

    /**
     * The total number of lists that match the search criteria.
     */
    #[Api]
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
     * @param list<PublicObjectListSearchResult> $lists
     */
    public static function with(
        bool $hasMore,
        array $lists,
        int $offset,
        int $total
    ): self {
        $obj = new self;

        $obj->hasMore = $hasMore;
        $obj->lists = $lists;
        $obj->offset = $offset;
        $obj->total = $total;

        return $obj;
    }

    /**
     * Whether or not there are more results to page through.
     */
    public function withHasMore(bool $hasMore): self
    {
        $obj = clone $this;
        $obj->hasMore = $hasMore;

        return $obj;
    }

    /**
     * The lists that matched the search criteria.
     *
     * @param list<PublicObjectListSearchResult> $lists
     */
    public function withLists(array $lists): self
    {
        $obj = clone $this;
        $obj->lists = $lists;

        return $obj;
    }

    /**
     * Value to be passed in a future request to paginate through list search results.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj->offset = $offset;

        return $obj;
    }

    /**
     * The total number of lists that match the search criteria.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
