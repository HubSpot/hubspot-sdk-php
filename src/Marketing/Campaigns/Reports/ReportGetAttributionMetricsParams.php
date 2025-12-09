<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Reports;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\ReportsService::getAttributionMetrics()
 *
 * @phpstan-type ReportGetAttributionMetricsParamsShape = array{
 *   endDate?: string, startDate?: string
 * }
 */
final class ReportGetAttributionMetricsParams implements BaseModel
{
    /** @use SdkModel<ReportGetAttributionMetricsParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $endDate = null,
        ?string $startDate = null
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $startDate && $self['startDate'] = $startDate;

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
