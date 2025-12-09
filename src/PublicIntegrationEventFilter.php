<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicIntegrationEventFilter\FilterType;

/**
 * @phpstan-type PublicIntegrationEventFilterShape = array{
 *   eventTypeID: int,
 *   filterLines: list<PublicEventFilterMetadata>,
 *   filterType: value-of<FilterType>,
 * }
 */
final class PublicIntegrationEventFilter implements BaseModel
{
    /** @use SdkModel<PublicIntegrationEventFilterShape> */
    use SdkModel;

    #[Required('eventTypeId')]
    public int $eventTypeID;

    /** @var list<PublicEventFilterMetadata> $filterLines */
    #[Required(list: PublicEventFilterMetadata::class)]
    public array $filterLines;

    /** @var value-of<FilterType> $filterType */
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
     * @param list<PublicEventFilterMetadata|array{
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }> $filterLines
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

    public function withEventTypeID(int $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * @param list<PublicEventFilterMetadata|array{
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $self = clone $this;
        $self['filterLines'] = $filterLines;

        return $self;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }
}
