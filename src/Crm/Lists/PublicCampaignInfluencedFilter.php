<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicCampaignInfluencedFilter\FilterType;

/**
 * @phpstan-type PublicCampaignInfluencedFilterShape = array{
 *   campaignID: string, filterType: FilterType|value-of<FilterType>
 * }
 */
final class PublicCampaignInfluencedFilter implements BaseModel
{
    /** @use SdkModel<PublicCampaignInfluencedFilterShape> */
    use SdkModel;

    /**
     * The ID of the campaign that influences the filter.
     */
    #[Required('campaignId')]
    public string $campaignID;

    /**
     * Indicates the type of filter (CAMPAIGN_INFLUENCED).
     *
     * @var value-of<FilterType> $filterType
     */
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
        $self = new self;

        $self['campaignID'] = $campaignID;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * The ID of the campaign that influences the filter.
     */
    public function withCampaignID(string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * Indicates the type of filter (CAMPAIGN_INFLUENCED).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }
}
