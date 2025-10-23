<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

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
 * @phpstan-type api_list_branch = array{
 *   branchName?: string,
 *   connection?: APIConnection,
 *   filterBranch?: PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 * }
 */
final class APIListBranch implements BaseModel
{
    /** @use SdkModel<api_list_branch> */
    use SdkModel;

    /**
     * The name of this branch.
     */
    #[Api(optional: true)]
    public ?string $branchName;

    #[Api(optional: true)]
    public ?APIConnection $connection;

    /**
     * The list criteria that determine when to execute this branch. The first matching branch will execute.
     */
    #[Api(optional: true)]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

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
        ?APIConnection $connection = null,
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
    ): self {
        $obj = new self;

        null !== $branchName && $obj->branchName = $branchName;
        null !== $connection && $obj->connection = $connection;
        null !== $filterBranch && $obj->filterBranch = $filterBranch;

        return $obj;
    }

    /**
     * The name of this branch.
     */
    public function withBranchName(string $branchName): self
    {
        $obj = clone $this;
        $obj->branchName = $branchName;

        return $obj;
    }

    public function withConnection(APIConnection $connection): self
    {
        $obj = clone $this;
        $obj->connection = $connection;

        return $obj;
    }

    /**
     * The list criteria that determine when to execute this branch. The first matching branch will execute.
     */
    public function withFilterBranch(
        PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch $filterBranch,
    ): self {
        $obj = clone $this;
        $obj->filterBranch = $filterBranch;

        return $obj;
    }
}
