<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicFormSubmissionOnPageFilter\FilterType;
use HubspotSDK\Automation\AutomationPublicFormSubmissionOnPageFilter\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_form_submission_on_page_filter = array{
 *   filterType: value-of<FilterType>,
 *   operator: value-of<Operator>,
 *   pageID: string,
 *   coalescingRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 *   formID?: string,
 *   pruningRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 * }
 */
final class AutomationPublicFormSubmissionOnPageFilter implements BaseModel
{
    /** @use SdkModel<automation_public_form_submission_on_page_filter> */
    use SdkModel;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api('pageId')]
    public string $pageID;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy;

    #[Api('formId', optional: true)]
    public ?string $formID;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new AutomationPublicFormSubmissionOnPageFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicFormSubmissionOnPageFilter::with(
     *   filterType: ..., operator: ..., pageID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicFormSubmissionOnPageFilter)
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
     */
    public static function with(
        Operator|string $operator,
        string $pageID,
        FilterType|string $filterType = 'FORM_SUBMISSION_ON_PAGE',
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy = null,
        ?string $formID = null,
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;
        $obj->operator = $operator instanceof Operator ? $operator->value : $operator;
        $obj->pageID = $pageID;

        null !== $coalescingRefineBy && $obj->coalescingRefineBy = $coalescingRefineBy;
        null !== $formID && $obj->formID = $formID;
        null !== $pruningRefineBy && $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }

    /**
     * @param FilterType|value-of<FilterType> $filterType
     */
    public function withFilterType(FilterType|string $filterType): self
    {
        $obj = clone $this;
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj->operator = $operator instanceof Operator ? $operator->value : $operator;

        return $obj;
    }

    public function withPageID(string $pageID): self
    {
        $obj = clone $this;
        $obj->pageID = $pageID;

        return $obj;
    }

    public function withCoalescingRefineBy(
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }

    public function withFormID(string $formID): self
    {
        $obj = clone $this;
        $obj->formID = $formID;

        return $obj;
    }

    public function withPruningRefineBy(
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $pruningRefineBy,
    ): self {
        $obj = clone $this;
        $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }
}
