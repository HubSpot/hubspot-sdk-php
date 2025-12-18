<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria\ListMembershipFilterBranch;
use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria\Type;
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
 * @phpstan-import-type RefinementCriteriaShape from \HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria\RefinementCriteria
 *
 * @phpstan-type APIEventBasedEnrollmentCriteriaShape = array{
 *   eventFilterBranches: list<mixed>,
 *   listMembershipFilterBranches: list<mixed>,
 *   shouldReEnroll: bool,
 *   type: Type|value-of<Type>,
 *   refinementCriteria?: RefinementCriteriaShape|null,
 * }
 */
final class APIEventBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<APIEventBasedEnrollmentCriteriaShape> */
    use SdkModel;

    /** @var list<mixed> $eventFilterBranches */
    #[Required(list: PublicUnifiedEventsFilterBranch::class)]
    public array $eventFilterBranches;

    /** @var list<mixed> $listMembershipFilterBranches */
    #[Required(list: ListMembershipFilterBranch::class)]
    public array $listMembershipFilterBranches;

    #[Required]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $refinementCriteria;

    /**
     * `new APIEventBasedEnrollmentCriteria()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIEventBasedEnrollmentCriteria::with(
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
     * (new APIEventBasedEnrollmentCriteria)
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
     * @param list<mixed> $eventFilterBranches
     * @param list<mixed> $listMembershipFilterBranches
     * @param Type|value-of<Type> $type
     * @param RefinementCriteriaShape|null $refinementCriteria
     */
    public static function with(
        array $eventFilterBranches,
        array $listMembershipFilterBranches,
        bool $shouldReEnroll,
        Type|string $type = 'EVENT_BASED',
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $refinementCriteria = null,
    ): self {
        $self = new self;

        $self['eventFilterBranches'] = $eventFilterBranches;
        $self['listMembershipFilterBranches'] = $listMembershipFilterBranches;
        $self['shouldReEnroll'] = $shouldReEnroll;
        $self['type'] = $type;

        null !== $refinementCriteria && $self['refinementCriteria'] = $refinementCriteria;

        return $self;
    }

    /**
     * @param list<mixed> $eventFilterBranches
     */
    public function withEventFilterBranches(array $eventFilterBranches): self
    {
        $self = clone $this;
        $self['eventFilterBranches'] = $eventFilterBranches;

        return $self;
    }

    /**
     * @param list<mixed> $listMembershipFilterBranches
     */
    public function withListMembershipFilterBranches(
        array $listMembershipFilterBranches
    ): self {
        $self = clone $this;
        $self['listMembershipFilterBranches'] = $listMembershipFilterBranches;

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

    /**
     * @param RefinementCriteriaShape $refinementCriteria
     */
    public function withRefinementCriteria(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $refinementCriteria,
    ): self {
        $self = clone $this;
        $self['refinementCriteria'] = $refinementCriteria;

        return $self;
    }
}
