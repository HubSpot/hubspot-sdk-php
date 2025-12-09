<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry\FlagState;

/**
 * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\PortalsService::batchUpsert()
 *
 * @phpstan-type PortalBatchUpsertParamsShape = array{
 *   appID: int,
 *   portalStates: list<BatchPortalEntry|array{
 *     flagState: value-of<FlagState>, portalID: int
 *   }>,
 * }
 */
final class PortalBatchUpsertParams implements BaseModel
{
    /** @use SdkModel<PortalBatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Required(list: BatchPortalEntry::class)]
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
     * @param list<BatchPortalEntry|array{
     *   flagState: value-of<FlagState>, portalID: int
     * }> $portalStates
     */
    public static function with(int $appID, array $portalStates): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['portalStates'] = $portalStates;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * @param list<BatchPortalEntry|array{
     *   flagState: value-of<FlagState>, portalID: int
     * }> $portalStates
     */
    public function withPortalStates(array $portalStates): self
    {
        $self = clone $this;
        $self['portalStates'] = $portalStates;

        return $self;
    }
}
