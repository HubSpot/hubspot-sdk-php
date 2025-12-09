<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\Tag\Language;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * Response object for collections of blog tags with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalTagForwardPagingShape = array{
 *   results: list<Tag>, total: int, paging?: ForwardPaging|null
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
     * @param list<Tag|array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
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
     * @param list<Tag|array{
     *   id: string,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   language: value-of<Language>,
     *   name: string,
     *   translatedFromID: int,
     *   updated: \DateTimeInterface,
     * }> $results
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
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
