<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;

/**
 * @phpstan-import-type HubDBTableV3Shape from \HubSpotSDK\Cms\Hubdb\HubDBTableV3
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
 *
 * @phpstan-type CollectionResponseWithTotalHubDBTableV3Shape = array{
 *   results: list<HubDBTableV3|HubDBTableV3Shape>,
 *   total: int,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseWithTotalHubDBTableV3 implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalHubDBTableV3Shape> */
    use SdkModel;

    /** @var list<HubDBTableV3> $results */
    #[Required(list: HubDBTableV3::class)]
    public array $results;

    #[Required]
    public int $total;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalHubDBTableV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalHubDBTableV3::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalHubDBTableV3)->withResults(...)->withTotal(...)
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
     * @param list<HubDBTableV3|HubDBTableV3Shape> $results
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
     * @param list<HubDBTableV3|HubDBTableV3Shape> $results
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
