<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicPropertyAssociationInListFilter\FilterType;

/**
 * @phpstan-type public_property_association_in_list_filter = array{
 *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   filterType: value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   propertyWithObjectID: string,
 *   toObjectTypeID?: string,
 * }
 */
final class PublicPropertyAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<public_property_association_in_list_filter> */
    use SdkModel;

    #[Api]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api('listId')]
    public string $listID;

    #[Api]
    public string $operator;

    #[Api('propertyWithObjectId')]
    public string $propertyWithObjectID;

    #[Api('toObjectTypeId', optional: true)]
    public ?string $toObjectTypeID;

    /**
     * `new PublicPropertyAssociationInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicPropertyAssociationInListFilter::with(
     *   coalescingRefineBy: ...,
     *   filterType: ...,
     *   listID: ...,
     *   operator: ...,
     *   propertyWithObjectID: ...,
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listID,
        string $operator,
        string $propertyWithObjectID,
        FilterType|string $filterType = 'PROPERTY_ASSOCIATION',
        ?string $toObjectTypeID = null,
    ): self {
        $obj = new self;

        $obj->coalescingRefineBy = $coalescingRefineBy;
        $obj['filterType'] = $filterType;
        $obj->listID = $listID;
        $obj->operator = $operator;
        $obj->propertyWithObjectID = $propertyWithObjectID;

        null !== $toObjectTypeID && $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

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
        $obj->listID = $listID;

        return $obj;
    }

    public function withOperator(string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator;

        return $obj;
    }

    public function withPropertyWithObjectID(string $propertyWithObjectID): self
    {
        $obj = clone $this;
        $obj->propertyWithObjectID = $propertyWithObjectID;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }
}
