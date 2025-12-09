<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicEventAnalyticsFilter\FilterType;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;
use HubspotSDK\PublicTimePointOperation\OperationType;

/**
 * @phpstan-type PublicEventAnalyticsFilterShape = array{
 *   eventID: string,
 *   filterType: value-of<FilterType>,
 *   operator: string,
 *   coalescingRefineBy?: null|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   pruningRefineBy?: null|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicEventAnalyticsFilter implements BaseModel
{
    /** @use SdkModel<PublicEventAnalyticsFilterShape> */
    use SdkModel;

    #[Required('eventId')]
    public string $eventID;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public string $operator;

    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    #[Optional]
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
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $coalescingRefineBy
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $pruningRefineBy
     */
    public static function with(
        string $eventID,
        string $operator,
        FilterType|string $filterType = 'EVENT',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['eventID'] = $eventID;
        $self['filterType'] = $filterType;
        $self['operator'] = $operator;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    public function withEventID(string $eventID): self
    {
        $self = clone $this;
        $self['eventID'] = $eventID;

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

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    /**
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $pruningRefineBy
     */
    public function withPruningRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $self = clone $this;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }
}
