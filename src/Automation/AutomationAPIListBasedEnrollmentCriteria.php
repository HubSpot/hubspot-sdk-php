<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIListBasedEnrollmentCriteria\ReEnrollmentTriggersFilterBranch;
use HubspotSDK\Automation\AutomationAPIListBasedEnrollmentCriteria\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_list_based_enrollment_criteria = array{
 *   listFilterBranch: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 *   reEnrollmentTriggersFilterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   shouldReEnroll: bool,
 *   type: value-of<Type>,
 *   unEnrollObjectsNotMeetingCriteria: bool,
 * }
 */
final class AutomationAPIListBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<automation_api_list_based_enrollment_criteria> */
    use SdkModel;

    #[Api]
    public AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $listFilterBranch;

    /**
     * @var list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     */
    #[Api(list: ReEnrollmentTriggersFilterBranch::class)]
    public array $reEnrollmentTriggersFilterBranches;

    #[Api]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public bool $unEnrollObjectsNotMeetingCriteria;

    /**
     * `new AutomationAPIListBasedEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIListBasedEnrollmentCriteria::with(
     *   listFilterBranch: ...,
     *   reEnrollmentTriggersFilterBranches: ...,
     *   shouldReEnroll: ...,
     *   type: ...,
     *   unEnrollObjectsNotMeetingCriteria: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIListBasedEnrollmentCriteria)
     *   ->withListFilterBranch(...)
     *   ->withReEnrollmentTriggersFilterBranches(...)
     *   ->withShouldReEnroll(...)
     *   ->withType(...)
     *   ->withUnEnrollObjectsNotMeetingCriteria(...)
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
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $listFilterBranch,
        array $reEnrollmentTriggersFilterBranches,
        bool $shouldReEnroll,
        bool $unEnrollObjectsNotMeetingCriteria,
        Type|string $type = 'LIST_BASED',
    ): self {
        $obj = new self;

        $obj->listFilterBranch = $listFilterBranch;
        $obj->reEnrollmentTriggersFilterBranches = $reEnrollmentTriggersFilterBranches;
        $obj->shouldReEnroll = $shouldReEnroll;
        $obj['type'] = $type;
        $obj->unEnrollObjectsNotMeetingCriteria = $unEnrollObjectsNotMeetingCriteria;

        return $obj;
    }

    public function withListFilterBranch(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $listFilterBranch,
    ): self {
        $obj = clone $this;
        $obj->listFilterBranch = $listFilterBranch;

        return $obj;
    }

    /**
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     */
    public function withReEnrollmentTriggersFilterBranches(
        array $reEnrollmentTriggersFilterBranches
    ): self {
        $obj = clone $this;
        $obj->reEnrollmentTriggersFilterBranches = $reEnrollmentTriggersFilterBranches;

        return $obj;
    }

    public function withShouldReEnroll(bool $shouldReEnroll): self
    {
        $obj = clone $this;
        $obj->shouldReEnroll = $shouldReEnroll;

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

    public function withUnEnrollObjectsNotMeetingCriteria(
        bool $unEnrollObjectsNotMeetingCriteria
    ): self {
        $obj = clone $this;
        $obj->unEnrollObjectsNotMeetingCriteria = $unEnrollObjectsNotMeetingCriteria;

        return $obj;
    }
}
