<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\Action;
use HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest\Type;
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
 * @phpstan-type api_platform_flow_put_request = array{
 *   actions: list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction>,
 *   blockedDates: list<APIBlockedDate>,
 *   customProperties: array<string, string>,
 *   isEnabled: bool,
 *   revisionID: string,
 *   timeWindows: list<APITimeWindow>,
 *   type: value-of<Type>,
 *   description?: string,
 *   enrollmentCriteria?: APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria,
 *   enrollmentSchedule?: APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule,
 *   name?: string,
 *   startActionID?: string,
 *   suppressionFilterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   uuid?: string,
 * }
 */
final class APIPlatformFlowPutRequest implements BaseModel
{
    /** @use SdkModel<api_platform_flow_put_request> */
    use SdkModel;

    /**
     * @var list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     */
    #[Api(list: Action::class)]
    public array $actions;

    /** @var list<APIBlockedDate> $blockedDates */
    #[Api(list: APIBlockedDate::class)]
    public array $blockedDates;

    /** @var array<string, string> $customProperties */
    #[Api(map: 'string')]
    public array $customProperties;

    #[Api]
    public bool $isEnabled;

    #[Api('revisionId')]
    public string $revisionID;

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

    #[Api('startActionId', optional: true)]
    public ?string $startActionID;

    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch;

    #[Api(optional: true)]
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
     * @param list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     * @param list<APIBlockedDate> $blockedDates
     * @param array<string, string> $customProperties
     * @param list<APITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
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
        APIListBasedEnrollmentCriteria|APIEventBasedEnrollmentCriteria|APIManualEnrollmentCriteria|null $enrollmentCriteria = null,
        APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule|null $enrollmentSchedule = null,
        ?string $name = null,
        ?string $startActionID = null,
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $suppressionFilterBranch = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->customProperties = $customProperties;
        $obj->isEnabled = $isEnabled;
        $obj->revisionID = $revisionID;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;

        null !== $description && $obj->description = $description;
        null !== $enrollmentCriteria && $obj->enrollmentCriteria = $enrollmentCriteria;
        null !== $enrollmentSchedule && $obj->enrollmentSchedule = $enrollmentSchedule;
        null !== $name && $obj->name = $name;
        null !== $startActionID && $obj->startActionID = $startActionID;
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
     * @param array<string, string> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $obj = clone $this;
        $obj->isEnabled = $isEnabled;

        return $obj;
    }

    public function withRevisionID(string $revisionID): self
    {
        $obj = clone $this;
        $obj->revisionID = $revisionID;

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
        $obj->startActionID = $startActionID;

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
