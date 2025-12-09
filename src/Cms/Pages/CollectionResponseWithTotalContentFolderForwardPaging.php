<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * Response object for collections of content folders with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalContentFolderForwardPagingShape = array{
 *   results: list<ContentFolder>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalContentFolderForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalContentFolderForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of content folders.
     *
     * @var list<ContentFolder> $results
     */
    #[Required(list: ContentFolder::class)]
    public array $results;

    /**
     * Total number of content folders.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalContentFolderForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalContentFolderForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalContentFolderForwardPaging)
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
     * @param list<ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
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
     * Collection of content folders.
     *
     * @param list<ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderID: int,
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
     * Total number of content folders.
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
