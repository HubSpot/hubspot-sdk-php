<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource\AssociationCategory;
use HubspotSDK\Automation\Workflows\APIBlockedDate\Month;
use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule\MonthlyRelativeDays;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\DataSource;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\FlowType;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Type;
use HubspotSDK\Automation\Workflows\APITimeWindow\Day;
use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule\DaysOfWeek;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\PublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\PublicAdsSearchFilter;
use HubspotSDK\PublicAdsTimeFilter;
use HubspotSDK\PublicAllHistoryRefineBy;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicAssociationInListFilter;
use HubspotSDK\PublicCampaignInfluencedFilter;
use HubspotSDK\PublicCommunicationSubscriptionFilter;
use HubspotSDK\PublicConstantFilter;
use HubspotSDK\PublicCtaAnalyticsFilter;
use HubspotSDK\PublicEmailEventFilter;
use HubspotSDK\PublicEmailSubscriptionFilter;
use HubspotSDK\PublicEventAnalyticsFilter;
use HubspotSDK\PublicFormSubmissionFilter;
use HubspotSDK\PublicFormSubmissionOnPageFilter;
use HubspotSDK\PublicInListFilter;
use HubspotSDK\PublicIntegrationEventFilter;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicNumAssociationsFilter;
use HubspotSDK\PublicNumOccurrencesRefineBy;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicOrFilterBranch\FilterBranchType;
use HubspotSDK\PublicPageViewAnalyticsFilter;
use HubspotSDK\PublicPrivacyAnalyticsFilter;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicPropertyAssociationInListFilter;
use HubspotSDK\PublicPropertyFilter;
use HubspotSDK\PublicRangedTimeOperation;
use HubspotSDK\PublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\PublicRelativeRangedTimestampRefineBy;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicSetOccurrencesRefineBy;
use HubspotSDK\PublicSurveyMonkeyFilter;
use HubspotSDK\PublicSurveyMonkeyValueFilter;
use HubspotSDK\PublicTimePointOperation;
use HubspotSDK\PublicUnifiedEventsFilter;
use HubspotSDK\PublicUnifiedEventsFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch\Operator;
use HubspotSDK\PublicWebinarFilter;

/**
 * @phpstan-type APIPlatformFlowCreateRequestShape = array{
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDate>,
 *   customProperties: array<string,string>,
 *   dataSources: list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource>,
 *   flowType: value-of<FlowType>,
 *   isEnabled: bool,
 *   objectTypeId: string,
 *   timeWindows: list<APITimeWindow>,
 *   type: value-of<Type>,
 *   description?: string|null,
 *   enrollmentCriteria?: null|APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: null|APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   name?: string|null,
 *   startActionId?: string|null,
 *   suppressionFilterBranch?: null|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   uuid?: string|null,
 * }
 */
final class APIPlatformFlowCreateRequest implements BaseModel
{
    /** @use SdkModel<APIPlatformFlowCreateRequestShape> */
    use SdkModel;

