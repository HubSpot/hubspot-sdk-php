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
 * @see HubspotSDK\Services\Crm\FeatureFlags\PortalsService::batchUpsert()
 *
 * @phpstan-type PortalBatchUpsertParamsShape = array{
 *   appId: int, portalStates: list<BatchPortalEntry>
 * }
 */
final class PortalBatchUpsertParams implements BaseModel
{
    /** @use SdkModel<PortalBatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Api(list: BatchPortalEntry::class)]
    public array $portalStates;

    /**
     * `new PortalBatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalBatchUpsertParams::with(appId: ..., portalStates: ...)
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
    public static function with(int $appId, array $portalStates): self
    {
        $obj = new self;

        $obj->appId = $appId;
        $obj->portalStates = $portalStates;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

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
