<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAssociationDataSource\AssociationCategory;
use HubspotSDK\Automation\Workflows\APIBlockedDate\Month;
use HubspotSDK\Automation\Workflows\APIContactFlow\Action;
use HubspotSDK\Automation\Workflows\APIContactFlow\CrmObjectCreationStatus;
use HubspotSDK\Automation\Workflows\APIContactFlow\DataSource;
use HubspotSDK\Automation\Workflows\APIContactFlow\FlowType;
use HubspotSDK\Automation\Workflows\APIContactFlow\Type;
use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule\MonthlyRelativeDays;
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
 * @phpstan-type APIContactFlowShape = array{
 *   id: string,
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDate>,
 *   canEnrollFromSalesforce: bool,
 *   createdAt: \DateTimeInterface,
 *   crmObjectCreationStatus: value-of<CrmObjectCreationStatus>,
 *   customProperties: array<string,string>,
 *   dataSources: list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource>,
 *   flowType: value-of<FlowType>,
 *   isEnabled: bool,
 *   nextAvailableActionId: string,
 *   objectTypeId: string,
 *   revisionId: string,
 *   suppressionListIds: list<int>,
 *   timeWindows: list<APITimeWindow>,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   description?: string|null,
 *   enrollmentCriteria?: null|APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: null|APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   eventAnchor?: null|APIContactPropertyAnchor|APIStaticDateAnchor,
 *   goalFilterBranch?: null|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   name?: string|null,
 *   startActionId?: string|null,
 *   unEnrollmentSetting?: APIUnEnrollmentSetting|null,
 *   uuid?: string|null,
 * }
 */
