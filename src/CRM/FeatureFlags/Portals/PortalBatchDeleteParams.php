<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\CRM\FeatureFlags\Portals->batchDelete
 *
 * @phpstan-type portal_batch_delete_params = array{
 *   appID: int, portalIDs: list<int>
 * }
 */
final class PortalBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<portal_batch_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /** @var list<int> $portalIDs */
    #[Api('portalIds', list: 'int')]
    public array $portalIDs;

    /**
     * `new PortalBatchDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalBatchDeleteParams::with(appID: ..., portalIDs: ...)
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
     * @param list<int> $portalIDs
     */
    public static function with(int $appID, array $portalIDs): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->portalIDs = $portalIDs;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $obj = clone $this;
        $obj->portalIDs = $portalIDs;

        return $obj;
    }
}
