<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type PublicListShape from \HubSpotSDK\Marketing\MarketingEvents\PublicList
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalPublicListShape = array{
 *   results: list<PublicList|PublicListShape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalPublicList implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicListShape> */
    use SdkModel;

    /** @var list<PublicList> $results */
    #[Required(list: PublicList::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalPublicList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicList::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicList)->withResults(...)->withTotal(...)
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
     * @param list<PublicList|PublicListShape> $results
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
     * @param list<PublicList|PublicListShape> $results
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
