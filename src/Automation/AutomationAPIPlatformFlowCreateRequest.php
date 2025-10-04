<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIPlatformFlowCreateRequest\Action;
use HubspotSDK\Automation\AutomationAPIPlatformFlowCreateRequest\DataSource;
use HubspotSDK\Automation\AutomationAPIPlatformFlowCreateRequest\FlowType;
use HubspotSDK\Automation\AutomationAPIPlatformFlowCreateRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_platform_flow_create_request = array{
 *   actions: list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction>,
 *   blockedDates: list<AutomationAPIBlockedDate>,
 *   customProperties: array<string, string>,
 *   dataSources: list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource>,
 *   flowType: value-of<FlowType>,
 *   isEnabled: bool,
 *   objectTypeID: string,
 *   timeWindows: list<AutomationAPITimeWindow>,
 *   type: value-of<Type>,
 *   enrollmentCriteria?: AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria,
 *   enrollmentSchedule?: AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule,
 *   name?: string,
 *   startActionID?: string,
 *   suppressionFilterBranch?: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 *   uuid?: string,
 * }
 */
final class AutomationAPIPlatformFlowCreateRequest implements BaseModel
{
    /** @use SdkModel<automation_api_platform_flow_create_request> */
    use SdkModel;

    /**
     * @var list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<AutomationAPIBlockedDate> $blockedDates */
    #[Api(list: AutomationAPIBlockedDate::class)]
    public array $blockedDates;

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

    #[Api('objectTypeId')]
    public string $objectTypeID;

    /** @var list<AutomationAPITimeWindow> $timeWindows */
    #[Api(list: AutomationAPITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

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
     * `new AutomationAPIPlatformFlowCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIPlatformFlowCreateRequest::with(
     *   actions: ...,
     *   blockedDates: ...,
     *   customProperties: ...,
     *   dataSources: ...,
     *   flowType: ...,
     *   isEnabled: ...,
     *   objectTypeID: ...,
     *   timeWindows: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIPlatformFlowCreateRequest)
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
     * @param list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     * @param list<AutomationAPIBlockedDate> $blockedDates
     * @param array<string, string> $customProperties
     * @param list<AutomationAPIAssociationDataSource|AutomationAPIAssociationTimestampDataSource|AutomationAPIStaticPropertyFilterDataSource|AutomationAPIEnrolledRecordPropertyFilterDataSource|AutomationAPIDatasetFieldPropertyFilterDataSource|AutomationAPIEnrolledArgumentPropertyFilterDataSource> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<AutomationAPITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $actions,
        array $blockedDates,
        array $customProperties,
        array $dataSources,
        FlowType|string $flowType,
        bool $isEnabled,
        string $objectTypeID,
        array $timeWindows,
        Type|string $type = 'PLATFORM_FLOW',
        AutomationAPIListBasedEnrollmentCriteria|AutomationAPIEventBasedEnrollmentCriteria|AutomationAPIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        AutomationAPIDailyEnrollmentSchedule|AutomationAPIWeeklyEnrollmentSchedule|AutomationAPIMonthlySpecificDaysEnrollmentSchedule|AutomationAPIMonthlyRelativeDaysEnrollmentSchedule|AutomationAPIYearlyEnrollmentSchedule|AutomationAPIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionID = null,
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->customProperties = $customProperties;
        $obj->dataSources = $dataSources;
        $obj['flowType'] = $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->objectTypeID = $objectTypeID;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;

        null !== $enrollmentCriteria && $obj->enrollmentCriteria = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj->enrollmentSchedule = $enrollmentSchedule;
        null !== $name && $obj->name = $name;
        null !== $startActionID && $obj->startActionID = $startActionID;
        null !== $suppressionFilterBranch && $obj->suppressionFilterBranch = $suppressionFilterBranch;
        null !== $uuid && $obj->uuid = $uuid;

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

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

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
