<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Aggregated statistics for the given interval, plus the IDs of emails that were sent during that interval.
 *
 * @phpstan-type AggregateEmailStatisticsShape = array{
 *   aggregate?: EmailStatisticsData|null,
 *   campaignAggregations?: array<string,EmailStatisticsData>|null,
 *   emails?: list<int>|null,
 * }
 */
final class AggregateEmailStatistics implements BaseModel
{
    /** @use SdkModel<AggregateEmailStatisticsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?EmailStatisticsData $aggregate;

    /**
     * The aggregated statistics per campaign.
     *
     * @var array<string,EmailStatisticsData>|null $campaignAggregations
     */
    #[Api(map: EmailStatisticsData::class, optional: true)]
    public ?array $campaignAggregations;

    /**
     * List of email IDs that were sent during the time span.
     *
     * @var list<int>|null $emails
     */
    #[Api(list: 'int', optional: true)]
    public ?array $emails;

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
     * } $aggregate
     * @param array<string,EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * }> $campaignAggregations
     * @param list<int> $emails
     */
    public static function with(
        EmailStatisticsData|array|null $aggregate = null,
        ?array $campaignAggregations = null,
        ?array $emails = null,
    ): self {
        $obj = new self;

        null !== $aggregate && $obj['aggregate'] = $aggregate;
        null !== $campaignAggregations && $obj['campaignAggregations'] = $campaignAggregations;
        null !== $emails && $obj['emails'] = $emails;

        return $obj;
    }

    /**
     * @param EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * } $aggregate
     */
    public function withAggregate(EmailStatisticsData|array $aggregate): self
    {
        $obj = clone $this;
        $obj['aggregate'] = $aggregate;

        return $obj;
    }

    /**
     * The aggregated statistics per campaign.
     *
     * @param array<string,EmailStatisticsData|array{
     *   counters: array<string,int>,
     *   deviceBreakdown: array<string,array<string,int>>,
     *   qualifierStats: array<string,array<string,int>>,
     *   ratios: array<string,float>,
     * }> $campaignAggregations
     */
    public function withCampaignAggregations(array $campaignAggregations): self
    {
        $obj = clone $this;
        $obj['campaignAggregations'] = $campaignAggregations;

        return $obj;
    }

    /**
     * List of email IDs that were sent during the time span.
     *
     * @param list<int> $emails
     */
    public function withEmails(array $emails): self
    {
        $obj = clone $this;
        $obj['emails'] = $emails;

        return $obj;
    }
}
