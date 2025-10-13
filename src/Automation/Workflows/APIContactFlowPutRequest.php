<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\Action;
use HubspotSDK\Automation\Workflows\APIContactFlowPutRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_contact_flow_put_request = array{
 *   actions: list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction>,
 *   blockedDates: list<APIBlockedDate>,
 *   canEnrollFromSalesforce: bool,
 *   customProperties: array<string, string>,
 *   isEnabled: bool,
 *   revisionID: string,
 *   suppressionListIDs: list<int>,
 *   timeWindows: list<APITimeWindow>,
 *   type: value-of<Type>,
 *   description?: string,
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
final class APIContactFlowPutRequest implements BaseModel
{
    /** @use SdkModel<api_contact_flow_put_request> */
    use SdkModel;

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
     * @param list<APIStaticBranchAction|APIListBranchAction|APIAbTestBranchAction|APICustomCodeAction|APIWebhookAction|APISingleConnectionAction> $actions
     * @param list<APIBlockedDate> $blockedDates
     * @param array<string, string> $customProperties
     * @param list<int> $suppressionListIDs
     * @param list<APITimeWindow> $timeWindows
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
        ?string $description = null,
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

        $obj->actions = $actions;
        $obj->blockedDates = $blockedDates;
        $obj->canEnrollFromSalesforce = $canEnrollFromSalesforce;
        $obj->customProperties = $customProperties;
        $obj->isEnabled = $isEnabled;
        $obj->revisionID = $revisionID;
        $obj->suppressionListIDs = $suppressionListIDs;
        $obj->timeWindows = $timeWindows;
        $obj['type'] = $type;

        null !== $description && $obj->description = $description;
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
