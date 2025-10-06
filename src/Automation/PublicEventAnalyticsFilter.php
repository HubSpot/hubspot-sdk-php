<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\PublicEventAnalyticsFilter\FilterType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_event_analytics_filter = array{
 *   eventID: string,
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicEventAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<public_event_analytics_filter> */
    use SdkModel;

    #[Api('eventId')]
    public string $eventID;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    #[Api(optional: true)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicEventAnalyticsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicEventAnalyticsFilter::with(eventID: ..., filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicEventAnalyticsFilter)
     *   ->withEventID(...)
     *   ->withFilterType(...)
     *   ->withOperator(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $eventID,
        string $operator,
        FilterType|string $filterType = 'EVENT',
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj->eventID = $eventID;
        $obj['filterType'] = $filterType;
        $obj->operator = $operator;

        null !== $coalescingRefineBy && $obj->coalescingRefineBy = $coalescingRefineBy;
        null !== $pruningRefineBy && $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }

    public function withEventID(string $eventID): self
    {
        $obj = clone $this;
        $obj->eventID = $eventID;

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

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }

    public function withPruningRefineBy(
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $obj = clone $this;
        $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }
}
