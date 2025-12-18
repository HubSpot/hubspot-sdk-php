<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPlatformFlow\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlow\CrmObjectCreationStatus;
use HubspotSDK\Automation\Workflows\APIPlatformFlow\DataSource;
use HubspotSDK\Automation\Workflows\APIPlatformFlow\FlowType;
use HubspotSDK\Automation\Workflows\APIPlatformFlow\Type;
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
 * @phpstan-import-type APIBlockedDateShape from \HubspotSDK\Automation\Workflows\APIBlockedDate
 * @phpstan-import-type DataSourceShape from \HubspotSDK\Automation\Workflows\APIPlatformFlow\DataSource
 * @phpstan-import-type APITimeWindowShape from \HubspotSDK\Automation\Workflows\APITimeWindow
 * @phpstan-import-type EnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIPlatformFlow\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIPlatformFlow\EnrollmentSchedule
 * @phpstan-import-type SuppressionFilterBranchShape from \HubspotSDK\Automation\Workflows\APIPlatformFlow\SuppressionFilterBranch
 *
 * @phpstan-type APIPlatformFlowShape = array{
 *   id: string,
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDateShape>,
 *   createdAt: \DateTimeInterface,
 *   crmObjectCreationStatus: CrmObjectCreationStatus|value-of<CrmObjectCreationStatus>,
 *   customProperties: array<string,string>,
 *   dataSources: list<DataSourceShape>,
 *   flowType: FlowType|value-of<FlowType>,
 *   isEnabled: bool,
 *   nextAvailableActionID: string,
 *   objectTypeID: string,
 *   revisionID: string,
 *   timeWindows: list<APITimeWindowShape>,
 *   type: Type|value-of<Type>,
 *   updatedAt: \DateTimeInterface,
 *   description?: string|null,
 *   enrollmentCriteria?: EnrollmentCriteriaShape|null,
 *   enrollmentSchedule?: EnrollmentScheduleShape|null,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   suppressionFilterBranch?: SuppressionFilterBranchShape|null,
 *   uuid?: string|null,
 * }
 */
final class APIPlatformFlow implements BaseModel
{
    /** @use SdkModel<APIPlatformFlowShape> */
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
    public ?string $name;

    #[Optional('startActionId')]
    public ?string $startActionID;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Optional]
    public ?string $uuid;

    /**
     * `new APIPlatformFlow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIPlatformFlow::with(
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
     * (new APIPlatformFlow)
     *   ->withID(...)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCreatedAt(...)
     *   ->withCrmObjectCreationStatus(...)
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
     * @param list<mixed> $actions
     * @param list<APIBlockedDateShape> $blockedDates
     * @param CrmObjectCreationStatus|value-of<CrmObjectCreationStatus> $crmObjectCreationStatus
     * @param array<string,string> $customProperties
     * @param list<DataSourceShape> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<APITimeWindowShape> $timeWindows
     * @param Type|value-of<Type> $type
     * @param EnrollmentCriteriaShape|null $enrollmentCriteria
     * @param EnrollmentScheduleShape|null $enrollmentSchedule
     * @param SuppressionFilterBranchShape|null $suppressionFilterBranch
     */
    public static function with(
        string $id,
        array $actions,
        array $blockedDates,
        \DateTimeInterface $createdAt,
        CrmObjectCreationStatus|string $crmObjectCreationStatus,
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
        ?string $description = null,
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionID = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actions'] = $actions;
        $self['blockedDates'] = $blockedDates;
        $self['createdAt'] = $createdAt;
        $self['crmObjectCreationStatus'] = $crmObjectCreationStatus;
        $self['customProperties'] = $customProperties;
        $self['dataSources'] = $dataSources;
        $self['flowType'] = $flowType;
        $self['isEnabled'] = $isEnabled;
        $self['nextAvailableActionID'] = $nextAvailableActionID;
        $self['objectTypeID'] = $objectTypeID;
        $self['revisionID'] = $revisionID;
        $self['timeWindows'] = $timeWindows;
        $self['type'] = $type;
        $self['updatedAt'] = $updatedAt;

        null !== $description && $self['description'] = $description;
        null !== $enrollmentCriteria && $self['enrollmentCriteria'] = $enrollmentCriteria;
        null !== $enrollmentSchedule && $self['enrollmentSchedule'] = $enrollmentSchedule;
        null !== $name && $self['name'] = $name;
        null !== $startActionID && $self['startActionID'] = $startActionID;
        null !== $suppressionFilterBranch && $self['suppressionFilterBranch'] = $suppressionFilterBranch;
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
     * @param list<APIBlockedDateShape> $blockedDates
     */
    public function withBlockedDates(array $blockedDates): self
    {
        $self = clone $this;
        $self['blockedDates'] = $blockedDates;

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
     * @param list<APITimeWindowShape> $timeWindows
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
     * @param SuppressionFilterBranchShape $suppressionFilterBranch
     */
    public function withSuppressionFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $suppressionFilterBranch,
    ): self {
        $self = clone $this;
        $self['suppressionFilterBranch'] = $suppressionFilterBranch;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
