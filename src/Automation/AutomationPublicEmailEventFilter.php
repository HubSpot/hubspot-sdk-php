<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicEmailEventFilter\FilterType;
use HubspotSDK\Automation\AutomationPublicEmailEventFilter\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_email_event_filter = array{
 *   appID: string,
 *   emailID: string,
 *   filterType: value-of<FilterType>,
 *   level: string,
 *   operator: value-of<Operator>,
 *   clickURL?: string,
 *   pruningRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 * }
 */
final class AutomationPublicEmailEventFilter implements BaseModel
{
    /** @use SdkModel<automation_public_email_event_filter> */
    use SdkModel;

    #[Api('appId')]
    public string $appID;

    #[Api('emailId')]
    public string $emailID;

    /** @var value-of<FilterType> $filterType */
    #[Api(enum: FilterType::class)]
    public string $filterType;

    #[Api]
    public string $level;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api('clickUrl', optional: true)]
    public ?string $clickURL;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy;

    /**
     * `new AutomationPublicEmailEventFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicEmailEventFilter::with(
     *   appID: ..., emailID: ..., filterType: ..., level: ..., operator: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicEmailEventFilter)
     *   ->withAppID(...)
     *   ->withEmailID(...)
     *   ->withFilterType(...)
     *   ->withLevel(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param FilterType|value-of<FilterType> $filterType
     */
    public static function with(
        string $appID,
        string $emailID,
        string $level,
        Operator|string $operator,
        FilterType|string $filterType = 'EMAIL_EVENT',
        ?string $clickURL = null,
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $pruningRefineBy = null,
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->emailID = $emailID;
        $obj->filterType = $filterType instanceof FilterType ? $filterType->value : $filterType;
        $obj->level = $level;
        $obj->operator = $operator instanceof Operator ? $operator->value : $operator;

        null !== $clickURL && $obj->clickURL = $clickURL;
        null !== $pruningRefineBy && $obj->pruningRefineBy = $pruningRefineBy;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withEmailID(string $emailID): self
    {
        $obj = clone $this;
        $obj->emailID = $emailID;

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

    public function withLevel(string $level): self
    {
        $obj = clone $this;
        $obj->level = $level;

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

    public function withClickURL(string $clickURL): self
    {
        $obj = clone $this;
        $obj->clickURL = $clickURL;

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
