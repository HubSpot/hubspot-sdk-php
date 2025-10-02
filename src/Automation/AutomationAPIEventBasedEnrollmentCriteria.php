<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIEventBasedEnrollmentCriteria\ListMembershipFilterBranch;
use HubspotSDK\Automation\AutomationAPIEventBasedEnrollmentCriteria\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_event_based_enrollment_criteria = array{
 *   eventFilterBranches: list<AutomationPublicUnifiedEventsFilterBranch>,
 *   listMembershipFilterBranches: list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch>,
 *   shouldReEnroll: bool,
 *   type: value-of<Type>,
 *   refinementCriteria?: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 * }
 */
final class AutomationAPIEventBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<automation_api_event_based_enrollment_criteria> */
    use SdkModel;

    /** @var list<AutomationPublicUnifiedEventsFilterBranch> $eventFilterBranches */
    #[Api(list: AutomationPublicUnifiedEventsFilterBranch::class)]
    public array $eventFilterBranches;

    /**
     * @var list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $listMembershipFilterBranches
     */
    #[Api(list: ListMembershipFilterBranch::class)]
    public array $listMembershipFilterBranches;

    #[Api]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $refinementCriteria;

    /**
     * `new AutomationAPIEventBasedEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIEventBasedEnrollmentCriteria::with(
     *   eventFilterBranches: ...,
     *   listMembershipFilterBranches: ...,
     *   shouldReEnroll: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIEventBasedEnrollmentCriteria)
     *   ->withEventFilterBranches(...)
     *   ->withListMembershipFilterBranches(...)
     *   ->withShouldReEnroll(...)
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
     * @param list<AutomationPublicUnifiedEventsFilterBranch> $eventFilterBranches
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $listMembershipFilterBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $eventFilterBranches,
        array $listMembershipFilterBranches,
        bool $shouldReEnroll,
        Type|string $type = 'EVENT_BASED',
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $refinementCriteria = null,
    ): self {
        $obj = new self;

        $obj->eventFilterBranches = $eventFilterBranches;
        $obj->listMembershipFilterBranches = $listMembershipFilterBranches;
        $obj->shouldReEnroll = $shouldReEnroll;
        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $refinementCriteria && $obj->refinementCriteria = $refinementCriteria;

        return $obj;
    }

    /**
     * @param list<AutomationPublicUnifiedEventsFilterBranch> $eventFilterBranches
     */
    public function withEventFilterBranches(array $eventFilterBranches): self
    {
        $obj = clone $this;
        $obj->eventFilterBranches = $eventFilterBranches;

        return $obj;
    }

    /**
     * @param list<AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch> $listMembershipFilterBranches
     */
    public function withListMembershipFilterBranches(
        array $listMembershipFilterBranches
    ): self {
        $obj = clone $this;
        $obj->listMembershipFilterBranches = $listMembershipFilterBranches;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withRefinementCriteria(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $refinementCriteria,
    ): self {
        $obj = clone $this;
        $obj->refinementCriteria = $refinementCriteria;

        return $obj;
    }
}
