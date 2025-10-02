<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_list_branch = array{
 *   branchName?: string,
 *   connection?: AutomationAPIConnection,
 *   filterBranch?: AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch,
 * }
 */
final class AutomationAPIListBranch implements BaseModel
{
    /** @use SdkModel<automation_api_list_branch> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $branchName;

    #[Api(optional: true)]
    public ?AutomationAPIConnection $connection;

    #[Api(optional: true)]
    public AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $filterBranch;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $branchName = null,
        ?AutomationAPIConnection $connection = null,
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch|null $filterBranch = null,
    ): self {
        $obj = new self;

        null !== $branchName && $obj->branchName = $branchName;
        null !== $connection && $obj->connection = $connection;
        null !== $filterBranch && $obj->filterBranch = $filterBranch;

        return $obj;
    }

    public function withBranchName(string $branchName): self
    {
        $obj = clone $this;
        $obj->branchName = $branchName;

        return $obj;
    }

    public function withConnection(AutomationAPIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }

    public function withFilterBranch(
        AutomationPublicOrFilterBranch|AutomationPublicAndFilterBranch|AutomationPublicNotAllFilterBranch|AutomationPublicNotAnyFilterBranch|AutomationPublicRestrictedFilterBranch|AutomationPublicUnifiedEventsFilterBranch|AutomationPublicPropertyAssociationFilterBranch|AutomationPublicAssociationFilterBranch $filterBranch,
    ): self {
        $obj = clone $this;
        $obj->filterBranch = $filterBranch;

        return $obj;
    }
}
