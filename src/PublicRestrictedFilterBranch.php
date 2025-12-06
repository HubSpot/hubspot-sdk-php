<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicFormSubmissionFilter\Operator;
use HubspotSDK\PublicPropertyFilter\FilterType;
use HubspotSDK\PublicRestrictedFilterBranch\Filter;
use HubspotSDK\PublicRestrictedFilterBranch\FilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch\FilterBranchType;

/**
 * @phpstan-type PublicRestrictedFilterBranchShape = array{
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
 * }
 */
final class PublicRestrictedFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicRestrictedFilterBranchShape> */
    use SdkModel;

    /** @var list<mixed> $filterBranches */
    #[Api(list: FilterBranch::class)]
    public array $filterBranches;

    #[Api]
    public string $filterBranchOperator;

    /** @var value-of<FilterBranchType> $filterBranchType */
    #[Api(enum: FilterBranchType::class)]
    public string $filterBranchType;

    /**
     * @var list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter> $filters
     */
    #[Api(list: Filter::class)]
    public array $filters;

    /**
     * `new PublicRestrictedFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRestrictedFilterBranch::with(
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRestrictedFilterBranch)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
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
     *   operator: value-of<Operator>,
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
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        FilterBranchType|string $filterBranchType = 'RESTRICTED',
    ): self {
        $obj = new self;

        $obj['filterBranches'] = $filterBranches;
        $obj['filterBranchOperator'] = $filterBranchOperator;
        $obj['filterBranchType'] = $filterBranchType;
        $obj['filters'] = $filters;

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
     *   operator: value-of<Operator>,
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
}
