<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * Response object for collections of blog post versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionBlogPostShape = array{
 *   results: list<VersionBlogPost>, total: int, paging?: Paging
 * }
 */
final class CollectionResponseWithTotalVersionBlogPost implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionBlogPostShape> */
    use SdkModel;

    /**
     * Collection of blog post versions.
     *
     * @var list<VersionBlogPost> $results
     */
    #[Api(list: VersionBlogPost::class)]
    public array $results;

    /**
     * Total number of blog post versions.
     */
    #[Api]
    public int $total;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalVersionBlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionBlogPost::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionBlogPost)
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
     * @param list<VersionBlogPost> $results
     */
    public static function with(
        array $results,
        int $total,
        ?Paging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of blog post versions.
     *
     * @param list<VersionBlogPost> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of blog post versions.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
