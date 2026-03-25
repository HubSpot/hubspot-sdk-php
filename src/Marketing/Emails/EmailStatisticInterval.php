<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailStatisticsDataShape from \HubspotSDK\Marketing\Emails\EmailStatisticsData
 * @phpstan-import-type IntervalShape from \HubspotSDK\Marketing\Emails\Interval
 *
 * @phpstan-type EmailStatisticIntervalShape = array{
 *   aggregations: EmailStatisticsData|EmailStatisticsDataShape,
 *   interval: Interval|IntervalShape,
 * }
 */
final class EmailStatisticInterval implements BaseModel
{
    /** @use SdkModel<EmailStatisticIntervalShape> */
    use SdkModel;

    #[Required]
    public EmailStatisticsData $aggregations;

    #[Required]
    public Interval $interval;

    /**
     * `new EmailStatisticInterval()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailStatisticInterval::with(aggregations: ..., interval: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailStatisticInterval)->withAggregations(...)->withInterval(...)
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
     * @param EmailStatisticsData|EmailStatisticsDataShape $aggregations
     * @param Interval|IntervalShape $interval
     */
    public static function with(
        EmailStatisticsData|array $aggregations,
        Interval|array $interval
    ): self {
        $self = new self;

        $self['aggregations'] = $aggregations;
        $self['interval'] = $interval;

        return $self;
    }

    /**
     * @param EmailStatisticsData|EmailStatisticsDataShape $aggregations
     */
    public function withAggregations(
        EmailStatisticsData|array $aggregations
    ): self {
        $self = clone $this;
        $self['aggregations'] = $aggregations;

        return $self;
    }

    /**
     * @param Interval|IntervalShape $interval
     */
    public function withInterval(Interval|array $interval): self
    {
        $self = clone $this;
        $self['interval'] = $interval;

        return $self;
    }
}
