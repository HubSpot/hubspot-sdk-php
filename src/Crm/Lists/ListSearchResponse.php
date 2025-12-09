<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
     * @param list<PublicObjectListSearchResult|array{
     *   additionalProperties: array<string,string>,
     *   listId: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeId: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     * }> $lists
     */
    public static function with(
        bool $hasMore,
        array $lists,
        int $offset,
        int $total
    ): self {
        $obj = new self;

        $obj['hasMore'] = $hasMore;
        $obj['lists'] = $lists;
        $obj['offset'] = $offset;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * Whether or not there are more results to page through.
     */
    public function withHasMore(bool $hasMore): self
    {
        $obj = clone $this;
        $obj['hasMore'] = $hasMore;

        return $obj;
    }

    /**
     * The lists that matched the search criteria.
     *
     * @param list<PublicObjectListSearchResult|array{
     *   additionalProperties: array<string,string>,
     *   listId: string,
     *   listVersion: int,
     *   name: string,
     *   objectTypeId: string,
     *   processingStatus: string,
     *   processingType: string,
     *   createdAt?: \DateTimeInterface|null,
     *   createdById?: string|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   filtersUpdatedAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedById?: string|null,
     * }> $lists
     */
    public function withLists(array $lists): self
    {
        $obj = clone $this;
        $obj['lists'] = $lists;

        return $obj;
    }

    /**
     * Value to be passed in a future request to paginate through list search results.
     */
    public function withOffset(int $offset): self
    {
        $obj = clone $this;
        $obj['offset'] = $offset;

        return $obj;
    }

    /**
     * The total number of lists that match the search criteria.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }
}
