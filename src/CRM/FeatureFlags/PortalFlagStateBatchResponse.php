<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type portal_flag_state_batch_response = array{
 *   portalFlagStates: list<PortalFlagStateResponse>
 * }
 */
final class PortalFlagStateBatchResponse implements BaseModel
{
    /** @use SdkModel<portal_flag_state_batch_response> */
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
     * @param list<PortalFlagStateResponse> $portalFlagStates
     */
    public static function with(array $portalFlagStates): self
    {
        $obj = new self;

        $obj->portalFlagStates = $portalFlagStates;

        return $obj;
    }

    /**
     * @param list<PortalFlagStateResponse> $portalFlagStates
     */
    public function withPortalFlagStates(array $portalFlagStates): self
    {
        $obj = clone $this;
        $obj->portalFlagStates = $portalFlagStates;

        return $obj;
    }
}
