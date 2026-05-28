<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicAssociationInListFilter\CoalescingRefineBy;
use HubSpotSDK\Crm\Lists\PublicAssociationInListFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicAssociationInListFilter\CoalescingRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicAssociationInListFilter\CoalescingRefineBy
 *
 * @phpstan-type PublicAssociationInListFilterShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   coalescingRefineBy: CoalescingRefineByShape,
 *   filterType: FilterType|value-of<FilterType>,
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

    /**
     * Defines the category of the association, such as (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
     */
    #[Required]
    public string $associationCategory;

    /**
     * The ID representing the type of association being filtered.
     */
    #[Required('associationTypeId')]
    public int $associationTypeID;

    /**
     * Specifies the criteria for refining the association filter.
     *
     * @var CoalescingRefineByVariants $coalescingRefineBy
     */
    #[Required(union: CoalescingRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /**
     * Indicates the type of filter being applied, which is 'ASSOCIATION' by default.
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * The ID of the list used in the association filter.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * Specifies the operation to be performed by the filter, such as 'IN_LIST' or 'NOT_IN_LIST'.
     */
    #[Required]
    public string $operator;

    /**
     * The type of object that the association filter is targeting.
     */
    #[Optional]
    public ?string $toObjectType;

    /**
     * The ID representing the type of object that the association filter is targeting.
     */
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
     * @param CoalescingRefineByShape $coalescingRefineBy
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

    /**
     * Defines the category of the association, such as (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
     */
    public function withAssociationCategory(string $associationCategory): self
    {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    /**
     * The ID representing the type of association being filtered.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    /**
     * Specifies the criteria for refining the association filter.
     *
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    /**
     * Indicates the type of filter being applied, which is 'ASSOCIATION' by default.
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * The ID of the list used in the association filter.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * Specifies the operation to be performed by the filter, such as 'IN_LIST' or 'NOT_IN_LIST'.
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The type of object that the association filter is targeting.
     */
    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    /**
     * The ID representing the type of object that the association filter is targeting.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
