<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\Crm\FeatureFlags\Portals->batchDelete
 *
 * @phpstan-type PortalBatchDeleteParamsShape = array{
 *   appId: int, portalIds: list<int>
 * }
 */
final class PortalBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<PortalBatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /** @var list<int> $portalIds */
    #[Api(list: 'int')]
    public array $portalIds;

    /**
     * `new PortalBatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalBatchDeleteParams::with(appId: ..., portalIds: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalBatchDeleteParams)->withAppID(...)->withPortalIDs(...)
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
     * @param list<int> $portalIds
     */
    public static function with(int $appId, array $portalIds): self
    {
        $obj = new self;

        $obj->appId = $appId;
        $obj->portalIds = $portalIds;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $obj = clone $this;
        $obj->portalIds = $portalIDs;

        return $obj;
    }
}
