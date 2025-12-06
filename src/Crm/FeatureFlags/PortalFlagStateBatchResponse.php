<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: PortalFlagStateResponse::class)]
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
     *   appId: int, flagName: string, flagState: value-of<FlagState>, portalId: int
     * }> $portalFlagStates
     */
    public static function with(array $portalFlagStates): self
    {
        $obj = new self;

        $obj['portalFlagStates'] = $portalFlagStates;

        return $obj;
    }

    /**
     * @param list<PortalFlagStateResponse|array{
     *   appId: int, flagName: string, flagState: value-of<FlagState>, portalId: int
     * }> $portalFlagStates
     */
    public function withPortalFlagStates(array $portalFlagStates): self
    {
        $obj = clone $this;
        $obj['portalFlagStates'] = $portalFlagStates;

        return $obj;
    }
}
