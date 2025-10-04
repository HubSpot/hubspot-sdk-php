<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type marketing_emails_aggregate_email_statistics = array{
 *   aggregate?: MarketingEmailsEmailStatisticsData,
 *   campaignAggregations?: array<string, MarketingEmailsEmailStatisticsData>,
 *   emails?: list<int>,
 * }
 */
final class MarketingEmailsAggregateEmailStatistics implements BaseModel, ResponseConverter
{
    /** @use SdkModel<marketing_emails_aggregate_email_statistics> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MarketingEmailsEmailStatisticsData $aggregate;

    /**
     * @var array<string,
     * MarketingEmailsEmailStatisticsData,>|null $campaignAggregations
     */
    #[Api(map: MarketingEmailsEmailStatisticsData::class, optional: true)]
    public ?array $campaignAggregations;

    /** @var list<int>|null $emails */
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
     * @param array<string, MarketingEmailsEmailStatisticsData> $campaignAggregations
     * @param list<int> $emails
     */
    public static function with(
        ?MarketingEmailsEmailStatisticsData $aggregate = null,
        ?array $campaignAggregations = null,
        ?array $emails = null,
    ): self {
        $obj = new self;

        null !== $aggregate && $obj->aggregate = $aggregate;
        null !== $campaignAggregations && $obj->campaignAggregations = $campaignAggregations;
        null !== $emails && $obj->emails = $emails;

        return $obj;
    }

    public function withAggregate(
        MarketingEmailsEmailStatisticsData $aggregate
    ): self {
        $obj = clone $this;
        $obj->aggregate = $aggregate;

        return $obj;
    }

    /**
     * @param array<string, MarketingEmailsEmailStatisticsData> $campaignAggregations
     */
    public function withCampaignAggregations(array $campaignAggregations): self
    {
        $obj = clone $this;
        $obj->campaignAggregations = $campaignAggregations;

        return $obj;
    }

    /**
     * @param list<int> $emails
     */
    public function withEmails(array $emails): self
    {
        $obj = clone $this;
        $obj->emails = $emails;

        return $obj;
    }
}
