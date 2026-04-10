<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::updateListFilters()
 *
 * @phpstan-import-type FilterBranchVariants from \HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch
 * @phpstan-import-type FilterBranchShape from \HubSpotSDK\Crm\Lists\ListUpdateListFiltersParams\FilterBranch
 *
 * @phpstan-type ListUpdateListFiltersParamsShape = array{
 *   filterBranch: FilterBranchShape, enrollObjectsInWorkflows?: bool|null
 * }
 */
final class ListUpdateListFiltersParams implements BaseModel
{
    /** @use SdkModel<ListUpdateListFiltersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Updated filtering criteria for the list.
     *
     * @var FilterBranchVariants $filterBranch
     */
    #[Required(union: FilterBranch::class)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch;

    #[Optional]
    public ?bool $enrollObjectsInWorkflows;

    /**
     * `new ListUpdateListFiltersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListUpdateListFiltersParams::with(filterBranch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListUpdateListFiltersParams)->withFilterBranch(...)
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
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
        ?bool $enrollObjectsInWorkflows = null,
    ): self {
        $self = new self;

        $self['filterBranch'] = $filterBranch;

        null !== $enrollObjectsInWorkflows && $self['enrollObjectsInWorkflows'] = $enrollObjectsInWorkflows;

        return $self;
    }

    /**
     * Updated filtering criteria for the list.
     *
     * @param FilterBranchShape $filterBranch
     */
    public function withFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $self = clone $this;
        $self['filterBranch'] = $filterBranch;

        return $self;
    }

    public function withEnrollObjectsInWorkflows(
        bool $enrollObjectsInWorkflows
    ): self {
        $self = clone $this;
        $self['enrollObjectsInWorkflows'] = $enrollObjectsInWorkflows;

        return $self;
    }
}
