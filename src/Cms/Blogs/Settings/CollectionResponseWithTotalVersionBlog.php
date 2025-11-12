<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\EmailsPaging;

/**
 * Response object for collections of blog versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionBlogShape = array{
 *   results: list<VersionBlog>, total: int, paging?: EmailsPaging|null
 * }
 */
final class CollectionResponseWithTotalVersionBlog implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionBlogShape> */
    use SdkModel;

    /**
     * Collection of blog versions.
     *
     * @var list<VersionBlog> $results
     */
    #[Api(list: VersionBlog::class)]
    public array $results;

    /**
     * Total number of blog versions.
     */
    #[Api]
    public int $total;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?EmailsPaging $paging;

    /**
     * `new CollectionResponseWithTotalVersionBlog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionBlog::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionBlog)->withResults(...)->withTotal(...)
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
     * @param list<VersionBlog> $results
     */
    public static function with(
        array $results,
        int $total,
        ?EmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of blog versions.
     *
     * @param list<VersionBlog> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of blog versions.
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
    public function withPaging(EmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
