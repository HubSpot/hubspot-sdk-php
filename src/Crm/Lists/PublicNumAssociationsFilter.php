<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicNumAssociationsFilter\FilterType;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubspotSDK\Crm\Lists\PublicNumAssociationsFilter\CoalescingRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\Crm\Lists\PublicNumAssociationsFilter\CoalescingRefineBy
 *
 * @phpstan-type PublicNumAssociationsFilterShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   coalescingRefineBy: CoalescingRefineByShape,
 *   filterType: FilterType|value-of<FilterType>,
 * }
 */
final class PublicNumAssociationsFilter implements BaseModel
{
    /** @use SdkModel<PublicNumAssociationsFilterShape> */
    use SdkModel;

    /**
     * Defines the category of the association (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
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
    #[Required]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy;

    /**
     * Indicates the type of filter being applied (NUM_ASSOCIATIONS).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * `new PublicNumAssociationsFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicNumAssociationsFilter::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   coalescingRefineBy: ...,
     *   filterType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicNumAssociationsFilter)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withCoalescingRefineBy(...)
     *   ->withFilterType(...)
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
        FilterType|string $filterType = 'NUM_ASSOCIATIONS',
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;
        $self['coalescingRefineBy'] = $coalescingRefineBy;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * Defines the category of the association (HUBSPOT_DEFINED, USER_DEFINED, INTEGRATOR_DEFINED, WORK).
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
     * Indicates the type of filter being applied (NUM_ASSOCIATIONS).
     *
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }
}
