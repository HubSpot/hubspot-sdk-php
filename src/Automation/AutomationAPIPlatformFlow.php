<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIPlatformFlow\Action;
use HubspotSDK\Automation\AutomationAPIPlatformFlow\CRMObjectCreationStatus;
use HubspotSDK\Automation\AutomationAPIPlatformFlow\DataSource;
use HubspotSDK\Automation\AutomationAPIPlatformFlow\FlowType;
use HubspotSDK\Automation\AutomationAPIPlatformFlow\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_platform_flow = array{
 *   id: string,
 *   actions: list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction>,
 *   blockedDates: list<AutomationAPIBlockedDate>,
 *   createdAt: \DateTimeInterface,
 *   crmObjectCreationStatus: value-of<CRMObjectCreationStatus>,
 *   customProperties: array<string, string>,
 *   dataSources: list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource>,
 *   flowType: value-of<FlowType>,
 *   isEnabled: bool,
 *   nextAvailableActionID: string,
 *   objectTypeID: string,
 *   revisionID: string,
 *   timeWindows: list<AutomationAPITimeWindow>,
 *   type: value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   enrollmentCriteria?: AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria,
 *   enrollmentSchedule?: AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule,
 *   name?: string,
 *   startActionID?: string,
 *   suppressionFilterBranch?: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 *   uuid?: string,
 * }
 */
final class AutomationAPIPlatformFlow implements BaseModel
{
    /** @use SdkModel<automation_api_platform_flow> */
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
    public ?string $name;

    #[Api('startActionId', optional: true)]
    public ?string $startActionID;

    #[Api(optional: true)]
    public AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Api(optional: true)]
    public ?string $uuid;

    /**
     * `new AutomationAPIPlatformFlow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIPlatformFlow::with(
     *   id: ...,
     *   actions: ...,
     *   blockedDates: ...,
     *   createdAt: ...,
     *   crmObjectCreationStatus: ...,
     *   customProperties: ...,
     *   dataSources: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   nextAvailableActionID: ...,
     *   objectTypeID: ...,
     *   revisionID: ...,
     *   timeWindows: ...,
     *   type: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIPlatformFlow)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCreatedAt(...)
     *   ->withCRMObjectCreationStatus(...)
     *   ->withCustomProperties(...)
     *   ->withDataSources(...)
     *   ->withFlowType(...)
     *   ->withIsEnabled(...)
     *   ->withNextAvailableActionID(...)
     *   ->withObjectTypeID(...)
     *   ->withRevisionID(...)
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
     * @param list<AutomationAPITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        array $actions,
        array $blockedDates,
        \DateTimeInterface $createdAt,
        CRMObjectCreationStatus|string $crmObjectCreationStatus,
        array $customProperties,
        array $dataSources,
        FlowType|string $flowType,
        bool $isEnabled,
        string $nextAvailableActionID,
        string $objectTypeID,
        string $revisionID,
        array $timeWindows,
        \DateTimeInterface $updatedAt,
        Type|string $type = 'PLATFORM_FLOW',
        AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionID = null,
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->createdAt = $createdAt;
        $obj['crmObjectCreationStatus'] = $crmObjectCreationStatus;
        $obj->customProperties = $customProperties;
        $obj->dataSources = $dataSources;
        $obj['flowType'] = $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->nextAvailableActionID = $nextAvailableActionID;
        $obj->objectTypeID = $objectTypeID;
        $obj->revisionID = $revisionID;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;
        $obj->updatedAt = $updatedAt;

        null !== $enrollmentCriteria && $obj->enrollmentCriteria = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj->enrollmentSchedule = $enrollmentSchedule;
        null !== $name && $obj->name = $name;
        null !== $startActionID && $obj->startActionID = $startActionID;
        null !== $suppressionFilterBranch && $obj->suppressionFilterBranch = $suppressionFilterBranch;
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
        $obj['crmObjectCreationStatus'] = $crmObjectCreationStatus;

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
        $obj['flowType'] = $flowType;

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
        $obj['type'] = $type;

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

    public function withSuppressionFilterBranch(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $suppressionFilterBranch,
    ): self {
        $obj = clone $this;
        $obj->suppressionFilterBranch = $suppressionFilterBranch;

        return $obj;
    }

    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj->uuid = $uuid;

        return $obj;
    }
}
