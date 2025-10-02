<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch\Filter;
use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch\FilterBranch;
use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch\FilterBranchType;
use HubspotSDK\Automation\AutomationPublicUnifiedEventsFilterBranch\Operator;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_unified_events_filter_branch = array{
 *   eventTypeID: string,
 *   filterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter>,
 *   operator: value-of<Operator>,
 *   coalescingRefineBy?: AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation,
 * }
 */
final class AutomationPublicUnifiedEventsFilterBranch implements BaseModel
{
    /** @use SdkModel<automation_public_unified_events_filter_branch> */
    use SdkModel;

    #[Api('eventTypeId')]
    public string $eventTypeID;

    /**
     * @var list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     */
    #[Api(list: FilterBranch::class)]
    public array $filterBranches;

    #[Api]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Api(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     */
    #[Api(list: Filter::class)]
    public array $filters;

    /** @var value-of<Operator> $operator */
    #[Api(enum: Operator::class)]
    public string $operator;

    #[Api(optional: true)]
    public AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * `new AutomationPublicUnifiedEventsFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicUnifiedEventsFilterBranch::with(
     *   eventTypeID: ...,
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicUnifiedEventsFilterBranch)
     *   ->withEventTypeID(...)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
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
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     * @param list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     * @param Operator|value-of<Operator> $operator
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        string $eventTypeID,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        Operator|string $operator,
        FilterBranchType|string $filterBranchType = 'UNIFIED_EVENTS',
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation|null $coalescingRefineBy = null,
    ): self {
        $obj = new self;

        $obj->eventTypeID = $eventTypeID;
        $obj->filterBranches = $filterBranches;
        $obj->filterBranchOperator = $filterBranchOperator;
        $obj->filterBranchType = $filterBranchType instanceof FilterBranchType ? $filterBranchType->value : $filterBranchType;
        $obj->filters = $filters;
        $obj->operator = $operator instanceof Operator ? $operator->value : $operator;

        null !== $coalescingRefineBy && $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $obj = clone $this;
        $obj->eventTypeID = $eventTypeID;

        return $obj;
    }

    /**
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $filterBranches
     */
    public function withFilterBranches(array $filterBranches): self
    {
        $obj = clone $this;
        $obj->filterBranches = $filterBranches;

        return $obj;
    }

    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $obj = clone $this;
        $obj->filterBranchOperator = $filterBranchOperator;

        return $obj;
    }

    /**
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public function withFilterBranchType(
        FilterBranchType|string $filterBranchType
    ): self {
        $obj = clone $this;
        $obj->filterBranchType = $filterBranchType instanceof FilterBranchType ? $filterBranchType->value : $filterBranchType;

        return $obj;
    }

    /**
     * @param list<AutomationPublicPropertyFilter|AutomationPublicAssociationInListFilter|AutomationPublicPageViewAnalyticsFilter|AutomationPublicCtaAnalyticsFilter|AutomationPublicEventAnalyticsFilter|AutomationPublicFormSubmissionFilter|AutomationPublicFormSubmissionOnPageFilter|AutomationPublicIntegrationEventFilter|AutomationPublicEmailSubscriptionFilter|AutomationPublicCommunicationSubscriptionFilter|AutomationPublicCampaignInfluencedFilter|AutomationPublicSurveyMonkeyFilter|AutomationPublicSurveyMonkeyValueFilter|AutomationPublicWebinarFilter|AutomationPublicEmailEventFilter|AutomationPublicPrivacyAnalyticsFilter|AutomationPublicAdsSearchFilter|AutomationPublicAdsTimeFilter|AutomationPublicInListFilter|AutomationPublicNumAssociationsFilter|AutomationPublicUnifiedEventsFilter|AutomationPublicPropertyAssociationInListFilter|AutomationPublicConstantFilter> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

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

    public function withCoalescingRefineBy(
        AutomationPublicNumOccurrencesRefineBy|AutomationPublicSetOccurrencesRefineBy|AutomationPublicRelativeComparativeTimestampRefineBy|AutomationPublicRelativeRangedTimestampRefineBy|AutomationPublicAbsoluteComparativeTimestampRefineBy|AutomationPublicAbsoluteRangedTimestampRefineBy|AutomationPublicAllHistoryRefineBy|AutomationPublicTimePointOperation|AutomationPublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj->coalescingRefineBy = $coalescingRefineBy;

        return $obj;
    }
}
