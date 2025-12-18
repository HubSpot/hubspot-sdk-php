<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Aggregated statistics for the given interval, plus the IDs of emails that were sent during that interval.
 *
 * @phpstan-import-type EmailStatisticsDataShape from \HubspotSDK\Marketing\Emails\EmailStatisticsData
 *
 * @phpstan-type AggregateEmailStatisticsShape = array{
 *   aggregate?: null|EmailStatisticsData|EmailStatisticsDataShape,
 *   campaignAggregations?: array<string,EmailStatisticsDataShape>|null,
 *   emails?: list<int>|null,
 * }
 */
final class AggregateEmailStatistics implements BaseModel
{
    /** @use SdkModel<AggregateEmailStatisticsShape> */
    use SdkModel;

    #[Optional]
    public ?EmailStatisticsData $aggregate;

    /**
     * The aggregated statistics per campaign.
     *
     * @var array<string,EmailStatisticsData>|null $campaignAggregations
     */
    #[Optional(map: EmailStatisticsData::class)]
    public ?array $campaignAggregations;

    /**
     * List of email IDs that were sent during the time span.
     *
     * @var list<int>|null $emails
     */
    #[Optional(list: 'int')]
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
     * @param EmailStatisticsData|EmailStatisticsDataShape|null $aggregate
     * @param array<string,EmailStatisticsDataShape>|null $campaignAggregations
     * @param list<int>|null $emails
     */
    public static function with(
        EmailStatisticsData|array|null $aggregate = null,
        ?array $campaignAggregations = null,
        ?array $emails = null,
    ): self {
        $self = new self;

        null !== $aggregate && $self['aggregate'] = $aggregate;
        null !== $campaignAggregations && $self['campaignAggregations'] = $campaignAggregations;
        null !== $emails && $self['emails'] = $emails;

        return $self;
    }

    /**
     * @param EmailStatisticsData|EmailStatisticsDataShape $aggregate
     */
    public function withAggregate(EmailStatisticsData|array $aggregate): self
    {
        $self = clone $this;
        $self['aggregate'] = $aggregate;

        return $self;
    }

    /**
     * The aggregated statistics per campaign.
     *
     * @param array<string,EmailStatisticsDataShape> $campaignAggregations
     */
    public function withCampaignAggregations(array $campaignAggregations): self
    {
        $self = clone $this;
        $self['campaignAggregations'] = $campaignAggregations;

        return $self;
    }

    /**
     * List of email IDs that were sent during the time span.
     *
     * @param list<int> $emails
     */
    public function withEmails(array $emails): self
    {
        $self = clone $this;
        $self['emails'] = $emails;

        return $self;
    }
}
