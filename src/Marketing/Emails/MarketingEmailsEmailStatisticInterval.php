<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_emails_email_statistic_interval = array{
 *   aggregations?: MarketingEmailsEmailStatisticsData,
 *   interval?: MarketingEmailsInterval,
 * }
 */
final class MarketingEmailsEmailStatisticInterval implements BaseModel
{
    /** @use SdkModel<marketing_emails_email_statistic_interval> */
    use SdkModel;

    #[Api(optional: true)]
    public ?MarketingEmailsEmailStatisticsData $aggregations;

    #[Api(optional: true)]
    public ?MarketingEmailsInterval $interval;

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
        ?MarketingEmailsEmailStatisticsData $aggregations = null,
        ?MarketingEmailsInterval $interval = null,
    ): self {
        $obj = new self;

        null !== $aggregations && $obj->aggregations = $aggregations;
        null !== $interval && $obj->interval = $interval;

        return $obj;
    }

    public function withAggregations(
        MarketingEmailsEmailStatisticsData $aggregations
    ): self {
        $obj = clone $this;
        $obj->aggregations = $aggregations;

        return $obj;
    }

    public function withInterval(MarketingEmailsInterval $interval): self
    {
        $obj = clone $this;
        $obj->interval = $interval;

        return $obj;
    }
}
