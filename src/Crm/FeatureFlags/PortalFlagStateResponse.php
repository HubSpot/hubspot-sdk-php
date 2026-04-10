<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateResponse\FlagState;

/**
 * @phpstan-type PortalFlagStateResponseShape = array{
 *   appID: int,
 *   flagName: string,
 *   flagState: FlagState|value-of<FlagState>,
 *   portalID: int,
 * }
 */
final class PortalFlagStateResponse implements BaseModel
{
    /** @use SdkModel<PortalFlagStateResponseShape> */
    use SdkModel;

    /**
     * The ID of the app.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The name of the flag.
     */
    #[Required]
    public string $flagName;

    /**
     * The state of the flag for this portal.
     *
     * @var value-of<FlagState> $flagState
     */
    #[Required(enum: FlagState::class)]
    public string $flagState;

    /**
     * The ID of the portal.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * `new PortalFlagStateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateResponse::with(
     *   appID: ..., flagName: ..., flagState: ..., portalID: ...
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
        int $appID,
        string $flagName,
        FlagState|string $flagState,
        int $portalID
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['flagName'] = $flagName;
        $self['flagState'] = $flagState;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * The ID of the app.
     */
    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * The name of the flag.
     */
    public function withFlagName(string $flagName): self
    {
        $self = clone $this;
        $self['flagName'] = $flagName;

        return $self;
    }

    /**
     * The state of the flag for this portal.
     *
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $self = clone $this;
        $self['flagState'] = $flagState;

        return $self;
    }

    /**
     * The ID of the portal.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
