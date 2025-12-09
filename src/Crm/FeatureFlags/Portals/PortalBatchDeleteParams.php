<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\PortalsService::batchDelete()
 *
 * @phpstan-type PortalBatchDeleteParamsShape = array{
 *   appID: int, portalIDs: list<int>
 * }
 */
final class PortalBatchDeleteParams implements BaseModel
{
    /** @use SdkModel<PortalBatchDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<int> $portalIDs */
    #[Required('portalIds', list: 'int')]
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
        $self = new self;

        $self['appID'] = $appID;
        $self['portalIDs'] = $portalIDs;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $self = clone $this;
        $self['portalIDs'] = $portalIDs;

        return $self;
    }
}
