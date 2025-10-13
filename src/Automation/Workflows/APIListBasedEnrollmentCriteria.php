<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria\ReEnrollmentTriggersFilterBranch;
use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_list_based_enrollment_criteria = array{
 *   listFilterBranch: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 *   reEnrollmentTriggersFilterBranches: list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch>,
 *   shouldReEnroll: bool,
 *   type: value-of<Type>,
 *   unEnrollObjectsNotMeetingCriteria: bool,
 * }
 */
final class APIListBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<api_list_based_enrollment_criteria> */
    use SdkModel;

    /**
     * The list filter branch that represents the enrollment trigger to this flow.
     */
    #[Api]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch;

    /**
     * A list of filter branches to listen for in order to re-enroll objects into this workflow.
     *
     * @var list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     */
    #[Api(list: ReEnrollmentTriggersFilterBranch::class)]
    public array $reEnrollmentTriggersFilterBranches;

    /**
     * Whether or not the same object can enroll in this workflow twice.
     */
    #[Api]
    public bool $shouldReEnroll;

    /**
     * The type of enrollment criteria this is, this can be "LIST_BASED", "EVENT_BASED", or "MANUAL".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Whether or not to remove objects from this workflow if they stop meeting the enrollment criteria.
     */
    #[Api]
    public bool $unEnrollObjectsNotMeetingCriteria;

    /**
     * `new APIListBasedEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIListBasedEnrollmentCriteria::with(
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
     * (new APIListBasedEnrollmentCriteria)
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
     * @param list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch,
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

    /**
     * The list filter branch that represents the enrollment trigger to this flow.
     */
    public function withListFilterBranch(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch,
    ): self {
        $obj = clone $this;
        $obj->listFilterBranch = $listFilterBranch;

        return $obj;
    }

    /**
     * A list of filter branches to listen for in order to re-enroll objects into this workflow.
     *
     * @param list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $reEnrollmentTriggersFilterBranches
     */
    public function withReEnrollmentTriggersFilterBranches(
        array $reEnrollmentTriggersFilterBranches
    ): self {
        $obj = clone $this;
        $obj->reEnrollmentTriggersFilterBranches = $reEnrollmentTriggersFilterBranches;

        return $obj;
    }

    /**
     * Whether or not the same object can enroll in this workflow twice.
     */
    public function withShouldReEnroll(bool $shouldReEnroll): self
    {
        $obj = clone $this;
        $obj->shouldReEnroll = $shouldReEnroll;

        return $obj;
    }

    /**
     * The type of enrollment criteria this is, this can be "LIST_BASED", "EVENT_BASED", or "MANUAL".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Whether or not to remove objects from this workflow if they stop meeting the enrollment criteria.
     */
    public function withUnEnrollObjectsNotMeetingCriteria(
        bool $unEnrollObjectsNotMeetingCriteria
    ): self {
        $obj = clone $this;
        $obj->unEnrollObjectsNotMeetingCriteria = $unEnrollObjectsNotMeetingCriteria;

        return $obj;
    }
}
