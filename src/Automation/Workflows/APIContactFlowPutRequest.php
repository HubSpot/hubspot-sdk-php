<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\Action;
use HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\Type;
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
 * @phpstan-import-type APITimeWindowShape from \HubspotSDK\Automation\Workflows\APITimeWindow
 * @phpstan-import-type EnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\EnrollmentSchedule
 * @phpstan-import-type EventAnchorShape from \HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\EventAnchor
 * @phpstan-import-type GoalFilterBranchShape from \HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\GoalFilterBranch
 * @phpstan-import-type APIUnEnrollmentSettingShape from \HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting
 *
 * @phpstan-type APIContactFlowPutRequestShape = array{
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDateShape>,
 *   canEnrollFromSalesforce: bool,
 *   customProperties: array<string,string>,
 *   isEnabled: bool,
 *   revisionID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<APITimeWindowShape>,
 *   type: Type|value-of<Type>,
 *   description?: string|null,
 *   enrollmentCriteria?: null|EnrollmentCriteriaShape|APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: null|EnrollmentScheduleShape|APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   eventAnchor?: null|EventAnchorShape|APIContactPropertyAnchor|APIStaticDateAnchor,
 *   goalFilterBranch?: null|GoalFilterBranchShape|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   unEnrollmentSetting?: null|APIUnEnrollmentSetting|APIUnEnrollmentSettingShape,
 *   uuid?: string|null,
 * }
 */
final class APIContactFlowPutRequest implements BaseModel
{
    /** @use SdkModel<APIContactFlowPutRequestShape> */
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

    #[Required]
    public bool $isEnabled;

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
     * `new APIContactFlowPutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIContactFlowPutRequest::with(
     *   actions: ...,
     *   blockedDates: ...,
     *   canEnrollFromSalesforce: ...,
     *   customProperties: ...,
     *   isEnabled: ...,
     *   revisionID: ...,
     *   suppressionListIDs: ...,
     *   timeWindows: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIContactFlowPutRequest)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCanEnrollFromSalesforce(...)
     *   ->withCustomProperties(...)
     *   ->withIsEnabled(...)
     *   ->withRevisionID(...)
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
     * @param list<APIBlockedDateShape> $blockedDates
     * @param array<string,string> $customProperties
     * @param list<int> $suppressionListIDs
     * @param list<APITimeWindowShape> $timeWindows
     * @param Type|value-of<Type> $type
     * @param EnrollmentCriteriaShape $enrollmentCriteria
     * @param EnrollmentScheduleShape $enrollmentSchedule
     * @param EventAnchorShape $eventAnchor
     * @param GoalFilterBranchShape $goalFilterBranch
     * @param APIUnEnrollmentSettingShape $unEnrollmentSetting
     */
    public static function with(
        array $actions,
        array $blockedDates,
        bool $canEnrollFromSalesforce,
        array $customProperties,
        bool $isEnabled,
        string $revisionID,
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
        $self['isEnabled'] = $isEnabled;
        $self['revisionID'] = $revisionID;
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
     * @param list<APIBlockedDateShape> $blockedDates
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

    public function withIsEnabled(bool $isEnabled): self
    {
        $self = clone $this;
        $self['isEnabled'] = $isEnabled;

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
     * @param APIUnEnrollmentSettingShape $unEnrollmentSetting
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
