<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Tags;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type TagShape from \HubSpotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseWithTotalTagForwardPagingShape = array{
 *   results: list<Tag|TagShape>,
 *   total: int,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseWithTotalTagForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalTagForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of blog tags.
     *
     * @var list<Tag> $results
     */
    #[Required(list: Tag::class)]
    public array $results;

    /**
     * Total number of blog tags.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalTagForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalTagForwardPaging::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalTagForwardPaging)
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
     * @param list<Tag|TagShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * Collection of blog tags.
     *
     * @param list<Tag|TagShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Total number of blog tags.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
