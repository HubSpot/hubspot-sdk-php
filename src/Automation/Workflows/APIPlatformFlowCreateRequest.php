<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\DataSource;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\FlowType;
use HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\Type;
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
 * @phpstan-import-type DataSourceVariants from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\DataSource
 * @phpstan-import-type EnrollmentCriteriaVariants from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleVariants from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\EnrollmentSchedule
 * @phpstan-import-type SuppressionFilterBranchVariants from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\SuppressionFilterBranch
 * @phpstan-import-type APIBlockedDateShape from \HubspotSDK\Automation\Workflows\APIBlockedDate
 * @phpstan-import-type DataSourceShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\DataSource
 * @phpstan-import-type APITimeWindowShape from \HubspotSDK\Automation\Workflows\APITimeWindow
 * @phpstan-import-type EnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\EnrollmentSchedule
 * @phpstan-import-type SuppressionFilterBranchShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest\SuppressionFilterBranch
 *
 * @phpstan-type APIPlatformFlowCreateRequestShape = array{
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDate|APIBlockedDateShape>,
 *   customProperties: array<string,string>,
 *   dataSources: list<DataSourceShape>,
 *   flowType: FlowType|value-of<FlowType>,
 *   isEnabled: bool,
 *   objectTypeID: string,
 *   timeWindows: list<APITimeWindow|APITimeWindowShape>,
 *   type: Type|value-of<Type>,
 *   description?: string|null,
 *   enrollmentCriteria?: EnrollmentCriteriaShape|null,
 *   enrollmentSchedule?: EnrollmentScheduleShape|null,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   suppressionFilterBranch?: SuppressionFilterBranchShape|null,
 *   uuid?: string|null,
 * }
 */
final class APIPlatformFlowCreateRequest implements BaseModel
{
    /** @use SdkModel<APIPlatformFlowCreateRequestShape> */
    use SdkModel;

    /** @var list<mixed> $actions */
    #[Required(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Required(list: APIBlockedDate::class)]
    public array $blockedDates;

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

    #[Optional]
    public ?string $name;

    #[Optional('startActionId')]
    public ?string $startActionID;

    /** @var SuppressionFilterBranchVariants|null $suppressionFilterBranch */
    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Optional]
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
     *   objectTypeID: ...,
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
     * @param list<APIBlockedDate|APIBlockedDateShape> $blockedDates
     * @param array<string,string> $customProperties
     * @param list<DataSourceShape> $dataSources
     * @param FlowType|value-of<FlowType> $flowType
     * @param list<APITimeWindow|APITimeWindowShape> $timeWindows
     * @param Type|value-of<Type> $type
     * @param EnrollmentCriteriaShape|null $enrollmentCriteria
     * @param EnrollmentScheduleShape|null $enrollmentSchedule
     * @param SuppressionFilterBranchShape|null $suppressionFilterBranch
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
        ?string $description = null,
        APIListBasedEnrollmentCriteria|array|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|array|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionID = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        $self['actions'] = $actions;
        $self['blockedDates'] = $blockedDates;
        $self['customProperties'] = $customProperties;
        $self['dataSources'] = $dataSources;
        $self['flowType'] = $flowType;
        $self['isEnabled'] = $isEnabled;
        $self['objectTypeID'] = $objectTypeID;
        $self['timeWindows'] = $timeWindows;
        $self['type'] = $type;

        null !== $description && $self['description'] = $description;
        null !== $enrollmentCriteria && $self['enrollmentCriteria'] = $enrollmentCriteria;
        null !== $enrollmentSchedule && $self['enrollmentSchedule'] = $enrollmentSchedule;
        null !== $name && $self['name'] = $name;
        null !== $startActionID && $self['startActionID'] = $startActionID;
        null !== $suppressionFilterBranch && $self['suppressionFilterBranch'] = $suppressionFilterBranch;
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