final class APIContactFlow implements BaseModel
{
    /** @use SdkModel<APIContactFlowShape> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var list<mixed> $actions */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Api(list: APIBlockedDate::class)]
    public array $blockedDates;

    #[Api]
    public bool $canEnrollFromSalesforce;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var value-of<CrmObjectCreationStatus> $crmObjectCreationStatus */
    #[Api(enum: CrmObjectCreationStatus::class)]
    public string $crmObjectCreationStatus;

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
    public string $nextAvailableActionId;

    #[Api]
    public string $objectTypeId;

    #[Api]
    public string $revisionId;

    /** @var list<int> $suppressionListIds */
    #[Api(list: 'int')]
    public array $suppressionListIds;

    /** @var list<APITimeWindow> $timeWindows */
    #[Api(list: APITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria;

    #[Api(optional: true)]
    public APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule;

    #[Api(optional: true)]
    public APIContactPropertyAnchor|APIStaticDateAnchor|null $eventAnchor;

    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $goalFilterBranch;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $startActionId;

    #[Api(optional: true)]
    public ?APIUnEnrollmentSetting $unEnrollmentSetting;

    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new APIContactFlow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIContactFlow::with(
     *   id: ...,
     *   actions: ...,
     *   blockedDates: ...,
     *   canEnrollFromSalesforce: ...,
     *   createdAt: ...,
     *   crmObjectCreationStatus: ...,
     *   customProperties: ...,
     *   dataSources: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   nextAvailableActionId: ...,
     *   objectTypeId: ...,
     *   revisionId: ...,
     *   suppressionListIds: ...,
     *   timeWindows: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIContactFlow)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCanEnrollFromSalesforce(...)
     *   ->withCreatedAt(...)
     *   ->withCrmObjectCreationStatus(...)
     *   ->withCustomProperties(...)
     *   ->withDataSources(...)
     *   ->withFlowType(...)
     *   ->withIsEnabled(...)
     *   ->withNextAvailableActionID(...)
     *   ->withObjectTypeID(...)
     *   ->withRevisionID(...)
     *   ->withSuppressionListIDs(...)
     *   ->withTimeWindows(...)
     *   ->withType(...)
     *   ->withUpdatedAt(...)
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
     * @param CrmObjectCreationStatus|value-of<CrmObjectCreationStatus> $crmObjectCreationStatus
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
     * @param list<int> $suppressionListIds
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
     * @param APIContactPropertyAnchor|array{
     *   contactProperty: string,
     *   type: value-of<APIContactPropertyAnchor\Type>,
     * }|APIStaticDateAnchor|array{
     *   dayOfMonth: int,
     *   month: value-of<APIStaticDateAnchor\Month>,
     *   type: value-of<APIStaticDateAnchor\Type>,
     *   year?: int|null,
     * } $eventAnchor
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
     * } $goalFilterBranch
     * @param APIUnEnrollmentSetting|array{
     *   flowIds: list<string>,
     *   type: value-of<APIUnEnrollmentSetting\Type>,
     * } $unEnrollmentSetting
     */
    public static function with(
        string $id,
        array $actions,
        array $blockedDates,
        bool $canEnrollFromSalesforce,
        \DateTimeInterface $createdAt,
        CrmObjectCreationStatus|string $crmObjectCreationStatus,
        array $customProperties,
        array $dataSources,
        FlowType|string $flowType,
        bool $isEnabled,
        string $nextAvailableActionId,
        string $objectTypeId,
        string $revisionId,
        array $suppressionListIds,
        array $timeWindows,
        \DateTimeInterface $updatedAt,
        Type|string $type = 'CONTACT_FLOW',
        ?string $description = null,
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        APIContactPropertyAnchor|array|APIStaticDateAnchor|null $eventAnchor = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $goalFilterBranch = null,
        ?string $name = null,
        ?string $startActionId = null,
        APIUnEnrollmentSetting|array|null $unEnrollmentSetting = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['actions'] = $actions;
        $obj['blockedDates'] = $blockedDates;
        $obj['canEnrollFromSalesforce'] = $canEnrollFromSalesforce;
        $obj['createdAt'] = $createdAt;
        $obj['crmObjectCreationStatus'] = $crmObjectCreationStatus;
        $obj['customProperties'] = $customProperties;
        $obj['dataSources'] = $dataSources;
        $obj['flowType'] = $flowType;
        $obj['isEnabled'] = $isEnabled;
        $obj['nextAvailableActionId'] = $nextAvailableActionId;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['revisionId'] = $revisionId;
        $obj['suppressionListIds'] = $suppressionListIds;
        $obj['timeWindows'] = $timeWindows;
        $obj['type'] = $type;
        $obj['updatedAt'] = $updatedAt;

        null !== $description && $obj['description'] = $description;
        null !== $enrollmentCriteria && $obj['enrollmentCriteria'] = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj['enrollmentSchedule'] = $enrollmentSchedule;
        null !== $eventAnchor && $obj['eventAnchor'] = $eventAnchor;
        null !== $goalFilterBranch && $obj['goalFilterBranch'] = $goalFilterBranch;
        null !== $name && $obj['name'] = $name;
        null !== $startActionId && $obj['startActionId'] = $startActionId;
        null !== $unEnrollmentSetting && $obj['unEnrollmentSetting'] = $unEnrollmentSetting;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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

    public function withCanEnrollFromSalesforce(
        bool $canEnrollFromSalesforce
    ): self {
        $obj = clone $this;
        $obj['canEnrollFromSalesforce'] = $canEnrollFromSalesforce;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * @param CrmObjectCreationStatus|value-of<CrmObjectCreationStatus> $crmObjectCreationStatus
     */
    public function withCrmObjectCreationStatus(
        CrmObjectCreationStatus|string $crmObjectCreationStatus
    ): self {
        $obj = clone $this;
        $obj['crmObjectCreationStatus'] = $crmObjectCreationStatus;

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

    public function withNextAvailableActionID(
        string $nextAvailableActionID
    ): self {
        $obj = clone $this;
        $obj['nextAvailableActionId'] = $nextAvailableActionID;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj['revisionId'] = $revisionID;

        return $obj;
    }

    /**
     * @param list<int> $suppressionListIDs
     */
    public function withSuppressionListIDs(array $suppressionListIDs): self
    {
        $obj = clone $this;
        $obj['suppressionListIds'] = $suppressionListIDs;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

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

    /**
     * @param APIContactPropertyAnchor|array{
     *   contactProperty: string,
     *   type: value-of<APIContactPropertyAnchor\Type>,
     * }|APIStaticDateAnchor|array{
     *   dayOfMonth: int,
     *   month: value-of<APIStaticDateAnchor\Month>,
     *   type: value-of<APIStaticDateAnchor\Type>,
     *   year?: int|null,
     * } $eventAnchor
     */
    public function withEventAnchor(
        APIContactPropertyAnchor|array|APIStaticDateAnchor $eventAnchor
    ): self {
        $obj = clone $this;
        $obj['eventAnchor'] = $eventAnchor;

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
     * } $goalFilterBranch
     */
    public function withGoalFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $goalFilterBranch,
    ): self {
        $obj = clone $this;
        $obj['goalFilterBranch'] = $goalFilterBranch;

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
     * @param APIUnEnrollmentSetting|array{
     *   flowIds: list<string>,
     *   type: value-of<APIUnEnrollmentSetting\Type>,
     * } $unEnrollmentSetting
     */
    public function withUnEnrollmentSetting(
        APIUnEnrollmentSetting|array $unEnrollmentSetting
    ): self {
        $obj = clone $this;
        $obj['unEnrollmentSetting'] = $unEnrollmentSetting;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj['uuid'] = $uuid;

        return $obj;
    }
}
