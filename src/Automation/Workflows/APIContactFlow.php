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
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
 *   nextAvailableActionID: string,
 *   objectTypeID: string,
 *   revisionID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<APITimeWindow>,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   description?: string|null,
 *   enrollmentCriteria?: null|APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: null|APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   eventAnchor?: null|APIContactPropertyAnchor|APIStaticDateAnchor,
 *   goalFilterBranch?: null|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   unEnrollmentSetting?: APIUnEnrollmentSetting|null,
 *   uuid?: string|null,
 * }
 */
final class APIContactFlow implements BaseModel
{
    /** @use SdkModel<APIContactFlowShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var list<mixed> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Required(list: APIBlockedDate::class)]
    public array $blockedDates;

    #[Required]
    public bool $canEnrollFromSalesforce;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var value-of<CrmObjectCreationStatus> $crmObjectCreationStatus */
    #[Required(enum: CrmObjectCreationStatus::class)]
    public string $crmObjectCreationStatus;

    /** @var array<string,string> $customProperties */
    #[Required(map: 'string')]
    public array $customProperties;

    /**
     * @var list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
     */
    #[Required(list: DataSource::class)]
    public array $dataSources;

    /** @var value-of<FlowType> $flowType */
    #[Required(enum: FlowType::class)]
    public string $flowType;

    #[Required]
    public bool $isEnabled;

    #[Required('nextAvailableActionId')]
    public string $nextAvailableActionID;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    #[Required('revisionId')]
    public string $revisionID;

    /** @var list<int> $suppressionListIDs */
    #[Required('suppressionListIds', list: 'int')]
    public array $suppressionListIDs;

    /** @var list<APITimeWindow> $timeWindows */
    #[Required(list: APITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria;

    #[Optional]
    public APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule;

    #[Optional]
    public APIContactPropertyAnchor|APIStaticDateAnchor|null $eventAnchor;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $goalFilterBranch;

    #[Optional]
    public ?string $name;

    #[Optional('startActionId')]
    public ?string $startActionID;

    #[Optional]
    public ?APIUnEnrollmentSetting $unEnrollmentSetting;

