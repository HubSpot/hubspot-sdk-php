<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse\FlagState;

/**
 * @phpstan-type PortalFlagStateResponseShape = array{
 *   appId: int, flagName: string, flagState: value-of<FlagState>, portalId: int
 * }
 */
final class PortalFlagStateResponse implements BaseModel
{
    /** @use SdkModel<PortalFlagStateResponseShape> */
    use SdkModel;

    #[Api]
    public int $appId;

    #[Api]
    public string $flagName;

    /** @var value-of<FlagState> $flagState */
    #[Api(enum: FlagState::class)]
    public string $flagState;

    #[Api]
    public int $portalId;

    /**
     * `new PortalFlagStateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateResponse::with(
     *   appId: ..., flagName: ..., flagState: ..., portalId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStateResponse)
     *   ->withAppID(...)
     *   ->withFlagName(...)
     *   ->withFlagState(...)
     *   ->withPortalID(...)
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
     * @param FlagState|value-of<FlagState> $flagState
     */
    public static function with(
        int $appId,
        string $flagName,
        FlagState|string $flagState,
        int $portalId
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['flagName'] = $flagName;
        $obj['flagState'] = $flagState;
        $obj['portalId'] = $portalId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withFlagName(string $flagName): self
    {
        $obj = clone $this;
        $obj['flagName'] = $flagName;

        return $obj;
    }

    /**
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $obj = clone $this;
        $obj['flagState'] = $flagState;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalId'] = $portalID;

        return $obj;
    }
}