    /** @var list<mixed> $actions */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Api(list: APIBlockedDate::class)]
    public array $blockedDates;

    /** @var array<string,string> $customProperties */
    #[Api(map: 'string')]
    public array $customProperties;

    /**
     * @var list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
     */
    #[Api(list: DataSource::class)]
    public array $dataSources;

    /** @var value-of<FlowType> $flowType */
    #[Api(enum: FlowType::class)]
    public string $flowType;

    #[Api]
    public bool $isEnabled;

    #[Api]
    public string $objectTypeId;

    /** @var list<APITimeWindow> $timeWindows */
    #[Api(list: APITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria;

    #[Api(optional: true)]
    public APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $startActionId;

    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new APIPlatformFlowCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIPlatformFlowCreateRequest::with(
     *   actions: ...,
     *   blockedDates: ...,
     *   customProperties: ...,
     *   dataSources: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   objectTypeId: ...,
     *   timeWindows: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIPlatformFlowCreateRequest)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCustomProperties(...)
     *   ->withDataSources(...)
     *   ->withFlowType(...)
     *   ->withIsEnabled(...)
     *   ->withObjectTypeID(...)
     *   ->withTimeWindows(...)
     *   ->withType(...)
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
     * @param list<mixed> $actions
     * @param list<APIBlockedDate|array{
     *   dayOfMonth: int, month: value-of<Month>, year?: int|null
     * }> $blockedDates
     * @param array<string,string> $customProperties
     * @param list<APIAssociationDataSource|array{
     *   associationCategory: value-of<AssociationCategory>,
     *   associationTypeId: int,
     *   name: string,
     *   objectTypeId: string,
     *   type: value-of<APIAssociationDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIAssociationTimestampDataSource|array{
     *   associationCategory: value-of<APIAssociationTimestampDataSource\AssociationCategory>,
     *   associationTypeId: int,
     *   name: string,
     *   objectTypeId: string,
     *   type: value-of<APIAssociationTimestampDataSource\Type>,
     * }|APIStaticPropertyFilterDataSource|array{
     *   name: string,
     *   propertyName: string,
     *   staticValue: string,
     *   type: value-of<APIStaticPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIEnrolledRecordPropertyFilterDataSource|array{
     *   name: string,
     *   propertyName: string,
     *   recordFieldName: string,
     *   type: value-of<APIEnrolledRecordPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIDatasetFieldPropertyFilterDataSource|array{
     *   datasetFieldName: string,
     *   name: string,
     *   propertyName: string,
     *   type: value-of<APIDatasetFieldPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIEnrolledArgumentPropertyFilterDataSource|array{
     *   argumentName: string,
     *   name: string,
     *   propertyName: string,
     *   type: value-of<APIEnrolledArgumentPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<APITimeWindow|array{
     *   day: value-of<Day>, endTime?: APITimeOfDay|null, startTime?: APITimeOfDay|null
     * }> $timeWindows
     * @param Type|value-of<Type> $type
     * @param APIListBasedEnrollmentCriteria|array{
     *   listFilterBranch: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
     *   reEnrollmentTriggersFilterBranches: list<mixed>,
     *   shouldReEnroll: bool,
     *   type: value-of<APIListBasedEnrollmentCriteria\Type>,
     *   unEnrollObjectsNotMeetingCriteria: bool,
     * }|APIEventBasedEnrollmentCriteria|array{
     *   eventFilterBranches: list<mixed>,
     *   listMembershipFilterBranches: list<mixed>,
     *   shouldReEnroll: bool,
     *   type: value-of<APIEventBasedEnrollmentCriteria\Type>,
     *   refinementCriteria?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     * }|APIManualEnrollmentCriteria|array{
     *   shouldReEnroll: bool,
     *   type: value-of<APIManualEnrollmentCriteria\Type>,
     * } $enrollmentCriteria
     * @param APIDailyEnrollmentSchedule|array{
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIDailyEnrollmentSchedule\Type>,
     * }|APIWeeklyEnrollmentSchedule|array{
     *   daysOfWeek: list<value-of<DaysOfWeek>>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIWeeklyEnrollmentSchedule\Type>,
     * }|APIMonthlySpecificDaysEnrollmentSchedule|array{
     *   daysOfMonth: list<int>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIMonthlySpecificDaysEnrollmentSchedule\Type>,
     * }|APIMonthlyRelativeDaysEnrollmentSchedule|array{
     *   monthlyRelativeDays: value-of<MonthlyRelativeDays>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIMonthlyRelativeDaysEnrollmentSchedule\Type>,
     * }|APIYearlyEnrollmentSchedule|array{
     *   dayOfMonth: int,
     *   month: value-of<APIYearlyEnrollmentSchedule\Month>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIYearlyEnrollmentSchedule\Type>,
     * }|APIPropertyBasedEnrollmentSchedule|array{
     *   dateProperty: string,
     *   daysDelta: int,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIPropertyBasedEnrollmentSchedule\Type>,
     *   yearly: bool,
     * } $enrollmentSchedule
     * @param PublicOrFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicAndFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAndFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicNotAllFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicNotAllFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicNotAnyFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicNotAnyFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicRestrictedFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicRestrictedFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicUnifiedEventsFilterBranch|array{
     *   eventTypeId: string,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicUnifiedEventsFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   operator: value-of<Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicPropertyAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeId: string,
     *   operator: string,
     *   propertyWithObjectId: string,
     * }|PublicAssociationFilterBranch|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeId: string,
     *   operator: string,
     * } $suppressionFilterBranch
     */
    public static function with(
        array $actions,
        array $blockedDates,
        array $customProperties,
        array $dataSources,
        FlowType|string $flowType,
        bool $isEnabled,
        string $objectTypeId,
        array $timeWindows,
        Type|string $type = 'PLATFORM_FLOW',
        ?string $description = null,
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionId = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj['actions'] = $actions;
        $obj['blockedDates'] = $blockedDates;
        $obj['customProperties'] = $customProperties;
        $obj['dataSources'] = $dataSources;
        $obj['flowType'] = $flowType;
        $obj['isEnabled'] = $isEnabled;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['timeWindows'] = $timeWindows;
        $obj['type'] = $type;

        null !== $description && $obj['description'] = $description;
        null !== $enrollmentCriteria && $obj['enrollmentCriteria'] = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj['enrollmentSchedule'] = $enrollmentSchedule;
        null !== $name && $obj['name'] = $name;
        null !== $startActionId && $obj['startActionId'] = $startActionId;
        null !== $suppressionFilterBranch && $obj['suppressionFilterBranch'] = $suppressionFilterBranch;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    /**
     * @param list<mixed> $actions
     */
    public function withActions(array $actions): self
    {
        $obj = clone $this;
        $obj['actions'] = $actions;

        return $obj;
    }

    /**
     * @param list<APIBlockedDate|array{
     *   dayOfMonth: int, month: value-of<Month>, year?: int|null
     * }> $blockedDates
     */
    public function withBlockedDates(array $blockedDates): self
    {
        $obj = clone $this;
        $obj['blockedDates'] = $blockedDates;

        return $obj;
    }

    /**
     * @param array<string,string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj['customProperties'] = $customProperties;

        return $obj;
    }

    /**
     * @param list<APIAssociationDataSource|array{
     *   associationCategory: value-of<AssociationCategory>,
     *   associationTypeId: int,
     *   name: string,
     *   objectTypeId: string,
     *   type: value-of<APIAssociationDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIAssociationTimestampDataSource|array{
     *   associationCategory: value-of<APIAssociationTimestampDataSource\AssociationCategory>,
     *   associationTypeId: int,
     *   name: string,
     *   objectTypeId: string,
     *   type: value-of<APIAssociationTimestampDataSource\Type>,
     * }|APIStaticPropertyFilterDataSource|array{
     *   name: string,
     *   propertyName: string,
     *   staticValue: string,
     *   type: value-of<APIStaticPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIEnrolledRecordPropertyFilterDataSource|array{
     *   name: string,
     *   propertyName: string,
     *   recordFieldName: string,
     *   type: value-of<APIEnrolledRecordPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIDatasetFieldPropertyFilterDataSource|array{
     *   datasetFieldName: string,
     *   name: string,
     *   propertyName: string,
     *   type: value-of<APIDatasetFieldPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIEnrolledArgumentPropertyFilterDataSource|array{
     *   argumentName: string,
     *   name: string,
     *   propertyName: string,
     *   type: value-of<APIEnrolledArgumentPropertyFilterDataSource\Type>,
     *   sortBy?: APISort|null,
     * }> $dataSources
     */
    public function withDataSources(array $dataSources): self
    {
        $obj = clone $this;
        $obj['dataSources'] = $dataSources;

        return $obj;
    }

    /**
     * @param FlowType|value-of<FlowType> $flowType
     */
    public function withFlowType(FlowType|string $flowType): self
    {
        $obj = clone $this;
        $obj['flowType'] = $flowType;

        return $obj;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj['isEnabled'] = $isEnabled;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<APITimeWindow|array{
     *   day: value-of<Day>, endTime?: APITimeOfDay|null, startTime?: APITimeOfDay|null
     * }> $timeWindows
     */
    public function withTimeWindows(array $timeWindows): self
    {
        $obj = clone $this;
        $obj['timeWindows'] = $timeWindows;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * @param APIListBasedEnrollmentCriteria|array{
     *   listFilterBranch: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
     *   reEnrollmentTriggersFilterBranches: list<mixed>,
     *   shouldReEnroll: bool,
     *   type: value-of<APIListBasedEnrollmentCriteria\Type>,
     *   unEnrollObjectsNotMeetingCriteria: bool,
     * }|APIEventBasedEnrollmentCriteria|array{
     *   eventFilterBranches: list<mixed>,
     *   listMembershipFilterBranches: list<mixed>,
     *   shouldReEnroll: bool,
     *   type: value-of<APIEventBasedEnrollmentCriteria\Type>,
     *   refinementCriteria?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null,
     * }|APIManualEnrollmentCriteria|array{
     *   shouldReEnroll: bool,
     *   type: value-of<APIManualEnrollmentCriteria\Type>,
     * } $enrollmentCriteria
     */
    public function withEnrollmentCriteria(
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria $enrollmentCriteria,
    ): self {
        $obj = clone $this;
        $obj['enrollmentCriteria'] = $enrollmentCriteria;

        return $obj;
    }

    /**
     * @param APIDailyEnrollmentSchedule|array{
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIDailyEnrollmentSchedule\Type>,
     * }|APIWeeklyEnrollmentSchedule|array{
     *   daysOfWeek: list<value-of<DaysOfWeek>>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIWeeklyEnrollmentSchedule\Type>,
     * }|APIMonthlySpecificDaysEnrollmentSchedule|array{
     *   daysOfMonth: list<int>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIMonthlySpecificDaysEnrollmentSchedule\Type>,
     * }|APIMonthlyRelativeDaysEnrollmentSchedule|array{
     *   monthlyRelativeDays: value-of<MonthlyRelativeDays>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIMonthlyRelativeDaysEnrollmentSchedule\Type>,
     * }|APIYearlyEnrollmentSchedule|array{
     *   dayOfMonth: int,
     *   month: value-of<APIYearlyEnrollmentSchedule\Month>,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIYearlyEnrollmentSchedule\Type>,
     * }|APIPropertyBasedEnrollmentSchedule|array{
     *   dateProperty: string,
     *   daysDelta: int,
     *   timeOfDay: APITimeOfDay,
     *   type: value-of<APIPropertyBasedEnrollmentSchedule\Type>,
     *   yearly: bool,
     * } $enrollmentSchedule
     */
    public function withEnrollmentSchedule(
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule $enrollmentSchedule,
    ): self {
        $obj = clone $this;
        $obj['enrollmentSchedule'] = $enrollmentSchedule;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withStartActionID(string $startActionID): self
    {
        $obj = clone $this;
        $obj['startActionId'] = $startActionID;

        return $obj;
    }

    /**
     * @param PublicOrFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicAndFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAndFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicNotAllFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicNotAllFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicNotAnyFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicNotAnyFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicRestrictedFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicRestrictedFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     * }|PublicUnifiedEventsFilterBranch|array{
     *   eventTypeId: string,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicUnifiedEventsFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   operator: value-of<Operator>,
     *   coalescingRefineBy?: PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation|null,
     * }|PublicPropertyAssociationFilterBranch|array{
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicPropertyAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeId: string,
     *   operator: string,
     *   propertyWithObjectId: string,
     * }|PublicAssociationFilterBranch|array{
     *   associationCategory: string,
     *   associationTypeId: int,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeId: string,
     *   operator: string,
     * } $suppressionFilterBranch
     */
    public function withSuppressionFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $suppressionFilterBranch,
    ): self {
        $obj = clone $this;
        $obj['suppressionFilterBranch'] = $suppressionFilterBranch;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj['uuid'] = $uuid;

        return $obj;
    }
}
