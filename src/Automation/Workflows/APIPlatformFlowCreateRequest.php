<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\DataSource;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\FlowType;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Type;
use HubspotSDK\Core\Attributes\Api;
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
 * @phpstan-type APIPlatformFlowCreateRequestShape = array{
 *   actions: list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction>,
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

    /**
     * @var list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     */
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
     * @param list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     * @param list<APIBlockedDate> $blockedDates
     * @param array<string,string> $customProperties
     * @param list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<APITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
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
        APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionId = null,
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->customProperties = $customProperties;
        $obj->dataSources = $dataSources;
        $obj['flowType'] = $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->objectTypeId = $objectTypeId;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;

        null !== $description && $obj->description = $description;
        null !== $enrollmentCriteria && $obj->enrollmentCriteria = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj->enrollmentSchedule = $enrollmentSchedule;
        null !== $name && $obj->name = $name;
        null !== $startActionId && $obj->startActionId = $startActionId;
        null !== $suppressionFilterBranch && $obj->suppressionFilterBranch = $suppressionFilterBranch;
        null !== $uuid && $obj->uuid = $uuid;

        return $obj;
    }

    /**
     * @param list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     */
    public function withActions(array $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    /**
     * @param list<APIBlockedDate> $blockedDates
     */
    public function withBlockedDates(array $blockedDates): self
    {
        $obj = clone $this;
        $obj->blockedDates = $blockedDates;

        return $obj;
    }

    /**
     * @param array<string,string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }

    /**
     * @param list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
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
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<APITimeWindow> $timeWindows
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

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withEnrollmentCriteria(
        APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria $enrollmentCriteria,
    ): self {
        $obj = clone $this;
        $obj->enrollmentCriteria = $enrollmentCriteria;

        return $obj;
    }

    public function withEnrollmentSchedule(
        APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule $enrollmentSchedule,
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
        $obj->startActionId = $startActionID;

        return $obj;
    }

    public function withSuppressionFilterBranch(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $suppressionFilterBranch,
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
