<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicPropertyAssociationInListFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicPropertyAssociationInListFilter\CoalescingRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicPropertyAssociationInListFilter\CoalescingRefineBy
 *
 * @phpstan-type PublicPropertyAssociationInListFilterShape = array{
 *   coalescingRefineBy: CoalescingRefineByShape,
 *   filterType: FilterType|value-of<FilterType>,
 *   listID: string,
 *   operator: string,
 *   propertyWithObjectID: string,
 *   toObjectTypeID?: string|null,
 * }
 */
final class PublicPropertyAssociationInListFilter implements BaseModel
{
    /** @use SdkModel<PublicPropertyAssociationInListFilterShape> */
    use SdkModel;

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants $coalescingRefineBy
     */
    #[Required]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /**
     * Indicates the type of filter being applied (PROPERTY_ASSOCIATION).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * The ID of the list used in the property association filter.
     */
    #[Required('listId')]
    public string $listID;

    /**
     * Defines the operation to be applied by the filter (IN_LIST, NOT_IN_LIST).
     */
    #[Required]
    public string $operator;

    /**
     * The property associated with the object ID in the filter.
     */
    #[Required('propertyWithObjectId')]
    public string $propertyWithObjectID;

    /**
     * The ID representing the type of object that the property association filter is targeting.
     */
    #[Optional('toObjectTypeId')]
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
     * @param CoalescingRefineByShape $coalescingRefineBy
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
        string $listID,
        string $operator,
        string $propertyWithObjectID,
        FilterType|string $filterType = 'PROPERTY_ASSOCIATION',
        ?string $toObjectTypeID = null,
    ): self {
        $self = new self;

        $self['coalescingRefineBy'] = $coalescingRefineBy;
        $self['filterType'] = $filterType;
        $self['listID'] = $listID;
        $self['operator'] = $operator;
        $self['propertyWithObjectID'] = $propertyWithObjectID;

        null !== $toObjectTypeID && $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * Specifies the criteria for refining the filter by coalescing.
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
     * Indicates the type of filter being applied (PROPERTY_ASSOCIATION).
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
     * The ID of the list used in the property association filter.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * Defines the operation to be applied by the filter (IN_LIST, NOT_IN_LIST).
     */
    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * The property associated with the object ID in the filter.
     */
    public function withPropertyWithObjectID(string $propertyWithObjectID): self
    {
        $self = clone $this;
        $self['propertyWithObjectID'] = $propertyWithObjectID;

        return $self;
    }

    /**
     * The ID representing the type of object that the property association filter is targeting.
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }
}
