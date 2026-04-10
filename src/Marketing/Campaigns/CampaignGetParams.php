<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get a campaign identified by a specific campaignGuid with the given properties. Along with the campaign information, it also returns information about assets. Depending on the query parameters used, this can also be used to return information about the corresponding assets' metrics. Metrics are available only if startDate and endDate are provided.
 *
 * @see HubSpotSDK\Services\Marketing\CampaignsService::get()
 *
 * @phpstan-type CampaignGetParamsShape = array{
 *   endDate?: string|null, properties?: list<string>|null, startDate?: string|null
 * }
 */
final class CampaignGetParams implements BaseModel
{
    /** @use SdkModel<CampaignGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $endDate;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

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
     *
     * @param list<string>|null $properties
     */
    public static function with(
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $properties && $self['properties'] = $properties;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
