<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Reports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch revenue attribution report data for a specified campaign.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\ReportsService::getRevenueAttribution()
 *
 * @phpstan-type ReportGetRevenueAttributionParamsShape = array{
 *   attributionModel?: string|null, endDate?: string|null, startDate?: string|null
 * }
 */
final class ReportGetRevenueAttributionParams implements BaseModel
{
    /** @use SdkModel<ReportGetRevenueAttributionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Allowed values: LINEAR, FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED, TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED
     * Default value: LINEAR.
     */
    #[Optional]
    public ?string $attributionModel;

    /**
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
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
     * Allowed values: LINEAR, FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED, TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED
     * Default value: LINEAR.
     */
    public function withAttributionModel(string $attributionModel): self
    {
        $self = clone $this;
        $self['attributionModel'] = $attributionModel;

        return $self;
    }

    /**
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
