<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\Action;
use HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\DataSource;
use HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\FlowType;
use HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAndFilterBranch;
use HubspotSDK\PublicAssociationFilterBranch;
use HubspotSDK\PublicNotAllFilterBranch;
use HubspotSDK\PublicNotAnyFilterBranch;
use HubspotSDK\PublicOrFilterBranch;
use HubspotSDK\PublicPropertyAssociationFilterBranch;
use HubspotSDK\PublicRestrictedFilterBranch;
use HubspotSDK\PublicUnifiedEventsFilterBranch;

/**
 * @phpstan-import-type DataSourceVariants from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\DataSource
 * @phpstan-import-type EnrollmentCriteriaVariants from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleVariants from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EnrollmentSchedule
 * @phpstan-import-type EventAnchorVariants from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EventAnchor
 * @phpstan-import-type GoalFilterBranchVariants from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\GoalFilterBranch
 * @phpstan-import-type APIBlockedDateShape from \HubspotSDK\Automation\Workflows\APIBlockedDate
 * @phpstan-import-type DataSourceShape from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\DataSource
 * @phpstan-import-type APITimeWindowShape from \HubspotSDK\Automation\Workflows\APITimeWindow
 * @phpstan-import-type EnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EnrollmentSchedule
 * @phpstan-import-type EventAnchorShape from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\EventAnchor
 * @phpstan-import-type GoalFilterBranchShape from \HubspotSDK\Automation\Workflows\APIContactFlowCreateRequest\GoalFilterBranch
 * @phpstan-import-type APIUnEnrollmentSettingShape from \HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting
 *
 * @phpstan-type APIContactFlowCreateRequestShape = array{
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDate|APIBlockedDateShape>,
 *   canEnrollFromSalesforce: bool,
 *   customProperties: array<string,string>,
 *   dataSources: list<DataSourceShape>,
 *   flowType: FlowType|value-of<FlowType>,
 *   isEnabled: bool,
 *   objectTypeID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<APITimeWindow|APITimeWindowShape>,
 *   type: Type|value-of<Type>,
 *   description?: string|null,
 *   enrollmentCriteria?: EnrollmentCriteriaShape|null,
 *   enrollmentSchedule?: EnrollmentScheduleShape|null,
 *   eventAnchor?: EventAnchorShape|null,
 *   goalFilterBranch?: GoalFilterBranchShape|null,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   unEnrollmentSetting?: null|APIUnEnrollmentSetting|APIUnEnrollmentSettingShape,
 *   uuid?: string|null,
 * }
 */
final class APIContactFlowCreateRequest implements BaseModel
{
    /** @use SdkModel<APIContactFlowCreateRequestShape> */
    use SdkModel;

    /** @var list<mixed> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Required(list: APIBlockedDate::class)]
    public array $blockedDates;

    #[Required]
    public bool $canEnrollFromSalesforce;

    /** @var array<string,string> $customProperties */
    #[Required(map: 'string')]
    public array $customProperties;

    /** @var list<DataSourceVariants> $dataSources */
    #[Required(list: DataSource::class)]
    public array $dataSources;

    /** @var value-of<FlowType> $flowType */
    #[Required(enum: FlowType::class)]
    public string $flowType;

    #[Required]
    public bool $isEnabled;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /** @var list<int> $suppressionListIDs */
    #[Required('suppressionListIds', list: 'int')]
    public array $suppressionListIDs;

    /** @var list<APITimeWindow> $timeWindows */
    #[Required(list: APITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $description;

    /** @var EnrollmentCriteriaVariants|null $enrollmentCriteria */
    #[Optional]
    public APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria;

    /** @var EnrollmentScheduleVariants|null $enrollmentSchedule */
    #[Optional]
    public APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule;

    /** @var EventAnchorVariants|null $eventAnchor */
    #[Optional]
    public APIContactPropertyAnchor|APIStaticDateAnchor|null $eventAnchor;

    /** @var GoalFilterBranchVariants|null $goalFilterBranch */
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
     * `new APIContactFlowCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIContactFlowCreateRequest::with(
     *   actions: ...,
     *   blockedDates: ...,
     *   canEnrollFromSalesforce: ...,
     *   customProperties: ...,
     *   dataSources: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   objectTypeID: ...,
     *   suppressionListIDs: ...,
     *   timeWindows: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIContactFlowCreateRequest)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCanEnrollFromSalesforce(...)
     *   ->withCustomProperties(...)
     *   ->withDataSources(...)
     *   ->withFlowType(...)
     *   ->withIsEnabled(...)
     *   ->withObjectTypeID(...)
     *   ->withSuppressionListIDs(...)
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
     * @param list<APIBlockedDate|APIBlockedDateShape> $blockedDates
     * @param array<string,string> $customProperties
     * @param list<DataSourceShape> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<int> $suppressionListIDs
     * @param list<APITimeWindow|APITimeWindowShape> $timeWindows
     * @param Type|value-of<Type> $type
     * @param EnrollmentCriteriaShape|null $enrollmentCriteria
     * @param EnrollmentScheduleShape|null $enrollmentSchedule
     * @param EventAnchorShape|null $eventAnchor
     * @param GoalFilterBranchShape|null $goalFilterBranch
     * @param APIUnEnrollmentSetting|APIUnEnrollmentSettingShape|null $unEnrollmentSetting
     */
    public static function with(
        array $actions,
        array $blockedDates,
        bool $canEnrollFromSalesforce,
        array $customProperties,
        array $dataSources,
        FlowType|string $flowType,
        bool $isEnabled,
        string $objectTypeID,
        array $suppressionListIDs,
        array $timeWindows,
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

        $self['actions'] = $actions;
        $self['blockedDates'] = $blockedDates;
        $self['canEnrollFromSalesforce'] = $canEnrollFromSalesforce;
        $self['customProperties'] = $customProperties;
        $self['dataSources'] = $dataSources;
        $self['flowType'] = $flowType;
        $self['isEnabled'] = $isEnabled;
        $self['objectTypeID'] = $objectTypeID;
        $self['suppressionListIDs'] = $suppressionListIDs;
        $self['timeWindows'] = $timeWindows;
        $self['type'] = $type;

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
     * @param list<APIBlockedDate|APIBlockedDateShape> $blockedDates
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
     * @param list<DataSourceShape> $dataSources
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

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

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
     * @param list<APITimeWindow|APITimeWindowShape> $timeWindows
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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param EnrollmentCriteriaShape $enrollmentCriteria
     */
    public function withEnrollmentCriteria(
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria $enrollmentCriteria,
    ): self {
        $self = clone $this;
        $self['enrollmentCriteria'] = $enrollmentCriteria;

        return $self;
    }

    /**
     * @param EnrollmentScheduleShape $enrollmentSchedule
     */
    public function withEnrollmentSchedule(
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule $enrollmentSchedule,
    ): self {
        $self = clone $this;
        $self['enrollmentSchedule'] = $enrollmentSchedule;

        return $self;
    }

    /**
     * @param EventAnchorShape $eventAnchor
     */
    public function withEventAnchor(
        APIContactPropertyAnchor|array|APIStaticDateAnchor $eventAnchor
    ): self {
        $self = clone $this;
        $self['eventAnchor'] = $eventAnchor;

        return $self;
    }

    /**
     * @param GoalFilterBranchShape $goalFilterBranch
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
     * @param APIUnEnrollmentSetting|APIUnEnrollmentSettingShape $unEnrollmentSetting
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
