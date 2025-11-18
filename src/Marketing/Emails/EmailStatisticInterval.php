<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public EmailStatisticsData $aggregations;

    #[Api]
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
     */
    public static function with(
        EmailStatisticsData $aggregations,
        Interval $interval
    ): self {
        $obj = new self;

        $obj->aggregations = $aggregations;
        $obj->interval = $interval;

        return $obj;
    }

    public function withAggregations(EmailStatisticsData $aggregations): self
    {
        $obj = clone $this;
        $obj->aggregations = $aggregations;

        return $obj;
    }

    public function withInterval(Interval $interval): self
    {
        $obj = clone $this;
        $obj->interval = $interval;

        return $obj;
    }
}
