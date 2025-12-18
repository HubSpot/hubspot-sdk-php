<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\Statistics;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;

/**
 * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
 *
 * @see HubspotSDK\Services\Marketing\Emails\StatisticsService::getHistogram()
 *
 * @phpstan-type StatisticGetHistogramParamsShape = array{
 *   emailIDs?: list<int>|null,
 *   endTimestamp?: string|null,
 *   interval?: null|Interval|value-of<Interval>,
 *   startTimestamp?: string|null,
 * }
 */
final class StatisticGetHistogramParams implements BaseModel
{
    /** @use SdkModel<StatisticGetHistogramParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @var list<int>|null $emailIDs
     */
    #[Optional(list: 'int')]
    public ?array $emailIDs;

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    #[Optional]
    public ?string $endTimestamp;

    /**
     * The interval to aggregate statistics for.
     *
     * @var value-of<Interval>|null $interval
     */
    #[Optional(enum: Interval::class)]
    public ?string $interval;

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    #[Optional]
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
     * @param list<int>|null $emailIDs
     * @param Interval|value-of<Interval>|null $interval
     */
    public static function with(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        Interval|string|null $interval = null,
        ?string $startTimestamp = null,
    ): self {
        $self = new self;

        null !== $emailIDs && $self['emailIDs'] = $emailIDs;
        null !== $endTimestamp && $self['endTimestamp'] = $endTimestamp;
        null !== $interval && $self['interval'] = $interval;
        null !== $startTimestamp && $self['startTimestamp'] = $startTimestamp;

        return $self;
    }

    /**
     * Filter by email IDs. Only include statistics of emails with these IDs.
     *
     * @param list<int> $emailIDs
     */
    public function withEmailIDs(array $emailIDs): self
    {
        $self = clone $this;
        $self['emailIDs'] = $emailIDs;

        return $self;
    }

    /**
     * The end timestamp of the time span, in ISO8601 representation.
     */
    public function withEndTimestamp(string $endTimestamp): self
    {
        $self = clone $this;
        $self['endTimestamp'] = $endTimestamp;

        return $self;
    }

    /**
     * The interval to aggregate statistics for.
     *
     * @param Interval|value-of<Interval> $interval
     */
    public function withInterval(Interval|string $interval): self
    {
        $self = clone $this;
        $self['interval'] = $interval;

        return $self;
    }

    /**
     * The start timestamp of the time span, in ISO8601 representation.
     */
    public function withStartTimestamp(string $startTimestamp): self
    {
        $self = clone $this;
        $self['startTimestamp'] = $startTimestamp;

        return $self;
    }
}
