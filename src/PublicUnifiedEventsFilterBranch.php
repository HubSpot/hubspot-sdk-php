<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicNumOccurrencesRefineBy\Type;
use HubspotSDK\PublicPropertyFilter\FilterType;
use HubspotSDK\PublicTimePointOperation\OperationType;
use HubspotSDK\PublicUnifiedEventsFilterBranch\Filter;
use HubspotSDK\PublicUnifiedEventsFilterBranch\FilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch\FilterBranchType;
use HubspotSDK\PublicUnifiedEventsFilterBranch\Operator;

/**
 * @phpstan-type PublicUnifiedEventsFilterBranchShape = array{
 *   eventTypeId: string,
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
 *   operator: value-of<Operator>,
 *   coalescingRefineBy?: null|PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
 * }
 */
final class PublicUnifiedEventsFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicUnifiedEventsFilterBranchShape> */
    use SdkModel;

    #[Required]
    public string $eventTypeId;

    /** @var list<mixed> $filterBranches */
    #[Required(list: FilterBranch::class)]
    public array $filterBranches;

    #[Required]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Required(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
     */
    #[Required(list: Filter::class)]
    public array $filters;

    /** @var value-of<Operator> $operator */
    #[Required(enum: Operator::class)]
    public string $operator;

    #[Optional]
    public PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy;

    /**
     * `new PublicUnifiedEventsFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicUnifiedEventsFilterBranch::with(
     *   eventTypeId: ...,
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
     * (new PublicUnifiedEventsFilterBranch)
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
     * @param list<mixed> $filterBranches
     * @param list<PublicPropertyFilter|array{
     *   filterType: value-of<FilterType>,
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }|PublicAssociationInListFilter|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicAssociationInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   toObjectType?: string|null,
     *   toObjectTypeId?: string|null,
     * }|PublicPageViewAnalyticsFilter|array{
     *   filterType: value-of<PublicPageViewAnalyticsFilter\FilterType>,
     *   operator: string,
     *   pageUrl: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   enableTracking?: bool|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicCtaAnalyticsFilter|array{
     *   ctaName: string,
     *   filterType: value-of<PublicCtaAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicEventAnalyticsFilter|array{
     *   eventId: string,
     *   filterType: value-of<PublicEventAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionFilter|array{
     *   filterType: value-of<PublicFormSubmissionFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionFilter\Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionOnPageFilter|array{
     *   filterType: value-of<PublicFormSubmissionOnPageFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionOnPageFilter\Operator>,
     *   pageId: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicIntegrationEventFilter|array{
     *   eventTypeId: int,
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicIntegrationEventFilter\FilterType>,
     * }|PublicEmailSubscriptionFilter|array{
     *   acceptedStatuses: list<string>,
     *   filterType: value-of<PublicEmailSubscriptionFilter\FilterType>,
     *   subscriptionIds: list<string>,
     *   subscriptionType?: string|null,
     * }|PublicCommunicationSubscriptionFilter|array{
     *   acceptedOptStates: list<string>,
     *   channel: string,
     *   filterType: value-of<PublicCommunicationSubscriptionFilter\FilterType>,
     *   subscriptionIds: list<string>,
     *   subscriptionType: string,
     *   businessUnitId?: string|null,
     * }|PublicCampaignInfluencedFilter|array{
     *   campaignId: string,
     *   filterType: value-of<PublicCampaignInfluencedFilter\FilterType>,
     * }|PublicSurveyMonkeyFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyFilter\FilterType>,
     *   operator: string,
     *   surveyId: string,
     * }|PublicSurveyMonkeyValueFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyValueFilter\FilterType>,
     *   operator: string,
     *   surveyId: string,
     *   surveyQuestion: string,
     *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   surveyAnswerColId?: string|null,
     *   surveyAnswerRowId?: string|null,
     * }|PublicWebinarFilter|array{
     *   filterType: value-of<PublicWebinarFilter\FilterType>,
     *   operator: string,
     *   webinarId?: string|null,
     * }|PublicEmailEventFilter|array{
     *   appId: string,
     *   emailId: string,
     *   filterType: value-of<PublicEmailEventFilter\FilterType>,
     *   level: string,
     *   operator: value-of<PublicEmailEventFilter\Operator>,
     *   clickUrl?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPrivacyAnalyticsFilter|array{
     *   filterType: value-of<PublicPrivacyAnalyticsFilter\FilterType>,
     *   operator: string,
     *   privacyName: string,
     * }|PublicAdsSearchFilter|array{
     *   adNetwork: string,
     *   entityType: string,
     *   filterType: value-of<PublicAdsSearchFilter\FilterType>,
     *   operator: string,
     *   searchTerms: list<string>,
     *   searchTermType: string,
     * }|PublicAdsTimeFilter|array{
     *   filterType: value-of<PublicAdsTimeFilter\FilterType>,
     *   pruningRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     * }|PublicInListFilter|array{
     *   filterType: value-of<PublicInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   metadata?: PublicInListFilterMetadata|null,
     * }|PublicNumAssociationsFilter|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicNumAssociationsFilter\FilterType>,
     * }|PublicUnifiedEventsFilter|array{
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicUnifiedEventsFilter\FilterType>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   eventTypeId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationInListFilter|array{
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicPropertyAssociationInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   propertyWithObjectId: string,
     *   toObjectTypeId?: string|null,
     * }|PublicConstantFilter|array{
     *   filterType: value-of<PublicConstantFilter\FilterType>,
     *   shouldAccept: bool,
     *   source?: string|null,
     * }> $filters
     * @param Operator|value-of<Operator> $operator
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $coalescingRefineBy
     */
    public static function with(
        string $eventTypeId,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        Operator|string $operator,
        FilterBranchType|string $filterBranchType = 'UNIFIED_EVENTS',
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null $coalescingRefineBy = null,
    ): self {
        $obj = new self;

        $obj['eventTypeId'] = $eventTypeId;
        $obj['filterBranches'] = $filterBranches;
        $obj['filterBranchOperator'] = $filterBranchOperator;
        $obj['filterBranchType'] = $filterBranchType;
        $obj['filters'] = $filters;
        $obj['operator'] = $operator;

        null !== $coalescingRefineBy && $obj['coalescingRefineBy'] = $coalescingRefineBy;

        return $obj;
    }

    public function withEventTypeID(string $eventTypeID): self
    {
        $obj = clone $this;
        $obj['eventTypeId'] = $eventTypeID;

        return $obj;
    }

    /**
     * @param list<mixed> $filterBranches
     */
    public function withFilterBranches(array $filterBranches): self
    {
        $obj = clone $this;
        $obj['filterBranches'] = $filterBranches;

        return $obj;
    }

    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $obj = clone $this;
        $obj['filterBranchOperator'] = $filterBranchOperator;

        return $obj;
    }

    /**
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public function withFilterBranchType(
        FilterBranchType|string $filterBranchType
    ): self {
        $obj = clone $this;
        $obj['filterBranchType'] = $filterBranchType;

        return $obj;
    }

    /**
     * @param list<PublicPropertyFilter|array{
     *   filterType: value-of<FilterType>,
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }|PublicAssociationInListFilter|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicAssociationInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   toObjectType?: string|null,
     *   toObjectTypeId?: string|null,
     * }|PublicPageViewAnalyticsFilter|array{
     *   filterType: value-of<PublicPageViewAnalyticsFilter\FilterType>,
     *   operator: string,
     *   pageUrl: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   enableTracking?: bool|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicCtaAnalyticsFilter|array{
     *   ctaName: string,
     *   filterType: value-of<PublicCtaAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicEventAnalyticsFilter|array{
     *   eventId: string,
     *   filterType: value-of<PublicEventAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionFilter|array{
     *   filterType: value-of<PublicFormSubmissionFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionFilter\Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionOnPageFilter|array{
     *   filterType: value-of<PublicFormSubmissionOnPageFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionOnPageFilter\Operator>,
     *   pageId: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicIntegrationEventFilter|array{
     *   eventTypeId: int,
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicIntegrationEventFilter\FilterType>,
     * }|PublicEmailSubscriptionFilter|array{
     *   acceptedStatuses: list<string>,
     *   filterType: value-of<PublicEmailSubscriptionFilter\FilterType>,
     *   subscriptionIds: list<string>,
     *   subscriptionType?: string|null,
     * }|PublicCommunicationSubscriptionFilter|array{
     *   acceptedOptStates: list<string>,
     *   channel: string,
     *   filterType: value-of<PublicCommunicationSubscriptionFilter\FilterType>,
     *   subscriptionIds: list<string>,
     *   subscriptionType: string,
     *   businessUnitId?: string|null,
     * }|PublicCampaignInfluencedFilter|array{
     *   campaignId: string,
     *   filterType: value-of<PublicCampaignInfluencedFilter\FilterType>,
     * }|PublicSurveyMonkeyFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyFilter\FilterType>,
     *   operator: string,
     *   surveyId: string,
     * }|PublicSurveyMonkeyValueFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyValueFilter\FilterType>,
     *   operator: string,
     *   surveyId: string,
     *   surveyQuestion: string,
     *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   surveyAnswerColId?: string|null,
     *   surveyAnswerRowId?: string|null,
     * }|PublicWebinarFilter|array{
     *   filterType: value-of<PublicWebinarFilter\FilterType>,
     *   operator: string,
     *   webinarId?: string|null,
     * }|PublicEmailEventFilter|array{
     *   appId: string,
     *   emailId: string,
     *   filterType: value-of<PublicEmailEventFilter\FilterType>,
     *   level: string,
     *   operator: value-of<PublicEmailEventFilter\Operator>,
     *   clickUrl?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPrivacyAnalyticsFilter|array{
     *   filterType: value-of<PublicPrivacyAnalyticsFilter\FilterType>,
     *   operator: string,
     *   privacyName: string,
     * }|PublicAdsSearchFilter|array{
     *   adNetwork: string,
     *   entityType: string,
     *   filterType: value-of<PublicAdsSearchFilter\FilterType>,
     *   operator: string,
     *   searchTerms: list<string>,
     *   searchTermType: string,
     * }|PublicAdsTimeFilter|array{
     *   filterType: value-of<PublicAdsTimeFilter\FilterType>,
     *   pruningRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     * }|PublicInListFilter|array{
     *   filterType: value-of<PublicInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   metadata?: PublicInListFilterMetadata|null,
     * }|PublicNumAssociationsFilter|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicNumAssociationsFilter\FilterType>,
     * }|PublicUnifiedEventsFilter|array{
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicUnifiedEventsFilter\FilterType>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   eventTypeId?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationInListFilter|array{
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicPropertyAssociationInListFilter\FilterType>,
     *   listId: string,
     *   operator: string,
     *   propertyWithObjectId: string,
     *   toObjectTypeId?: string|null,
     * }|PublicConstantFilter|array{
     *   filterType: value-of<PublicConstantFilter\FilterType>,
     *   shouldAccept: bool,
     *   source?: string|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $obj = clone $this;
        $obj['operator'] = $operator;

        return $obj;
    }

    /**
     * @param PublicNumOccurrencesRefineBy|array{
     *   type: value-of<Type>, maxOccurrences?: int|null, minOccurrences?: int|null
     * }|PublicSetOccurrencesRefineBy|array{
     *   setType: string, type: value-of<PublicSetOccurrencesRefineBy\Type>
     * }|PublicRelativeComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timeOffset: PublicTimeOffset,
     *   type: value-of<PublicRelativeComparativeTimestampRefineBy\Type>,
     * }|PublicRelativeRangedTimestampRefineBy|array{
     *   lowerBoundOffset: PublicTimeOffset,
     *   rangeType: string,
     *   type: value-of<PublicRelativeRangedTimestampRefineBy\Type>,
     *   upperBoundOffset: PublicTimeOffset,
     * }|PublicAbsoluteComparativeTimestampRefineBy|array{
     *   comparison: string,
     *   timestamp: int,
     *   type: value-of<PublicAbsoluteComparativeTimestampRefineBy\Type>,
     * }|PublicAbsoluteRangedTimestampRefineBy|array{
     *   lowerTimestamp: int,
     *   rangeType: string,
     *   type: value-of<PublicAbsoluteRangedTimestampRefineBy\Type>,
     *   upperTimestamp: int,
     * }|PublicAllHistoryRefineBy|array{
     *   type: value-of<PublicAllHistoryRefineBy\Type>
     * }|PublicTimePointOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   operationType: value-of<OperationType>,
     *   operator: string,
     *   timePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   type: string,
     *   endpointBehavior?: string|null,
     *   propertyParser?: string|null,
     * }|PublicRangedTimeOperation|array{
     *   includeObjectsWithNoValueSet: bool,
     *   lowerBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   operationType: string,
     *   operator: string,
     *   type: value-of<PublicRangedTimeOperation\Type>,
     *   upperBoundTimePoint: PublicDatePoint|PublicIndexedTimePoint|PublicPropertyReferencedTime,
     *   lowerBoundEndpointBehavior?: string|null,
     *   propertyParser?: string|null,
     *   upperBoundEndpointBehavior?: string|null,
     * } $coalescingRefineBy
     */
    public function withCoalescingRefineBy(
        PublicNumOccurrencesRefineBy|array|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation $coalescingRefineBy,
    ): self {
        $obj = clone $this;
        $obj['coalescingRefineBy'] = $coalescingRefineBy;

        return $obj;
    }
}
