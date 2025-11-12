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
 *   associationTypeId: int,
 *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   filterType: value-of<FilterType>,
 *   listId: string,
 *   operator: string,
 *   toObjectType?: string|null,
 *   toObjectTypeId?: string|null,
 * }
 */
final class PublicAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<PublicAssociationInListFilterShape> */
    use SdkModel;

    #[Api]
    public string $associationCategory;

    #[Api]
    public int $associationTypeId;

    #[Api]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $listId;

    #[Api]
    public string $operator;

    #[Api(optional: true)]
    public ?string $toObjectType;

    #[Api(optional: true)]
    public ?string $toObjectTypeId;

    /**
     * `new PublicAssociationInListFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationInListFilter::with(
     *   associationCategory: ...,
     *   associationTypeId: ...,
     *   coalescingRefineBy: ...,
     *   filterType: ...,
     *   listId: ...,
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
        int $associationTypeId,
        PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listId,
        string $operator,
        FilterType|string $filterType = 'ASSOCIATION',
        ?string $toObjectType = null,
        ?string $toObjectTypeId = null,
    ): self {
        $obj = new self;

        $obj->associationCategory = $associationCategory;
        $obj->associationTypeId = $associationTypeId;
        $obj->coalescingRefineBy = $coalescingRefineBy;
        $obj['filterType'] = $filterType;
        $obj->listId = $listId;
        $obj->operator = $operator;

        null !== $toObjectType && $obj->toObjectType = $toObjectType;
        null !== $toObjectTypeId && $obj->toObjectTypeId = $toObjectTypeId;

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
        $obj->associationTypeId = $associationTypeID;

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
        $obj->listId = $listID;

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
        $obj->toObjectTypeId = $toObjectTypeID;

        return $obj;
    }
}
