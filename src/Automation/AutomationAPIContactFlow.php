<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIContactFlow\Action;
use HubspotSDK\Automation\AutomationAPIContactFlow\CRMObjectCreationStatus;
use HubspotSDK\Automation\AutomationAPIContactFlow\DataSource;
use HubspotSDK\Automation\AutomationAPIContactFlow\FlowType;
use HubspotSDK\Automation\AutomationAPIContactFlow\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_contact_flow = array{
 *   id: string,
 *   actions: list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction>,
 *   blockedDates: list<AutomationAPIBlockedDate>,
 *   canEnrollFromSalesforce: bool,
 *   createdAt: \DateTimeInterface,
 *   crmObjectCreationStatus: value-of<CRMObjectCreationStatus>,
 *   customProperties: array<string, string>,
 *   dataSources: list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource>,
 *   flowType: value-of<FlowType>,
 *   isEnabled: bool,
 *   nextAvailableActionID: string,
 *   objectTypeID: string,
 *   revisionID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<AutomationAPITimeWindow>,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   enrollmentCriteria?: AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria,
 *   enrollmentSchedule?: AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule,
 *   eventAnchor?: AutomationAPIContactPropertyAnchor|AutomationAPIStaticDateAnchor,
 *   goalFilterBranch?: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 *   name?: string,
 *   startActionID?: string,
 *   unEnrollmentSetting?: AutomationAPIUnEnrollmentSetting,
 *   uuid?: string,
 * }
 */
final class AutomationAPIContactFlow implements BaseModel
{
    /** @use SdkModel<automation_api_contact_flow> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * @var list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<AutomationAPIBlockedDate> $blockedDates */
    #[Api(list: AutomationAPIBlockedDate::class)]
    public array $blockedDates;

    #[Api]
    public bool $canEnrollFromSalesforce;

    #[Api]
    public \DateTimeInterface $createdAt;

    /** @var value-of<CRMObjectCreationStatus> $crmObjectCreationStatus */
    #[Api(enum: CRMObjectCreationStatus::class)]
    public string $crmObjectCreationStatus;

    /** @var array<string, string> $customProperties */
    #[Api(map: 'string')]
    public array $customProperties;

    /**
     * @var list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource> $dataSources
     */
    #[Api(list: DataSource::class)]
    public array $dataSources;

    /** @var value-of<FlowType> $flowType */
    #[Api(enum: FlowType::class)]
    public string $flowType;

    #[Api]
    public bool $isEnabled;

