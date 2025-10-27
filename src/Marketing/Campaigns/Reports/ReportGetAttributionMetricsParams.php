<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Reports;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
 *
 * @see HubspotSDK\Marketing\Campaigns\Reports->getAttributionMetrics
 *
 * @phpstan-type report_get_attribution_metrics_params = array{
 *   endDate?: string, startDate?: string
 * }
 */
final class ReportGetAttributionMetricsParams implements BaseModel
{
    /** @use SdkModel<report_get_attribution_metrics_params> */
    use SdkModel;
    use SdkParams;

    /**
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    #[Api(optional: true)]
    public ?string $endDate;

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $endDate && $obj->endDate = $endDate;
        null !== $startDate && $obj->startDate = $startDate;

        return $obj;
    }

    /**
     * End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date.
     */
    public function withEndDate(string $endDate): self
    {
        $obj = clone $this;
        $obj->endDate = $endDate;

        return $obj;
    }

    /**
     * The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01.
     */
    public function withStartDate(string $startDate): self
    {
        $obj = clone $this;
        $obj->startDate = $startDate;

        return $obj;
    }
}
