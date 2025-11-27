<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Response object for collections of EmailStatisticIntervals.
 *
 * @phpstan-type CollectionResponseWithTotalEmailStatisticIntervalNoPagingShape = array{
 *   results: list<EmailStatisticInterval>, total: int
 * }
 */
final class CollectionResponseWithTotalEmailStatisticIntervalNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalEmailStatisticIntervalNoPagingShape> */
    use SdkModel;

    /**
     * Collection of objects.
     *
     * @var list<EmailStatisticInterval> $results
     */
    #[Api(list: EmailStatisticInterval::class)]
    public array $results;

    /**
     * Total number of objects.
     */
    #[Api]
    public int $total;

    /**
     * `new CollectionResponseWithTotalEmailStatisticIntervalNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalEmailStatisticIntervalNoPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalEmailStatisticIntervalNoPaging)
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
     * @param list<EmailStatisticInterval> $results
     */
    public static function with(array $results, int $total): self
    {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        return $obj;
    }

    /**
     * Collection of objects.
     *
     * @param list<EmailStatisticInterval> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of objects.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