    #[Api('nextAvailableActionId')]
    public string $nextAvailableActionID;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api('revisionId')]
    public string $revisionID;

    /** @var list<int> $suppressionListIDs */
    #[Api('suppressionListIds', list: 'int')]
    public array $suppressionListIDs;

    /** @var list<AutomationAPITimeWindow> $timeWindows */
    #[Api(list: AutomationAPITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria|null $enrollmentCriteria;

    #[Api(optional: true)]
    public AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule;

    #[Api(optional: true)]
    public AutomationAPIContactPropertyAnchor|AutomationAPIStaticDateAnchor|null $eventAnchor;

    #[Api(optional: true)]
    public AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $goalFilterBranch;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('startActionId', optional: true)]
    public ?string $startActionID;

    #[Api(optional: true)]
    public ?AutomationAPIUnEnrollmentSetting $unEnrollmentSetting;

    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new AutomationAPIContactFlow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIContactFlow::with(
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
     * (new AutomationAPIContactFlow)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCanEnrollFromSalesforce(...)
     *   ->withCreatedAt(...)
     *   ->withCRMObjectCreationStatus(...)
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
     * @param list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     * @param list<AutomationAPIBlockedDate> $blockedDates
     * @param CRMObjectCreationStatus|value-of<CRMObjectCreationStatus> $crmObjectCreationStatus
     * @param array<string, string> $customProperties
     * @param list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<int> $suppressionListIDs
     * @param list<AutomationAPITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        array $actions,
        array $blockedDates,
        bool $canEnrollFromSalesforce,
        \DateTimeInterface $createdAt,
        CRMObjectCreationStatus|string $crmObjectCreationStatus,
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
        AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        AutomationAPIContactPropertyAnchor|AutomationAPIStaticDateAnchor|null $eventAnchor = null,
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $goalFilterBranch = null,
        ?string $name = null,
        ?string $startActionID = null,
        ?AutomationAPIUnEnrollmentSetting $unEnrollmentSetting = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->canEnrollFromSalesforce = $canEnrollFromSalesforce;
        $obj->createdAt = $createdAt;
        $obj->crmObjectCreationStatus = $crmObjectCreationStatus instanceof CRMObjectCreationStatus ? $crmObjectCreationStatus->value : $crmObjectCreationStatus;
        $obj->customProperties = $customProperties;
        $obj->dataSources = $dataSources;
        $obj->flowType = $flowType instanceof FlowType ? $flowType->value : $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->nextAvailableActionID = $nextAvailableActionID;
        $obj->objectTypeID = $objectTypeID;
        $obj->revisionID = $revisionID;
        $obj->suppressionListIDs = $suppressionListIDs;
        $obj->timeWindows = $timeWindows;
        $obj->type = $type instanceof Type ? $type->value : $type;
        $obj->updatedAt = $updatedAt;

        null !== $enrollmentCriteria && $obj->enrollmentCriteria = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj->enrollmentSchedule = $enrollmentSchedule;
        null !== $eventAnchor && $obj->eventAnchor = $eventAnchor;
        null !== $goalFilterBranch && $obj->goalFilterBranch = $goalFilterBranch;
        null !== $name && $obj->name = $name;
        null !== $startActionID && $obj->startActionID = $startActionID;
        null !== $unEnrollmentSetting && $obj->unEnrollmentSetting = $unEnrollmentSetting;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     */
    public function withActions(array $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    /**
     * @param list<AutomationAPIBlockedDate> $blockedDates
     */
    public function withBlockedDates(array $blockedDates): self
    {
        $obj = clone $this;
        $obj->blockedDates = $blockedDates;

        return $obj;
    }

    public function withCanEnrollFromSalesforce(
        bool $canEnrollFromSalesforce
    ): self {
        $obj = clone $this;
        $obj->canEnrollFromSalesforce = $canEnrollFromSalesforce;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param CRMObjectCreationStatus|value-of<CRMObjectCreationStatus> $crmObjectCreationStatus
     */
    public function withCRMObjectCreationStatus(
        CRMObjectCreationStatus|string $crmObjectCreationStatus
    ): self {
        $obj = clone $this;
        $obj->crmObjectCreationStatus = $crmObjectCreationStatus instanceof CRMObjectCreationStatus ? $crmObjectCreationStatus->value : $crmObjectCreationStatus;

        return $obj;
    }

    /**
     * @param array<string, string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }

    /**
     * @param list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource> $dataSources
     */
    public function withDataSources(array $dataSources): self
    {
        $obj = clone $this;
        $obj->dataSources = $dataSources;

        return $obj;
    }

    /**
     * @param FlowType|value-of<FlowType> $flowType
     */
    public function withFlowType(FlowType|string $flowType): self
    {
        $obj = clone $this;
        $obj->flowType = $flowType instanceof FlowType ? $flowType->value : $flowType;

        return $obj;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj->isEnabled = $isEnabled;

        return $obj;
    }

    public function withNextAvailableActionID(
        string $nextAvailableActionID
    ): self {
        $obj = clone $this;
        $obj->nextAvailableActionID = $nextAvailableActionID;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

        return $obj;
    }

    /**
     * @param list<int> $suppressionListIDs
     */
    public function withSuppressionListIDs(array $suppressionListIDs): self
    {
        $obj = clone $this;
        $obj->suppressionListIDs = $suppressionListIDs;

        return $obj;
    }

    /**
     * @param list<AutomationAPITimeWindow> $timeWindows
     */
    public function withTimeWindows(array $timeWindows): self
    {
        $obj = clone $this;
        $obj->timeWindows = $timeWindows;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withEnrollmentCriteria(
        AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria $enrollmentCriteria,
    ): self {
        $obj = clone $this;
        $obj->enrollmentCriteria = $enrollmentCriteria;

        return $obj;
    }

    public function withEnrollmentSchedule(
        AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule $enrollmentSchedule,
    ): self {
        $obj = clone $this;
        $obj->enrollmentSchedule = $enrollmentSchedule;

        return $obj;
    }

    public function withEventAnchor(
        AutomationAPIContactPropertyAnchor|AutomationAPIStaticDateAnchor $eventAnchor,
    ): self {
        $obj = clone $this;
        $obj->eventAnchor = $eventAnchor;

        return $obj;
    }

    public function withGoalFilterBranch(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $goalFilterBranch,
    ): self {
        $obj = clone $this;
        $obj->goalFilterBranch = $goalFilterBranch;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withStartActionID(string $startActionID): self
    {
        $obj = clone $this;
        $obj->startActionID = $startActionID;

        return $obj;
    }

    public function withUnEnrollmentSetting(
        AutomationAPIUnEnrollmentSetting $unEnrollmentSetting
    ): self {
        $obj = clone $this;
        $obj->unEnrollmentSetting = $unEnrollmentSetting;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
