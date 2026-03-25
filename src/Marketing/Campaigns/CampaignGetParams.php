<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Read a campaign identified by a specified internal ID. This endpoint allows you to retrieve detailed information about a specific marketing campaign using its unique identifier. It supports filtering the response by specific properties and date ranges.
 *
 * @see HubspotSDK\Services\Marketing\CampaignsService::get()
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

    /**
     * The end date for filtering campaign data, in YYYY-MM-DD format.
     */
    #[Optional]
    public ?string $endDate;

    /**
     * A comma-separated list of property names to include in the response.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * The start date for filtering campaign data, in YYYY-MM-DD format.
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

    /**
     * The end date for filtering campaign data, in YYYY-MM-DD format.
     */
    public function withEndDate(string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * A comma-separated list of property names to include in the response.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The start date for filtering campaign data, in YYYY-MM-DD format.
     */
    public function withStartDate(string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
