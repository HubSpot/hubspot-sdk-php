<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_unified_events_filter = array{
 *   filterLines: list<AutomationPublicEventFilterMetadata>,
 *   filterType: value-of<FilterType>,
 *   coalescingRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 *   eventTypeID?: string,
 *   pruningRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 * }
 */
final class AutomationPublicUnifiedEventsFilter implements BaseModel
{
    /** @use SdkModel<automation_public_unified_events_filter> */
    use SdkModel;

    /** @var list<AutomationPublicEventFilterMetadata> $filterLines */
    #[Api(list: AutomationPublicEventFilterMetadata::class)]
    public array $filterLines;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy;

    #[Api('eventTypeId', optional: true)]
    public ?string $eventTypeID;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new AutomationPublicUnifiedEventsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicUnifiedEventsFilter::with(filterLines: ..., filterType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicUnifiedEventsFilter)
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
     * @param list<AutomationPublicEventFilterMetadata> $filterLines
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        array $filterLines,
        FilterType|string $filterType = 'UNIFIED_EVENTS',
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?string $eventTypeID = null,
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj->filterLines = $filterLines;
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;

        null !== $coalescingRefineBy && $obj->coalescingRefineBy = $coalescingRefineBy;
        null !== $eventTypeID && $obj->eventTypeID = $eventTypeID;
        null !== $pruningRefineBy && $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }

    /**
     * @param list<AutomationPublicEventFilterMetadata> $filterLines
     */
    public function withFilterLines(array $filterLines): self
    {
        $obj = clone $this;
        $obj->filterLines = $filterLines;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;

        return $obj;
    }

    public function withCoalescingRefineBy(
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $obj = clone $this;
        $obj->eventTypeID = $eventTypeID;

        return $obj;
    }

    public function withPruningRefineBy(
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $obj = clone $this;
        $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }
}
