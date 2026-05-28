<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\CoalescingRefineBy;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\FilterType;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\Operator;
use HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\PruningRefineBy;

/**
 * @phpstan-import-type CoalescingRefineByVariants from \HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByVariants from \HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\PruningRefineBy
 * @phpstan-import-type CoalescingRefineByShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubSpotSDK\Crm\Lists\PublicFormSubmissionOnPageFilter\PruningRefineBy
 *
 * @phpstan-type PublicFormSubmissionOnPageFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: Operator|value-of<Operator>,
 *   pageID: string,
 *   coalescingRefineBy?: CoalescingRefineByShape|null,
 *   formID?: string|null,
 *   pruningRefineBy?: PruningRefineByShape|null,
 * }
 */
final class PublicFormSubmissionOnPageFilter implements BaseModel
{
    /** @use SdkModel<PublicFormSubmissionOnPageFilterShape> */
    use SdkModel;

    /**
     * Indicates the type of filter (FORM_SUBMISSION_ON_PAGE).
     *
     * @var value-of<FilterType> $filterType
     */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /**
     * Specifies the operation to be applied (FILLED_OUT, NOT_FILLED_OUT).
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /**
     * The ID of the page where the form submission occurred.
     */
    #[Required('pageId')]
    public string $pageID;

    /**
     * Defines the criteria for refining the filter by coalescing.
     *
     * @var CoalescingRefineByVariants|null $coalescingRefineBy
     */
    #[Optional(union: CoalescingRefineBy::class)]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * The ID of the form associated with the submission filter.
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
     * `new PublicFormSubmissionOnPageFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicFormSubmissionOnPageFilter::with(
     *   filterType: ..., operator: ..., pageID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicFormSubmissionOnPageFilter)
     *   ->withFilterType(...)
     *   ->withOperator(...)
     *   ->withPageID(...)
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
        string $pageID,
        FilterType|string $filterType = 'FORM_SUBMISSION_ON_PAGE',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?string $formID = null,
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $self = new self;

        $self['filterType'] = $filterType;
        $self['operator'] = $operator;
        $self['pageID'] = $pageID;

        null !== $coalescingRefineBy && $self['coalescingRefineBy'] = $coalescingRefineBy;
        null !== $formID && $self['formID'] = $formID;
        null !== $pruningRefineBy && $self['pruningRefineBy'] = $pruningRefineBy;

        return $self;
    }

    /**
     * Indicates the type of filter (FORM_SUBMISSION_ON_PAGE).
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
     * Specifies the operation to be applied (FILLED_OUT, NOT_FILLED_OUT).
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
     * The ID of the page where the form submission occurred.
     */
    public function withPageID(string $pageID): self
    {
        $self = clone $this;
        $self['pageID'] = $pageID;

        return $self;
    }

    /**
     * Defines the criteria for refining the filter by coalescing.
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
     * The ID of the form associated with the submission filter.
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
