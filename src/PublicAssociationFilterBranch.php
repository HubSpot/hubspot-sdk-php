<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAssociationFilterBranch\Filter;
use HubspotSDK\PublicAssociationFilterBranch\FilterBranch;
use HubspotSDK\PublicAssociationFilterBranch\FilterBranchType;
use HubspotSDK\PublicFormSubmissionFilter\Operator;
use HubspotSDK\PublicPropertyFilter\FilterType;

/**
 * @phpstan-type PublicAssociationFilterBranchShape = array{
 *   associationCategory: string,
 *   associationTypeID: int,
 *   filterBranches: list<mixed>,
 *   filterBranchOperator: string,
 *   filterBranchType: value-of<FilterBranchType>,
 *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
 *   objectTypeID: string,
 *   operator: string,
 * }
 */
final class PublicAssociationFilterBranch implements BaseModel
{
    /** @use SdkModel<PublicAssociationFilterBranchShape> */
    use SdkModel;

    #[Required]
    public string $associationCategory;

    #[Required('associationTypeId')]
    public int $associationTypeID;

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

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required]
    public string $operator;

    /**
     * `new PublicAssociationFilterBranch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationFilterBranch::with(
     *   associationCategory: ...,
     *   associationTypeID: ...,
     *   filterBranches: ...,
     *   filterBranchOperator: ...,
     *   filterBranchType: ...,
     *   filters: ...,
     *   objectTypeID: ...,
     *   operator: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationFilterBranch)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
     *   ->withFilterBranches(...)
     *   ->withFilterBranchOperator(...)
     *   ->withFilterBranchType(...)
     *   ->withFilters(...)
     *   ->withObjectTypeID(...)
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
     *   associationTypeID: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicAssociationInListFilter\FilterType>,
     *   listID: string,
     *   operator: string,
     *   toObjectType?: string|null,
     *   toObjectTypeID?: string|null,
     * }|PublicPageViewAnalyticsFilter|array{
     *   filterType: value-of<PublicPageViewAnalyticsFilter\FilterType>,
     *   operator: string,
     *   pageURL: string,
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
     *   eventID: string,
     *   filterType: value-of<PublicEventAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionFilter|array{
     *   filterType: value-of<PublicFormSubmissionFilter\FilterType>,
     *   operator: value-of<Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionOnPageFilter|array{
     *   filterType: value-of<PublicFormSubmissionOnPageFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionOnPageFilter\Operator>,
     *   pageID: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicIntegrationEventFilter|array{
     *   eventTypeID: int,
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicIntegrationEventFilter\FilterType>,
     * }|PublicEmailSubscriptionFilter|array{
     *   acceptedStatuses: list<string>,
     *   filterType: value-of<PublicEmailSubscriptionFilter\FilterType>,
     *   subscriptionIDs: list<string>,
     *   subscriptionType?: string|null,
     * }|PublicCommunicationSubscriptionFilter|array{
     *   acceptedOptStates: list<string>,
     *   channel: string,
     *   filterType: value-of<PublicCommunicationSubscriptionFilter\FilterType>,
     *   subscriptionIDs: list<string>,
     *   subscriptionType: string,
     *   businessUnitID?: string|null,
     * }|PublicCampaignInfluencedFilter|array{
     *   campaignID: string,
     *   filterType: value-of<PublicCampaignInfluencedFilter\FilterType>,
     * }|PublicSurveyMonkeyFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyFilter\FilterType>,
     *   operator: string,
     *   surveyID: string,
     * }|PublicSurveyMonkeyValueFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyValueFilter\FilterType>,
     *   operator: string,
     *   surveyID: string,
     *   surveyQuestion: string,
     *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   surveyAnswerColID?: string|null,
     *   surveyAnswerRowID?: string|null,
     * }|PublicWebinarFilter|array{
     *   filterType: value-of<PublicWebinarFilter\FilterType>,
     *   operator: string,
     *   webinarID?: string|null,
     * }|PublicEmailEventFilter|array{
     *   appID: string,
     *   emailID: string,
     *   filterType: value-of<PublicEmailEventFilter\FilterType>,
     *   level: string,
     *   operator: value-of<PublicEmailEventFilter\Operator>,
     *   clickURL?: string|null,
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
     *   listID: string,
     *   operator: string,
     *   metadata?: PublicInListFilterMetadata|null,
     * }|PublicNumAssociationsFilter|array{
     *   associationCategory: string,
     *   associationTypeID: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicNumAssociationsFilter\FilterType>,
     * }|PublicUnifiedEventsFilter|array{
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicUnifiedEventsFilter\FilterType>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   eventTypeID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationInListFilter|array{
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicPropertyAssociationInListFilter\FilterType>,
     *   listID: string,
     *   operator: string,
     *   propertyWithObjectID: string,
     *   toObjectTypeID?: string|null,
     * }|PublicConstantFilter|array{
     *   filterType: value-of<PublicConstantFilter\FilterType>,
     *   shouldAccept: bool,
     *   source?: string|null,
     * }> $filters
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public static function with(
        string $associationCategory,
        int $associationTypeID,
        array $filterBranches,
        string $filterBranchOperator,
        array $filters,
        string $objectTypeID,
        string $operator,
        FilterBranchType|string $filterBranchType = 'ASSOCIATION',
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;
        $self['filterBranches'] = $filterBranches;
        $self['filterBranchOperator'] = $filterBranchOperator;
        $self['filterBranchType'] = $filterBranchType;
        $self['filters'] = $filters;
        $self['objectTypeID'] = $objectTypeID;
        $self['operator'] = $operator;

        return $self;
    }

    public function withAssociationCategory(string $associationCategory): self
    {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    /**
     * @param list<mixed> $filterBranches
     */
    public function withFilterBranches(array $filterBranches): self
    {
        $self = clone $this;
        $self['filterBranches'] = $filterBranches;

        return $self;
    }

    public function withFilterBranchOperator(string $filterBranchOperator): self
    {
        $self = clone $this;
        $self['filterBranchOperator'] = $filterBranchOperator;

        return $self;
    }

    /**
     * @param FilterBranchType|value-of<FilterBranchType> $filterBranchType
     */
    public function withFilterBranchType(
        FilterBranchType|string $filterBranchType
    ): self {
        $self = clone $this;
        $self['filterBranchType'] = $filterBranchType;

        return $self;
    }

    /**
     * @param list<PublicPropertyFilter|array{
     *   filterType: value-of<FilterType>,
     *   operation: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   property: string,
     * }|PublicAssociationInListFilter|array{
     *   associationCategory: string,
     *   associationTypeID: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicAssociationInListFilter\FilterType>,
     *   listID: string,
     *   operator: string,
     *   toObjectType?: string|null,
     *   toObjectTypeID?: string|null,
     * }|PublicPageViewAnalyticsFilter|array{
     *   filterType: value-of<PublicPageViewAnalyticsFilter\FilterType>,
     *   operator: string,
     *   pageURL: string,
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
     *   eventID: string,
     *   filterType: value-of<PublicEventAnalyticsFilter\FilterType>,
     *   operator: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionFilter|array{
     *   filterType: value-of<PublicFormSubmissionFilter\FilterType>,
     *   operator: value-of<Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicFormSubmissionOnPageFilter|array{
     *   filterType: value-of<PublicFormSubmissionOnPageFilter\FilterType>,
     *   operator: value-of<PublicFormSubmissionOnPageFilter\Operator>,
     *   pageID: string,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   formID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicIntegrationEventFilter|array{
     *   eventTypeID: int,
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicIntegrationEventFilter\FilterType>,
     * }|PublicEmailSubscriptionFilter|array{
     *   acceptedStatuses: list<string>,
     *   filterType: value-of<PublicEmailSubscriptionFilter\FilterType>,
     *   subscriptionIDs: list<string>,
     *   subscriptionType?: string|null,
     * }|PublicCommunicationSubscriptionFilter|array{
     *   acceptedOptStates: list<string>,
     *   channel: string,
     *   filterType: value-of<PublicCommunicationSubscriptionFilter\FilterType>,
     *   subscriptionIDs: list<string>,
     *   subscriptionType: string,
     *   businessUnitID?: string|null,
     * }|PublicCampaignInfluencedFilter|array{
     *   campaignID: string,
     *   filterType: value-of<PublicCampaignInfluencedFilter\FilterType>,
     * }|PublicSurveyMonkeyFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyFilter\FilterType>,
     *   operator: string,
     *   surveyID: string,
     * }|PublicSurveyMonkeyValueFilter|array{
     *   filterType: value-of<PublicSurveyMonkeyValueFilter\FilterType>,
     *   operator: string,
     *   surveyID: string,
     *   surveyQuestion: string,
     *   valueComparison: PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation,
     *   surveyAnswerColID?: string|null,
     *   surveyAnswerRowID?: string|null,
     * }|PublicWebinarFilter|array{
     *   filterType: value-of<PublicWebinarFilter\FilterType>,
     *   operator: string,
     *   webinarID?: string|null,
     * }|PublicEmailEventFilter|array{
     *   appID: string,
     *   emailID: string,
     *   filterType: value-of<PublicEmailEventFilter\FilterType>,
     *   level: string,
     *   operator: value-of<PublicEmailEventFilter\Operator>,
     *   clickURL?: string|null,
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
     *   listID: string,
     *   operator: string,
     *   metadata?: PublicInListFilterMetadata|null,
     * }|PublicNumAssociationsFilter|array{
     *   associationCategory: string,
     *   associationTypeID: int,
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicNumAssociationsFilter\FilterType>,
     * }|PublicUnifiedEventsFilter|array{
     *   filterLines: list<PublicEventFilterMetadata>,
     *   filterType: value-of<PublicUnifiedEventsFilter\FilterType>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     *   eventTypeID?: string|null,
     *   pruningRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationInListFilter|array{
     *   coalescingRefineBy: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation,
     *   filterType: value-of<PublicPropertyAssociationInListFilter\FilterType>,
     *   listID: string,
     *   operator: string,
     *   propertyWithObjectID: string,
     *   toObjectTypeID?: string|null,
     * }|PublicConstantFilter|array{
     *   filterType: value-of<PublicConstantFilter\FilterType>,
     *   shouldAccept: bool,
     *   source?: string|null,
     * }> $filters
     */
    public function withFilters(array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withOperator(string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }
}
