<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\Statistics;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;

/**
 * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
 *
 * @see HubspotSDK\Marketing\Emails\Statistics->getHistogram
 *
 * @phpstan-type statistic_get_histogram_params = array{
 *   emailIDs?: list<int>,
 *   endTimestamp?: string,
 *   interval?: Interval|value-of<Interval>,
 *   startTimestamp?: string,
 * }
 */
final class StatisticGetHistogramParams implements BaseModel
{
    /** @use SdkModel<statistic_get_histogram_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @var list<int>|null $emailIDs
     */
    #[Api(list: 'int', optional: true)]
    public ?array $emailIDs;

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?string $endTimestamp;

    /**
     * The interval to aggregate statistics for.
     *
     * @var value-of<Interval>|null $interval
     */
    #[Api(enum: Interval::class, optional: true)]
    public ?string $interval;

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    #[Api(optional: true)]
    public ?string $startTimestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $emailIDs
     * @param Interval|value-of<Interval> $interval
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        Interval|string|null $interval = null,
        ?string $startTimestamp = null,
    ): self {
        $obj = new self;

        null !== $emailIDs && $obj->emailIDs = $emailIDs;
        null !== $endTimestamp && $obj->endTimestamp = $endTimestamp;
        null !== $interval && $obj['interval'] = $interval;
        null !== $startTimestamp && $obj->startTimestamp = $startTimestamp;

        return $obj;
    }

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $obj = clone $this;
        $obj->emailIDs = $emailIDs;

        return $obj;
    }

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    public function withEndTimestamp(string $endTimestamp): self
    {
        $obj = clone $this;
        $obj->endTimestamp = $endTimestamp;

        return $obj;
    }

    /**
     * The interval to aggregate statistics for.
     *
     * @param Interval|value-of<Interval> $interval
     */
    public function withInterval(Interval|string $interval): self
    {
        $obj = clone $this;
        $obj['interval'] = $interval;

        return $obj;
    }

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    public function withStartTimestamp(string $startTimestamp): self
    {
        $obj = clone $this;
        $obj->startTimestamp = $startTimestamp;

        return $obj;
    }
}
