<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicCampaignInfluencedFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_campaign_influenced_filter = array{
 *   campaignID: string, filterType: value-of<FilterType>
 * }
 */
final class AutomationPublicCampaignInfluencedFilter implements BaseModel
{
    /** @use SdkModel<automation_public_campaign_influenced_filter> */
    use SdkModel;

    #[Api('campaignId')]
    public string $campaignID;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new AutomationPublicCampaignInfluencedFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicCampaignInfluencedFilter::with(campaignID: ..., filterType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicCampaignInfluencedFilter)
     *   ->withCampaignID(...)
     *   ->withFilterType(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $campaignID,
        FilterType|string $filterType = 'CAMPAIGN_INFLUENCED'
    ): self {
        $obj = new self;

        $obj->campaignID = $campaignID;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignID = $campaignID;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }
}
