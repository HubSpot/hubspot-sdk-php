<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicCampaignInfluencedFilter\FilterType;

/**
 * @phpstan-type PublicCampaignInfluencedFilterShape = array{
 *   campaignId: string, filterType: value-of<FilterType>
 * }
 */
final class PublicCampaignInfluencedFilter implements BaseModel
{
    /** @use SdkModel<PublicCampaignInfluencedFilterShape> */
    use SdkModel;

    #[Api]
    public string $campaignId;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new PublicCampaignInfluencedFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCampaignInfluencedFilter::with(campaignId: ..., filterType: ...)
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
        string $campaignId,
        FilterType|string $filterType = 'CAMPAIGN_INFLUENCED'
    ): self {
        $obj = new self;

        $obj->campaignId = $campaignId;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignId = $campaignID;

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
