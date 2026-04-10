<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Metrics;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\MetricsService::getAttributionMetrics()
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

    #[Optional]
    public ?string $endDate;

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

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
