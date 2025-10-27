<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type email_statistic_interval = array{
 *   aggregations?: EmailStatisticsData, interval?: Interval
 * }
 */
final class EmailStatisticInterval implements BaseModel
{
    /** @use SdkModel<email_statistic_interval> */
    use SdkModel;

    #[Api(optional: true)]
    public ?EmailStatisticsData $aggregations;

    #[Api(optional: true)]
    public ?Interval $interval;

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
        ?EmailStatisticsData $aggregations = null,
        ?Interval $interval = null
    ): self {
        $obj = new self;

        null !== $aggregations && $obj->aggregations = $aggregations;
        null !== $interval && $obj->interval = $interval;

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
