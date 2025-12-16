<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Optional;
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
 * @phpstan-import-type APIConnectionShape from \HubspotSDK\Automation\Workflows\APIConnection
 * @phpstan-import-type FilterBranchShape from \HubspotSDK\Automation\Workflows\APIListBranch\FilterBranch
 *
 * @phpstan-type APIListBranchShape = array{
 *   branchName?: string|null,
 *   connection?: null|APIConnection|APIConnectionShape,
 *   filterBranch?: null|FilterBranchShape|PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch,
 * }
 */
final class APIListBranch implements BaseModel
{
    /** @use SdkModel<APIListBranchShape> */
    use SdkModel;

    #[Optional]
    public ?string $branchName;

    #[Optional]
    public ?APIConnection $connection;

    #[Optional]
    public PublicOrFilterBranch|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param APIConnectionShape $connection
     * @param FilterBranchShape $filterBranch
     */
    public static function with(
        ?string $branchName = null,
        APIConnection|array|null $connection = null,
        PublicOrFilterBranch|array|PublicAndFilterBranch|PublicNotAllFilterBranch|PublicNotAnyFilterBranch|PublicRestrictedFilterBranch|PublicUnifiedEventsFilterBranch|PublicPropertyAssociationFilterBranch|PublicAssociationFilterBranch|null $filterBranch = null,
    ): self {
        $self = new self;

        null !== $branchName && $self['branchName'] = $branchName;
        null !== $connection && $self['connection'] = $connection;
        null !== $filterBranch && $self['filterBranch'] = $filterBranch;

        return $self;
    }

    public function withBranchName(string $branchName): self
    {
        $self = clone $this;
        $self['branchName'] = $branchName;

        return $self;
    }

    /**
     * @param APIConnectionShape $connection
     */
    public function withConnection(APIConnection|array $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

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
}
