<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry;

/**
 * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\Crm\FeatureFlags\Portals->batchUpsert
 *
 * @phpstan-type PortalBatchUpsertParamsShape = array{
 *   appID: int, portalStates: list<BatchPortalEntry>
 * }
 */
final class PortalBatchUpsertParams implements BaseModel
{
    /** @use SdkModel<PortalBatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Api(list: BatchPortalEntry::class)]
    public array $portalStates;

    /**
     * `new PortalBatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalBatchUpsertParams::with(appID: ..., portalStates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalBatchUpsertParams)->withAppID(...)->withPortalStates(...)
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
     * @param list<BatchPortalEntry> $portalStates
     */
    public static function with(int $appID, array $portalStates): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->portalStates = $portalStates;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    /**
     * @param list<BatchPortalEntry> $portalStates
     */
    public function withPortalStates(array $portalStates): self
    {
        $obj = clone $this;
        $obj->portalStates = $portalStates;

        return $obj;
    }
}
