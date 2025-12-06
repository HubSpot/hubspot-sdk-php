<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Cms\Blogs\Tags\Tag\Language;
use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: Tag::class)]
    public array $results;

    /**
     * Total number of blog tags.
     */
    #[Api]
    public int $total;

    #[Api(optional: true)]
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
     *   translatedFromId: int,
     *   updated: \DateTimeInterface,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
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
     *   translatedFromId: int,
     *   updated: \DateTimeInterface,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of blog tags.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
