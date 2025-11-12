<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria\ListMembershipFilterBranch;
use HubspotSDK\Automation\Workflows\APIEventBasedEnrollmentCriteria\Type;
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
 * @phpstan-type APIEventBasedEnrollmentCriteriaShape = array{
 *   eventFilterBranches: list<PublicUnifiedEventsFilterBranch>,
 *   listMembershipFilterBranches: list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch>,
 *   shouldReEnroll: bool,
 *   type: value-of<Type>,
 *   refinementCriteria?: null|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 * }
 */
final class APIEventBasedEnrollmentCriteria implements BaseModel
{
    /** @use SdkModel<APIEventBasedEnrollmentCriteriaShape> */
    use SdkModel;

    /** @var list<PublicUnifiedEventsFilterBranch> $eventFilterBranches */
    #[Api(list: PublicUnifiedEventsFilterBranch::class)]
    public array $eventFilterBranches;

    /**
     * @var list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $listMembershipFilterBranches
     */
    #[Api(list: ListMembershipFilterBranch::class)]
    public array $listMembershipFilterBranches;

    #[Api]
    public bool $shouldReEnroll;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
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
     * @param list<PublicUnifiedEventsFilterBranch> $eventFilterBranches
     * @param list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $listMembershipFilterBranches
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $eventFilterBranches,
        array $listMembershipFilterBranches,
        bool $shouldReEnroll,
        Type|string $type = 'EVENT_BASED',
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $refinementCriteria = null,
    ): self {
        $obj = new self;

        $obj->eventFilterBranches = $eventFilterBranches;
        $obj->listMembershipFilterBranches = $listMembershipFilterBranches;
        $obj->shouldReEnroll = $shouldReEnroll;
        $obj['type'] = $type;

        null !== $refinementCriteria && $obj->refinementCriteria = $refinementCriteria;

        return $obj;
    }

    /**
     * @param list<PublicUnifiedEventsFilterBranch> $eventFilterBranches
     */
    public function withEventFilterBranches(array $eventFilterBranches): self
    {
        $obj = clone $this;
        $obj->eventFilterBranches = $eventFilterBranches;

        return $obj;
    }

    /**
     * @param list<PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch> $listMembershipFilterBranches
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
        $obj['type'] = $type;

        return $obj;
    }

    public function withRefinementCriteria(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $refinementCriteria,
    ): self {
        $obj = clone $this;
        $obj->refinementCriteria = $refinementCriteria;

        return $obj;
    }
}
