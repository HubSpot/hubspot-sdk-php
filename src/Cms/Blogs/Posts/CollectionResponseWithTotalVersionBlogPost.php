<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * Response object for collections of blog post versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionBlogPostShape = array{
 *   results: list<mixed>, total: int, paging?: Paging|null
 * }
 */
final class CollectionResponseWithTotalVersionBlogPost implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionBlogPostShape> */
    use SdkModel;

    /**
     * Collection of blog post versions.
     *
     * @var list<mixed> $results
     */
    #[Required(list: VersionBlogPost::class)]
    public array $results;

    /**
     * Total number of blog post versions.
     */
    #[Required]
    public int $total;

    #[Optional]
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
     * @param list<mixed> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * Collection of blog post versions.
     *
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of blog post versions.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
