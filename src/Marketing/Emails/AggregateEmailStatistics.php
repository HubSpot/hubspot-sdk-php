<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailStatisticsDataShape from \HubSpotSDK\Marketing\Emails\EmailStatisticsData
 *
 * @phpstan-type AggregateEmailStatisticsShape = array{
 *   aggregate: EmailStatisticsData|EmailStatisticsDataShape,
 *   campaignAggregations: array<string,EmailStatisticsData|EmailStatisticsDataShape>,
 *   emails: list<int>,
 * }
 */
final class AggregateEmailStatistics implements BaseModel
{
    /** @use SdkModel<AggregateEmailStatisticsShape> */
    use SdkModel;

    #[Required]
    public EmailStatisticsData $aggregate;

    /**
     * The aggregated statistics per campaign.
     *
     * @var array<string,EmailStatisticsData> $campaignAggregations
     */
    #[Required(map: EmailStatisticsData::class)]
    public array $campaignAggregations;

    /**
     * List of email IDs that were sent during the time span.
     *
     * @var list<int> $emails
     */
    #[Required(list: 'int')]
    public array $emails;

    /**
     * `new AggregateEmailStatistics()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AggregateEmailStatistics::with(
     *   aggregate: ..., campaignAggregations: ..., emails: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AggregateEmailStatistics)
     *   ->withAggregate(...)
     *   ->withCampaignAggregations(...)
     *   ->withEmails(...)
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
     * @param EmailStatisticsData|EmailStatisticsDataShape $aggregate
     * @param array<string,EmailStatisticsData|EmailStatisticsDataShape> $campaignAggregations
     * @param list<int> $emails
     */
    public static function with(
        EmailStatisticsData|array $aggregate,
        array $campaignAggregations,
        array $emails,
    ): self {
        $self = new self;

        $self['aggregate'] = $aggregate;
        $self['campaignAggregations'] = $campaignAggregations;
        $self['emails'] = $emails;

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
     * @param array<string,EmailStatisticsData|EmailStatisticsDataShape> $campaignAggregations
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
