<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse\FlagState;

/**
 * @phpstan-type PortalFlagStateBatchResponseShape = array{
 *   portalFlagStates: list<PortalFlagStateResponse>
 * }
 */
final class PortalFlagStateBatchResponse implements BaseModel
{
    /** @use SdkModel<PortalFlagStateBatchResponseShape> */
    use SdkModel;

    /** @var list<PortalFlagStateResponse> $portalFlagStates */
    #[Required(list: PortalFlagStateResponse::class)]
    public array $portalFlagStates;

    /**
     * `new PortalFlagStateBatchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateBatchResponse::with(portalFlagStates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStateBatchResponse)->withPortalFlagStates(...)
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
     * @param list<PortalFlagStateResponse|array{
     *   appID: int, flagName: string, flagState: value-of<FlagState>, portalID: int
     * }> $portalFlagStates
     */
    public static function with(array $portalFlagStates): self
    {
        $self = new self;

        $self['portalFlagStates'] = $portalFlagStates;

        return $self;
    }

    /**
     * @param list<PortalFlagStateResponse|array{
     *   appID: int, flagName: string, flagState: value-of<FlagState>, portalID: int
     * }> $portalFlagStates
     */
    public function withPortalFlagStates(array $portalFlagStates): self
    {
        $self = clone $this;
        $self['portalFlagStates'] = $portalFlagStates;

        return $self;
    }
}
