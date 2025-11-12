<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Authors;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * Response object for collections of blog authors with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalBlogAuthorForwardPagingShape = array{
 *   results: list<BlogAuthor>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalBlogAuthorForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalBlogAuthorForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of blog authors.
     *
     * @var list<BlogAuthor> $results
     */
    #[Api(list: BlogAuthor::class)]
    public array $results;

    /**
     * Total number of blog authors.
     */
    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalBlogAuthorForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalBlogAuthorForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalBlogAuthorForwardPaging)
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
     * @param list<BlogAuthor> $results
     */
    public static function with(
        array $results,
        int $total,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of blog authors.
     *
     * @param list<BlogAuthor> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of blog authors.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
