<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Settings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type VersionBlogShape from \HubSpotSDK\Cms\Blogs\Settings\VersionBlog
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalBlogVersionShape = array{
 *   results: list<VersionBlog|VersionBlogShape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalBlogVersion implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalBlogVersionShape> */
    use SdkModel;

    /** @var list<VersionBlog> $results */
    #[Required(list: VersionBlog::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalBlogVersion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalBlogVersion::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalBlogVersion)->withResults(...)->withTotal(...)
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
     * @param list<VersionBlog|VersionBlogShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<VersionBlog|VersionBlogShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
