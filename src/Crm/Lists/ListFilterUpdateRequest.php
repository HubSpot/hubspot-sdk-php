<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\ListFilterUpdateRequest\FilterBranch;

/**
 * @phpstan-import-type FilterBranchVariants from \HubSpotSDK\Crm\Lists\ListFilterUpdateRequest\FilterBranch
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListFilterUpdateRequest\FilterBranch
 *
 * @phpstan-type ListFilterUpdateRequestShape = array{
 *   filterBranch: FilterBranchShape
 * }
 */
final class ListFilterUpdateRequest implements BaseModel
{
    /** @use SdkModel<ListFilterUpdateRequestShape> */
    use SdkModel;

    /**
     * Updated filtering criteria for the list.
     *
     * @var FilterBranchVariants $filterBranch
     */
    #[Required(union: FilterBranch::class)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch $filterBranch;

    /**
     * `new ListFilterUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListFilterUpdateRequest::with(filterBranch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListFilterUpdateRequest)->withFilterBranch(...)
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
     * @param FilterBranchShape $filterBranch
     */
    public static function with(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $self = new self;

        $self['filterBranch'] = $filterBranch;

        return $self;
    }

    /**
     * Updated filtering criteria for the list.
     *
     * @param FilterBranchShape $filterBranch
     */
    public function withFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $self = clone $this;
        $self['filterBranch'] = $filterBranch;

        return $self;
    }
}
