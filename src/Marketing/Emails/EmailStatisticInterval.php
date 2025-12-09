<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailStatisticIntervalShape = array{
 *   aggregations: EmailStatisticsData, interval: Interval
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
     * @param EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * } $aggregations
     * @param Interval|array{
     *   end: \DateTimeInterface, start: \DateTimeInterface
     * } $interval
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
     * @param EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * } $aggregations
     */
    public function withAggregations(
        EmailStatisticsData|array $aggregations
    ): self {
        $self = clone $this;
        $self['aggregations'] = $aggregations;

        return $self;
    }

    /**
     * @param Interval|array{
     *   end: \DateTimeInterface, start: \DateTimeInterface
     * } $interval
     */
    public function withInterval(Interval|array $interval): self
    {
        $self = clone $this;
        $self['interval'] = $interval;

        return $self;
    }
}
