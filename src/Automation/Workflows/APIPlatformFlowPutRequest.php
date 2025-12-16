<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\Type;
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
 * @phpstan-import-type EnrollmentCriteriaShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\EnrollmentCriteria
 * @phpstan-import-type EnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\EnrollmentSchedule
 * @phpstan-import-type SuppressionFilterBranchShape from \HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\SuppressionFilterBranch
 *
 * @phpstan-type APIPlatformFlowPutRequestShape = array{
 *   actions: list<mixed>,
 *   blockedDates: list<APIBlockedDateShape>,
 *   customProperties: array<string,string>,
 *   isEnabled: bool,
 *   revisionID: string,
 *   timeWindows: list<APITimeWindowShape>,
 *   type: Type|value-of<Type>,
 *   description?: string|null,
 *   enrollmentCriteria?: null|EnrollmentCriteriaShape|APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: null|EnrollmentScheduleShape|APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   name?: string|null,
 *   startActionID?: string|null,
 *   suppressionFilterBranch?: null|SuppressionFilterBranchShape|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   uuid?: string|null,
 * }
 */
final class APIPlatformFlowPutRequest implements BaseModel
{
    /** @use SdkModel<APIPlatformFlowPutRequestShape> */
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

    #[Required]
    public bool $isEnabled;

    #[Required('revisionId')]
    public string $revisionID;

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
    public ?string $name;

    #[Optional('startActionId')]
    public ?string $startActionID;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Optional]
    public ?string $uuid;

    /**
     * `new APIPlatformFlowPutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIPlatformFlowPutRequest::with(
     *   actions: ...,
     *   blockedDates: ...,
     *   customProperties: ...,
     *   isEnabled: ...,
     *   revisionID: ...,
     *   timeWindows: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIPlatformFlowPutRequest)
     *   ->withActions(...)
     *   ->withBlockedDates(...)
     *   ->withCustomProperties(...)
     *   ->withIsEnabled(...)
     *   ->withRevisionID(...)
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
     * @param list<APITimeWindowShape> $timeWindows
     * @param Type|value-of<Type> $type
     * @param EnrollmentCriteriaShape $enrollmentCriteria
     * @param EnrollmentScheduleShape $enrollmentSchedule
     * @param SuppressionFilterBranchShape $suppressionFilterBranch
     */
    public static function with(
        array $actions,
        array $blockedDates,
        array $customProperties,
        bool $isEnabled,
        string $revisionID,
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
        $self['isEnabled'] = $isEnabled;
        $self['revisionID'] = $revisionID;
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
     * @param list<APIBlockedDateShape> $blockedDates
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