    #[Optional]
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
     *   nextAvailableActionID: ...,
     *   objectTypeID: ...,
     *   revisionID: ...,
     *   suppressionListIDs: ...,
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
     *   associationTypeID: int,
     *   name: string,
     *   objectTypeID: string,
     *   type: value-of<APIAssociationDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIAssociationTimestampDataSource|array{
     *   associationCategory: value-of<APIAssociationTimestampDataSource\AssociationCategory>,
     *   associationTypeID: int,
     *   name: string,
     *   objectTypeID: string,
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
     * @param list<int> $suppressionListIDs
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
     *   eventTypeID: string,
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
     *   objectTypeID: string,
     *   operator: string,
     *   propertyWithObjectID: string,
     * }|PublicAssociationFilterBranch|array{
     *   associationCategory: string,
     *   associationTypeID: int,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeID: string,
     *   operator: string,
     * } $goalFilterBranch
     * @param APIUnEnrollmentSetting|array{
     *   flowIDs: list<string>,
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
        string $nextAvailableActionID,
        string $objectTypeID,
        string $revisionID,
        array $suppressionListIDs,
        array $timeWindows,
        \DateTimeInterface $updatedAt,
        Type|string $type = 'CONTACT_FLOW',
        ?string $description = null,
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        APIContactPropertyAnchor|array|APIStaticDateAnchor|null $eventAnchor = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $goalFilterBranch = null,
        ?string $name = null,
        ?string $startActionID = null,
        APIUnEnrollmentSetting|array|null $unEnrollmentSetting = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actions'] = $actions;
        $self['blockedDates'] = $blockedDates;
        $self['canEnrollFromSalesforce'] = $canEnrollFromSalesforce;
        $self['createdAt'] = $createdAt;
        $self['crmObjectCreationStatus'] = $crmObjectCreationStatus;
        $self['customProperties'] = $customProperties;
        $self['dataSources'] = $dataSources;
        $self['flowType'] = $flowType;
        $self['isEnabled'] = $isEnabled;
        $self['nextAvailableActionID'] = $nextAvailableActionID;
        $self['objectTypeID'] = $objectTypeID;
        $self['revisionID'] = $revisionID;
        $self['suppressionListIDs'] = $suppressionListIDs;
        $self['timeWindows'] = $timeWindows;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        null !== $description && $self['description'] = $description;
        null !== $enrollmentCriteria && $self['enrollmentCriteria'] = $enrollmentCriteria;
        null !== $enrollmentSchedule && $self['enrollmentSchedule'] = $enrollmentSchedule;
        null !== $eventAnchor && $self['eventAnchor'] = $eventAnchor;
        null !== $goalFilterBranch && $self['goalFilterBranch'] = $goalFilterBranch;
        null !== $name && $self['name'] = $name;
        null !== $startActionID && $self['startActionID'] = $startActionID;
        null !== $unEnrollmentSetting && $self['unEnrollmentSetting'] = $unEnrollmentSetting;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<mixed> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * @param list<APIBlockedDate|array{
     *   dayOfMonth: int, month: value-of<Month>, year?: int|null
     * }> $blockedDates
     */
    public function withBlockedDates(array $blockedDates): self
    {
        $self = clone $this;
        $self['blockedDates'] = $blockedDates;

        return $self;
    }

    public function withCanEnrollFromSalesforce(
        bool $canEnrollFromSalesforce
    ): self {
        $self = clone $this;
        $self['canEnrollFromSalesforce'] = $canEnrollFromSalesforce;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param CrmObjectCreationStatus|value-of<CrmObjectCreationStatus> $crmObjectCreationStatus
     */
    public function withCrmObjectCreationStatus(
        CrmObjectCreationStatus|string $crmObjectCreationStatus
    ): self {
        $self = clone $this;
        $self['crmObjectCreationStatus'] = $crmObjectCreationStatus;

        return $self;
    }

    /**
     * @param array<string,string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    /**
     * @param list<APIAssociationDataSource|array{
     *   associationCategory: value-of<AssociationCategory>,
     *   associationTypeID: int,
     *   name: string,
     *   objectTypeID: string,
     *   type: value-of<APIAssociationDataSource\Type>,
     *   sortBy?: APISort|null,
     * }|APIAssociationTimestampDataSource|array{
     *   associationCategory: value-of<APIAssociationTimestampDataSource\AssociationCategory>,
     *   associationTypeID: int,
     *   name: string,
     *   objectTypeID: string,
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
        $self = clone $this;
        $self['dataSources'] = $dataSources;

        return $self;
    }

    /**
     * @param FlowType|value-of<FlowType> $flowType
     */
    public function withFlowType(FlowType|string $flowType): self
    {
        $self = clone $this;
        $self['flowType'] = $flowType;

        return $self;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $self = clone $this;
        $self['isEnabled'] = $isEnabled;

        return $self;
    }

    public function withNextAvailableActionID(
        string $nextAvailableActionID
    ): self {
        $self = clone $this;
        $self['nextAvailableActionID'] = $nextAvailableActionID;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    public function withRevisionID(string $revisionID): self
    {
        $self = clone $this;
        $self['revisionID'] = $revisionID;

        return $self;
    }

    /**
     * @param list<int> $suppressionListIDs
     */
    public function withSuppressionListIDs(array $suppressionListIDs): self
    {
        $self = clone $this;
        $self['suppressionListIDs'] = $suppressionListIDs;

        return $self;
    }

    /**
     * @param list<APITimeWindow|array{
     *   day: value-of<Day>, endTime?: APITimeOfDay|null, startTime?: APITimeOfDay|null
     * }> $timeWindows
     */
    public function withTimeWindows(array $timeWindows): self
    {
        $self = clone $this;
        $self['timeWindows'] = $timeWindows;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
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
        $self = clone $this;
        $self['enrollmentCriteria'] = $enrollmentCriteria;

        return $self;
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
        $self = clone $this;
        $self['enrollmentSchedule'] = $enrollmentSchedule;

        return $self;
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
        $self = clone $this;
        $self['eventAnchor'] = $eventAnchor;

        return $self;
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
     *   eventTypeID: string,
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
     *   objectTypeID: string,
     *   operator: string,
     *   propertyWithObjectID: string,
     * }|PublicAssociationFilterBranch|array{
     *   associationCategory: string,
     *   associationTypeID: int,
     *   filterBranches: list<mixed>,
     *   filterBranchOperator: string,
     *   filterBranchType: value-of<PublicAssociationFilterBranch\FilterBranchType>,
     *   filters: list<PublicPropertyFilter|PublicAssociationInListFilter|PublicPageViewAnalyticsFilter|PublicCtaAnalyticsFilter|PublicEventAnalyticsFilter|PublicFormSubmissionFilter|PublicFormSubmissionOnPageFilter|PublicIntegrationEventFilter|PublicEmailSubscriptionFilter|PublicCommunicationSubscriptionFilter|PublicCampaignInfluencedFilter|PublicSurveyMonkeyFilter|PublicSurveyMonkeyValueFilter|PublicWebinarFilter|PublicEmailEventFilter|PublicPrivacyAnalyticsFilter|PublicAdsSearchFilter|PublicAdsTimeFilter|PublicInListFilter|PublicNumAssociationsFilter|PublicUnifiedEventsFilter|PublicPropertyAssociationInListFilter|PublicConstantFilter>,
     *   objectTypeID: string,
     *   operator: string,
     * } $goalFilterBranch
     */
    public function withGoalFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $goalFilterBranch,
    ): self {
        $self = clone $this;
        $self['goalFilterBranch'] = $goalFilterBranch;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withStartActionID(string $startActionID): self
    {
        $self = clone $this;
        $self['startActionID'] = $startActionID;

        return $self;
    }

    /**
     * @param APIUnEnrollmentSetting|array{
     *   flowIDs: list<string>,
     *   type: value-of<APIUnEnrollmentSetting\Type>,
     * } $unEnrollmentSetting
     */
    public function withUnEnrollmentSetting(
        APIUnEnrollmentSetting|array $unEnrollmentSetting
    ): self {
        $self = clone $this;
        $self['unEnrollmentSetting'] = $unEnrollmentSetting;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
