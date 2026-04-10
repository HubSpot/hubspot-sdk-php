<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\Metrics;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Fetch the list of contact IDs for the specified campaign and contact type.
 *
 * @see HubSpotSDK\Services\Marketing\Campaigns\MetricsService::listContactIDsByType()
 *
 * @phpstan-type MetricListContactIDsByTypeParamsShape = array{
 *   campaignGuid: string,
 *   after?: string|null,
 *   endDate?: string|null,
 *   limit?: int|null,
 *   startDate?: string|null,
 * }
 */
final class MetricListContactIDsByTypeParams implements BaseModel
{
    /** @use SdkModel<MetricListContactIDsByTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $campaignGuid;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $endDate;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $startDate;

    /**
     * `new MetricListContactIDsByTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetricListContactIDsByTypeParams::with(campaignGuid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetricListContactIDsByTypeParams)->withCampaignGuid(...)
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
     */
    public static function with(
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?int $limit = null,
        ?string $startDate = null,
    ): self {
        $self = new self;

        $self['campaignGuid'] = $campaignGuid;

        null !== $after && $self['after'] = $after;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    public function withCampaignGuid(string $campaignGuid): self
    {
        $self = clone $this;
        $self['campaignGuid'] = $campaignGuid;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
