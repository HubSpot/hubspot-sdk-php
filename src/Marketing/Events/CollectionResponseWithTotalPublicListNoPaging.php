<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponseWithTotalPublicListNoPagingShape = array{
 *   results: list<PublicList>, total: int
 * }
 */
final class CollectionResponseWithTotalPublicListNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicListNoPagingShape> */
    use SdkModel;

    /** @var list<PublicList> $results */
    #[Api(list: PublicList::class)]
    public array $results;

    #[Api]
    public int $total;

    /**
     * `new CollectionResponseWithTotalPublicListNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicListNoPaging::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicListNoPaging)
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
     * @param list<PublicList> $results
     */
    public static function with(array $results, int $total): self
    {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        return $obj;
    }

    /**
     * @param list<PublicList> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
