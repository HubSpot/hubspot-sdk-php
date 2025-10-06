<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIContactFlow\Action;
use HubspotSDK\Automation\APIContactFlow\CRMObjectCreationStatus;
use HubspotSDK\Automation\APIContactFlow\DataSource;
use HubspotSDK\Automation\APIContactFlow\FlowType;
use HubspotSDK\Automation\APIContactFlow\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_contact_flow = array{
 *   id: string,
 *   actions: list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction>,
 *   blockedDates: list<APIBlockedDate>,
 *   canEnrollFromSalesforce: bool,
 *   createdAt: \DateTimeInterface,
 *   crmObjectCreationStatus: value-of<CRMObjectCreationStatus>,
 *   customProperties: array<string, string>,
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
 *   enrollmentCriteria?: APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   eventAnchor?: APIContactPropertyAnchor|APIStaticDateAnchor,
 *   goalFilterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   name?: string,
 *   startActionID?: string,
 *   unEnrollmentSetting?: APIUnEnrollmentSetting,
 *   uuid?: string,
 * }
 */
final class APIContactFlow implements BaseModel
{
    /** @use SdkModel<api_contact_flow> */
    use SdkModel;

    #[Api]
    public string $id;

    /**
     * @var list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Api(list: APIBlockedDate::class)]
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
     * @var list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
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

    /** @var list<APITimeWindow> $timeWindows */
    #[Api(list: APITimeWindow::class)]
    public array $timeWindows;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public \DateTimeInterface $updatedAt;

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

    #[Api('startActionId', optional: true)]
    public ?string $startActionID;

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
     * @param list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     * @param list<APIBlockedDate> $blockedDates
     * @param CRMObjectCreationStatus|value-of<CRMObjectCreationStatus> $crmObjectCreationStatus
     * @param array<string, string> $customProperties
     * @param list<APIAssociationDataSource|APIAssociationTimestampDataSource|APIStaticPropertyFilterDataSource|APIEnrolledRecordPropertyFilterDataSource|APIDatasetFieldPropertyFilterDataSource|APIEnrolledArgumentPropertyFilterDataSource> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<int> $suppressionListIDs
     * @param list<APITimeWindow> $timeWindows
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
        APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        APIContactPropertyAnchor|APIStaticDateAnchor|null $eventAnchor = null,
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $goalFilterBranch = null,
        ?string $name = null,
        ?string $startActionID = null,
        ?APIUnEnrollmentSetting $unEnrollmentSetting = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->canEnrollFromSalesforce = $canEnrollFromSalesforce;
        $obj->createdAt = $createdAt;
        $obj['crmObjectCreationStatus'] = $crmObjectCreationStatus;
        $obj->customProperties = $customProperties;
        $obj->dataSources = $dataSources;
        $obj['flowType'] = $flowType;
        $obj->isEnabled = $isEnabled;
        $obj->nextAvailableActionID = $nextAvailableActionID;
        $obj->objectTypeID = $objectTypeID;
        $obj->revisionID = $revisionID;
        $obj->suppressionListIDs = $suppressionListIDs;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;
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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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

    public function withEventAnchor(
        APIContactPropertyAnchor|APIStaticDateAnchor $eventAnchor
    ): self {
        $obj = clone $this;
        $obj->eventAnchor = $eventAnchor;

        return $obj;
    }

    public function withGoalFilterBranch(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $goalFilterBranch,
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
        APIUnEnrollmentSetting $unEnrollmentSetting
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
