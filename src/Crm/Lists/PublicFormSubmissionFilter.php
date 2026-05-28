<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\CoalescingRefineBy;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\FilterType;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\Operator;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\PruningRefineBy;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\PruningRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionFilter\PruningRefineBy
 *
 * @phpstan-type PublicFormSubmissionFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: Operator|value-of<Operator>,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   formID?: string|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicFormSubmissionFilter implements BaseModel
{
    /** @use SdkModel<PublicFormSubmissionFilterShape> */
    use SdkModel;

    /**
     * Indicates the type of filter (FORM_SUBMISSION).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the operation to be performed (FILLED_OUT, NOT_FILLED_OUT).
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /**
     * Specifies the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional(union: CoalescingRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * The ID of the form used in the filter.
     */
    #[Optional('formId')]
    public ?string $formID;

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @var PruningRefineByVariants|null $pruningRefineBy
     */
    #[Optional(union: PruningRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new PublicFormSubmissionFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFormSubmissionFilter::with(filterType: ..., operator: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFormSubmissionFilter)->withFilterType(...)->withOperator(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param FilterType|value-of<FilterType> $filterType
     * @param CoalescingRefineByShape|null $coalescingRefineBy
     * @param PruningRefineByShape|null $pruningRefineBy
     */
    public static function with(
        Operator|string $operator,
        FilterType|string $filterType = 'FORM_SUBMISSION',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?string $formID = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $formID && $self['formID'] = $formID;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * Indicates the type of filter (FORM_SUBMISSION).
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
     * Specifies the operation to be performed (FILLED_OUT, NOT_FILLED_OUT).
     *
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

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
     * The ID of the form used in the filter.
     */
    public function withFormID(string $formID): self
    {
        $self = clone $this;
        $self['formID'] = $formID;

        return $self;
    }

    /**
     * Specifies the criteria for refining the filter by pruning.
     *
     * @param PruningRefineByShape $pruningRefineBy
     */
    public function withPruningRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $self = clone $this;
        $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }
}
