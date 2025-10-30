<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAssociationInListFilter\FilterType;

/**
 * @phpstan-type PublicAssociationInListFilterShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   filterType: value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   toObjectType?: string,
 *   toObjectTypeID?: string,
 * }
 */
final class PublicAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<PublicAssociationInListFilterShape> */
    use SdkModel;

    #[Api]
    public string $associationCategory;

    #[Api('associationTypeId')]
    public int $associationTypeID;

    #[Api]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api('listId')]
    public string $listID;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?string $toObjectType;

    #[Api('toObjectTypeId', optional: true)]
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $associationCategory,
        int $associationTypeID,
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listID,
        string $operator,
        FilterType|string $filterType = 'ASSOCIATION',
        ?string $toObjectType = null,
        ?string $toObjectTypeID = null,
    ): self {
        $obj = new self;

        $obj->associationCategory = $associationCategory;
        $obj->associationTypeID = $associationTypeID;
        $obj->coalescingRefineBy = $coalescingRefineBy;
        $obj['filterType'] = $filterType;
        $obj->listID = $listID;
        $obj->operator = $operator;

        null !== $toObjectType && $obj->toObjectType = $toObjectType;
        null !== $toObjectTypeID && $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }

    public function withAssociationCategory(string $associationCategory): self
    {
        $obj = clone $this;
        $obj->associationCategory = $associationCategory;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

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

    public function withToObjectType(string $toObjectType): self
    {
        $obj = clone $this;
        $obj->toObjectType = $toObjectType;

        return $obj;
    }

    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj->toObjectTypeID = $toObjectTypeID;

        return $obj;
    }
}
