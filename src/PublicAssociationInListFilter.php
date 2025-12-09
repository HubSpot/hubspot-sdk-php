<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAssociationInListFilter\FilterType;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;
use HubspotSDK\PublicTimePointOperation\OperationType;

/**
 * @phpstan-type PublicAssociationInListFilterShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   filterType: value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   toObjectType?: string|null,
 *   toObjectTypeID?: string|null,
 * }
 */
final class PublicAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<PublicAssociationInListFilterShape> */
    use SdkModel;

    #[Required]
    public string $associationCategory;

    #[Required('associationTypeId')]
    public int $associationTypeID;

    #[Required]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    #[Required('listId')]
    public string $listID;

    #[Required]
    public string $operator;

    #[Optional]
    public ?string $toObjectType;

    #[Optional('toObjectTypeId')]
    public ?string $toObjectTypeID;

    /**
     * `new PublicAssociationInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationInListFilter::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   coalescingRefineBy: ...,
     *   filterType: ...,
     *   listID: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationInListFilter)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withCoalescingRefineBy(...)
     *   ->withFilterType(...)
     *   ->withListID(...)
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
        string $associationCategory,
        int $associationTypeID,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listID,
        string $operator,
        FilterType|string $filterType = 'ASSOCIATION',
        ?string $toObjectType = null,
        ?string $toObjectTypeID = null,
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;
        $self['coalescingRefineBy'] = $coalescingRefineBy;
        $self['filterType'] = $filterType;
        $self['listID'] = $listID;
        $self['operator'] = $operator;

        null !== $toObjectType && $self['toObjectType'] = $toObjectType;
        null !== $toObjectTypeID && $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    public function withAssociationCategory(string $associationCategory): self
    {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
