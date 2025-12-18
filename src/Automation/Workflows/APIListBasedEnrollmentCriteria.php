<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria\ReEnrollmentTriggersFilterBranch;
use HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria\Type;
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
 * @phpstan-import-type ListFilterBranchShape from \HubspotSDK\Automation\Workflows\APIListBasedEnrollmentCriteria\ListFilterBranch
 *
 * @phpstan-type APIListBasedEnrollmentCriteriaShape = array{
 *   listFilterBranch: ListFilterBranchShape,
 *   reEnrollmentTriggersFilterBranches: list<mixed>,
 *   shouldReEnroll: bool,
 *   type: Type|value-of<Type>,
 *   unEnrollObjectsNotMeetingCriteria: bool,
 * }
 */
final class APIListBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<APIListBasedEnrollmentCriteriaShape> */
    use SdkModel;

    #[Required]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch;

    /** @var list<mixed> $reEnrollmentTriggersFilterBranches */
    #[Required(list: ReEnrollmentTriggersFilterBranch::class)]
    public array $reEnrollmentTriggersFilterBranches;

    #[Required]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
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
     * @param ListFilterBranchShape $listFilterBranch
     * @param list<mixed> $reEnrollmentTriggersFilterBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch,
        array $reEnrollmentTriggersFilterBranches,
        bool $shouldReEnroll,
        bool $unEnrollObjectsNotMeetingCriteria,
        Type|string $type = 'LIST_BASED',
    ): self {
        $self = new self;

        $self['listFilterBranch'] = $listFilterBranch;
        $self['reEnrollmentTriggersFilterBranches'] = $reEnrollmentTriggersFilterBranches;
        $self['shouldReEnroll'] = $shouldReEnroll;
        $self['type'] = $type;
        $self['unEnrollObjectsNotMeetingCriteria'] = $unEnrollObjectsNotMeetingCriteria;

        return $self;
    }

    /**
     * @param ListFilterBranchShape $listFilterBranch
     */
    public function withListFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $listFilterBranch,
    ): self {
        $self = clone $this;
        $self['listFilterBranch'] = $listFilterBranch;

        return $self;
    }

    /**
     * @param list<mixed> $reEnrollmentTriggersFilterBranches
     */
    public function withReEnrollmentTriggersFilterBranches(
        array $reEnrollmentTriggersFilterBranches
    ): self {
        $self = clone $this;
        $self['reEnrollmentTriggersFilterBranches'] = $reEnrollmentTriggersFilterBranches;

        return $self;
    }

    public function withShouldReEnroll(bool $shouldReEnroll): self
    {
        $self = clone $this;
        $self['shouldReEnroll'] = $shouldReEnroll;

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

    public function withUnEnrollObjectsNotMeetingCriteria(
        bool $unEnrollObjectsNotMeetingCriteria
    ): self {
        $self = clone $this;
        $self['unEnrollObjectsNotMeetingCriteria'] = $unEnrollObjectsNotMeetingCriteria;

        return $self;
    }
}
