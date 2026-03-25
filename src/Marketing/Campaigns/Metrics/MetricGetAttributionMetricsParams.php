<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\Metrics;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Fetch the metrics for a specific marketing campaign using its unique identifier. This endpoint allows you to retrieve various performance metrics of the campaign, which can be useful for analyzing the effectiveness of your marketing efforts over a specified time period.
 *
 * @see HubspotSDK\Services\Marketing\Campaigns\MetricsService::getAttributionMetrics()
 *
 * @phpstan-type MetricGetAttributionMetricsParamsShape = array{
 *   endDate?: string|null, startDate?: string|null
 * }
 */
final class MetricGetAttributionMetricsParams implements BaseModel
{
    /** @use SdkModel<MetricGetAttributionMetricsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The end date for fetching metrics, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * The start date for fetching metrics, in YYYY-MM-DD format.
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
     * The end date for fetching metrics, in YYYY-MM-DD format.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The start date for fetching metrics, in YYYY-MM-DD format.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
