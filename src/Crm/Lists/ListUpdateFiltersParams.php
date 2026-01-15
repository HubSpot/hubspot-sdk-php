<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
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
 * Update the filter branch definition of a `DYNAMIC` list. Once updated, the list memberships will be re-evaluated and updated to match the new definition.
 *
 * @see HubspotSDK\Services\Crm\ListsService::updateFilters()
 *
 * @phpstan-import-type FilterBranchVariants from \HubspotSDK\Crm\Lists\ListUpdateFiltersParams\FilterBranch
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Crm\Lists\ListUpdateFiltersParams\FilterBranch
 *
 * @phpstan-type ListUpdateFiltersParamsShape = array{
 *   filterBranch: FilterBranchShape, enrollObjectsInWorkflows?: bool|null
 * }
 */
final class ListUpdateFiltersParams implements BaseModel
{
    /** @use SdkModel<ListUpdateFiltersParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var FilterBranchVariants $filterBranch */
    #[Required]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch;

    /**
     * A flag indicating whether or not the memberships added to the list as a result of the filter change should be enrolled in workflows that are relevant to this list.
     */
    #[Optional]
    public ?bool $enrollObjectsInWorkflows;

    /**
     * `new ListUpdateFiltersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListUpdateFiltersParams::with(filterBranch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListUpdateFiltersParams)->withFilterBranch(...)
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
     * @param FilterBranchShape $filterBranch
     */
    public function withFilterBranch(
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $self = clone $this;
        $self['filterBranch'] = $filterBranch;

        return $self;
    }

    /**
     * A flag indicating whether or not the memberships added to the list as a result of the filter change should be enrolled in workflows that are relevant to this list.
     */
    public function withEnrollObjectsInWorkflows(
        bool $enrollObjectsInWorkflows
    ): self {
        $self = clone $this;
        $self['enrollObjectsInWorkflows'] = $enrollObjectsInWorkflows;

        return $self;
    }
}
