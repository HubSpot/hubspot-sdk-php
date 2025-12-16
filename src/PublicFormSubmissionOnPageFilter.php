<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicFormSubmissionOnPageFilter\FilterType;
use HubspotSDK\PublicFormSubmissionOnPageFilter\Operator;

/**
 * @phpstan-import-type CoalescingRefineByShape from \HubspotSDK\PublicFormSubmissionOnPageFilter\CoalescingRefineBy
 * @phpstan-import-type PruningRefineByShape from \HubspotSDK\PublicFormSubmissionOnPageFilter\PruningRefineBy
 *
 * @phpstan-type PublicFormSubmissionOnPageFilterShape = array{
 *   filterType: FilterType|value-of<FilterType>,
 *   operator: Operator|value-of<Operator>,
 *   pageID: string,
 *   coalescingRefineBy?: null|CoalescingRefineByShape|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 *   formID?: string|null,
 *   pruningRefineBy?: null|PruningRefineByShape|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicFormSubmissionOnPageFilter implements BaseModel
{
    /** @use SdkModel<PublicFormSubmissionOnPageFilterShape> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Required(enum: FilterType::class)]
    public string $filterType;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Required('pageId')]
    public string $pageID;

    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    #[Optional('formId')]
    public ?string $formID;

    #[Optional]
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
     * @param CoalescingRefineByShape $coalescingRefineBy
     * @param PruningRefineByShape $pruningRefineBy
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
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $self = clone $this;
        $self['filterType'] = $filterType;

        return $self;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    public function withPageID(string $pageID): self
    {
        $self = clone $this;
        $self['pageID'] = $pageID;

        return $self;
    }

    /**
     * @param CoalescingRefineByShape $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $self = clone $this;
        $self['coalescingRefineBy'] = $coalescingRefineBy;

        return $self;
    }

    public function withFormID(string $formID): self
    {
        $self = clone $this;
        $self['formID'] = $formID;

        return $self;
    }

    /**
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
