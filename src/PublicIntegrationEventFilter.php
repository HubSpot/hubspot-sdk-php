<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicIntegrationEventFilter\FilterType;

/**
 * @phpstan-type PublicIntegrationEventFilterShape = array{
 *   eventTypeId: int,
 *   filterLines: list<PublicEventFilterMetadata>,
 *   filterType: value-of<FilterType>,
 * }
 */
final class PublicIntegrationEventFilter implements BaseModel
{
    /** @use SdkModel<PublicIntegrationEventFilterShape> */
    use SdkModel;

    #[Api]
    public int $eventTypeId;

    /** @var list<PublicEventFilterMetadata> $filterLines */
    #[Api(list: PublicEventFilterMetadata::class)]
    public array $filterLines;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new PublicIntegrationEventFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicIntegrationEventFilter::with(
     *   eventTypeId: ..., filterLines: ..., filterType: ...
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
        int $eventTypeId,
        array $filterLines,
        FilterType|string $filterType = 'INTEGRATION_EVENT',
    ): self {
        $obj = new self;

        $obj['eventTypeId'] = $eventTypeId;
        $obj['filterLines'] = $filterLines;
        $obj['filterType'] = $filterType;

        return $obj;
    }

    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj['eventTypeId'] = $eventTypeID;

        return $obj;
    }

    /**
     * @param list<PublicEventFilterMetadata|array{
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $obj = clone $this;
        $obj['filterLines'] = $filterLines;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj['filterType'] = $filterType;

        return $obj;
    }
}
