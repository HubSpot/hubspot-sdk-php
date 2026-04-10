<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicIntegrationEventFilter\FilterType;

/**
 * @phpstan-import-type PublicEventFilterMetadataShape from \HubSpotSDK\Crm\Lists\PublicEventFilterMetadata
 *
 * @phpstan-type PublicIntegrationEventFilterShape = array{
 *   eventTypeID: int,
 *   filterLines: list<PublicEventFilterMetadata|PublicEventFilterMetadataShape>,
 *   filterType: FilterType|value-of<FilterType>,
 * }
 */
final class PublicIntegrationEventFilter implements BaseModel
{
    /** @use SdkModel<PublicIntegrationEventFilterShape> */
    use SdkModel;

    /**
     * The ID representing the type of event for the integration event filter.
     */
    #[Required('eventTypeId')]
    public int $eventTypeID;

    /** @var list<PublicEventFilterMetadata> $filterLines */
    #[Required(list: PublicEventFilterMetadata::class)]
    public array $filterLines;

    /**
     * Indicates the type of filter (INTEGRATION_EVENT).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new PublicIntegrationEventFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicIntegrationEventFilter::with(
     *   eventTypeID: ..., filterLines: ..., filterType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicIntegrationEventFilter)
     *   ->withEventTypeID(...)
     *   ->withFilterLines(...)
     *   ->withFilterType(...)
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
     * @param list<PublicEventFilterMetadata|PublicEventFilterMetadataShape> $filterLines
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        int $eventTypeID,
        array $filterLines,
        FilterType|string $filterType = 'INTEGRATION_EVENT',
    ): self {
        $self = new self;

        $self['eventTypeID'] = $eventTypeID;
        $self['filterLines'] = $filterLines;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * The ID representing the type of event for the integration event filter.
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<PublicEventFilterMetadata|PublicEventFilterMetadataShape> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $self = clone $this;
        $self['filterLines'] = $filterLines;

        return $self;
    }

    /**
     * Indicates the type of filter (INTEGRATION_EVENT).
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
