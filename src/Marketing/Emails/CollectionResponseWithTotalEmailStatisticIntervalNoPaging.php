<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Response object for collections of EmailStatisticIntervals.
 *
 * @phpstan-import-type EmailStatisticIntervalShape from \HubspotSDK\Marketing\Emails\EmailStatisticInterval
 *
 * @phpstan-type CollectionResponseWithTotalEmailStatisticIntervalNoPagingShape = array{
 *   results: list<EmailStatisticIntervalShape>, total: int
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
    #[Required(list: EmailStatisticInterval::class)]
    public array $results;

    /**
     * Total number of objects.
     */
    #[Required]
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
     * @param list<EmailStatisticIntervalShape> $results
     */
    public static function with(array $results, int $total): self
    {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        return $self;
    }

    /**
     * Collection of objects.
     *
     * @param list<EmailStatisticIntervalShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Total number of objects.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
