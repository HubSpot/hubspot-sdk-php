<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAdsTimeFilter\FilterType;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;
use HubspotSDK\PublicTimePointOperation\OperationType;

/**
 * @phpstan-type PublicAdsTimeFilterShape = array{
 *   filterType: value-of<FilterType>,
 *   pruningRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicAdsTimeFilter implements BaseModel
{
    /** @use SdkModel<PublicAdsTimeFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy;

    /**
     * `new PublicAdsTimeFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAdsTimeFilter::with(filterType: ..., pruningRefineBy: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAdsTimeFilter)->withFilterType(...)->withPruningRefineBy(...)
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
        FilterType|string $filterType = 'ADS_TIME',
    ): self {
        $obj = new self;

        $obj['filterType'] = $filterType;
        $obj['pruningRefineBy'] = $pruningRefineBy;

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
        $obj = clone $this;
        $obj['pruningRefineBy'] = $pruningRefineBy;

        return $obj;
    }
}
