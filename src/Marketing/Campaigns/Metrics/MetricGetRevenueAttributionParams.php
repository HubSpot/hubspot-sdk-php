<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Metrics;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Fetch revenue attribution report data for a specified campaign.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\MetricsService::getRevenueAttribution()
 *
 * @phpstan-type MetricGetRevenueAttributionParamsShape = array{
 *   attributionModel?: string|null, endDate?: string|null, startDate?: string|null
 * }
 */
final class MetricGetRevenueAttributionParams implements BaseModel
{
    /** @use SdkModel<MetricGetRevenueAttributionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The revenue attribution model used to calculate deal revenue credit. Defaults to LINEAR if not specified. Enum values: LINEAR,            FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED,          TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED.
     */
    #[Optional]
    public ?string $attributionModel;

    /**
     * End date to fetch attribution data, YYYY-MM-DD.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * Start date to fetch attribution data, YYYY-MM-DD.
     */
    #[Optional]
    public ?string $startDate;

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
        ?string $attributionModel = null,
        ?string $endDate = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        null !== $attributionModel && $self['attributionModel'] = $attributionModel;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * The revenue attribution model used to calculate deal revenue credit. Defaults to LINEAR if not specified. Enum values: LINEAR,            FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED,          TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED.
     */
    public function withAttributionModel(string $attributionModel): self
    {
        $self = clone $this;
        $self['attributionModel'] = $attributionModel;

        return $self;
    }

    /**
     * End date to fetch attribution data, YYYY-MM-DD.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Start date to fetch attribution data, YYYY-MM-DD.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
