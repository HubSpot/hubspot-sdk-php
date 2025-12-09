<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicCampaignInfluencedFilter\FilterType;

/**
 * @phpstan-type PublicCampaignInfluencedFilterShape = array{
 *   campaignID: string, filterType: value-of<FilterType>
 * }
 */
final class PublicCampaignInfluencedFilter implements BaseModel
{
    /** @use SdkModel<PublicCampaignInfluencedFilterShape> */
    use SdkModel;

    #[Required('campaignId')]
    public string $campaignID;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new PublicCampaignInfluencedFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignInfluencedFilter::with(campaignID: ..., filterType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCampaignInfluencedFilter)->withCampaignID(...)->withFilterType(...)
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

        $obj['campaignID'] = $campaignID;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignID'] = $campaignID;

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
