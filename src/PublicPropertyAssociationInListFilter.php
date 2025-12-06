<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;
use HubspotSDK\PublicPropertyAssociationInListFilter\FilterType;
use HubspotSDK\PublicTimePointOperation\OperationType;

/**
 * @phpstan-type PublicPropertyAssociationInListFilterShape = array{
 *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   filterType: value-of<FilterType>,
 *   listId: string,
 *   operator: string,
 *   propertyWithObjectId: string,
 *   toObjectTypeId?: string|null,
 * }
 */
final class PublicPropertyAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<PublicPropertyAssociationInListFilterShape> */
    use SdkModel;

    #[Api]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $listId;

    #[Api]
    public string $operator;

    #[Api]
    public string $propertyWithObjectId;

    #[Api(optional: true)]
    public ?string $toObjectTypeId;

    /**
     * `new PublicPropertyAssociationInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyAssociationInListFilter::with(
     *   coalescingRefineBy: ...,
     *   filterType: ...,
     *   listId: ...,
     *   operator: ...,
     *   propertyWithObjectId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicPropertyAssociationInListFilter)
     *   ->withCoalescingRefineBy(...)
     *   ->withFilterType(...)
     *   ->withListID(...)
     *   ->withOperator(...)
     *   ->withPropertyWithObjectID(...)
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
     * } $coalescingRefineBy
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listId,
        string $operator,
        string $propertyWithObjectId,
        FilterType|string $filterType = 'PROPERTY_ASSOCIATION',
        ?string $toObjectTypeId = null,
    ): self {
        $obj = new self;

        $obj['coalescingRefineBy'] = $coalescingRefineBy;
        $obj['filterType'] = $filterType;
        $obj['listId'] = $listId;
        $obj['operator'] = $operator;
        $obj['propertyWithObjectId'] = $propertyWithObjectId;

        null !== $toObjectTypeId && $obj['toObjectTypeId'] = $toObjectTypeId;

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
     * } $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj['coalescingRefineBy'] = $coalescingRefineBy;

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

    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    public function withPropertyWithObjectID(string $propertyWithObjectID): self
    {
        $obj = clone $this;
        $obj['propertyWithObjectId'] = $propertyWithObjectID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }
}
