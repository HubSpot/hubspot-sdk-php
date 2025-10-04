<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIContactFlowPutRequest\Action;
use HubspotSDK\Automation\AutomationAPIContactFlowPutRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_contact_flow_put_request = array{
 *   actions: list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction>,
 *   blockedDates: list<AutomationAPIBlockedDate>,
 *   canEnrollFromSalesforce: bool,
 *   customProperties: array<string, string>,
 *   isEnabled: bool,
 *   revisionID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<AutomationAPITimeWindow>,
 *   type: value-of<Type>,
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
final class AutomationAPIContactFlowPutRequest implements BaseModel
{
    /** @use SdkModel<automation_api_contact_flow_put_request> */
    use SdkModel;

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

    /** @var array<string, string> $customProperties */
    #[Api(map: 'string')]
    public array $customProperties;

    #[Api]
    public bool $isEnabled;

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
     * `new AutomationAPIContactFlowPutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIContactFlowPutRequest::with(
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
     * (new AutomationAPIContactFlowPutRequest)
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
     * @param list<AutomationAPIStaticBranchAction|AutomationAPIListBranchAction|AutomationAPIAbTestBranchAction|AutomationAPICustomCodeAction|AutomationAPIWebhookAction|AutomationAPISingleConnectionAction> $actions
     * @param list<AutomationAPIBlockedDate> $blockedDates
     * @param array<string, string> $customProperties
     * @param list<int> $suppressionListIDs
     * @param list<AutomationAPITimeWindow> $timeWindows
     * @param Type|value-of<Type> $type
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

        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->canEnrollFromSalesforce = $canEnrollFromSalesforce;
        $obj->customProperties = $customProperties;
        $obj->isEnabled = $isEnabled;
        $obj->revisionID = $revisionID;
        $obj->suppressionListIDs = $suppressionListIDs;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;

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
