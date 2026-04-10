<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FeatureFlags\FlagResponse\DefaultState;
use HubSpotSDK\Crm\FeatureFlags\FlagResponse\OverrideState;

/**
 * @phpstan-type FlagResponseShape = array{
 *   appID: int,
 *   defaultState: DefaultState|value-of<DefaultState>,
 *   flagName: string,
 *   overrideState?: null|OverrideState|value-of<OverrideState>,
 * }
 */
final class FlagResponse implements BaseModel
{
    /** @use SdkModel<FlagResponseShape> */
    use SdkModel;

    /**
     * The ID of the app.
     */
    #[Required('appId')]
    public int $appID;

    /**
     * The flag state for any portal that doesn't have an override value.
     *
     * @var value-of<DefaultState> $defaultState
     */
    #[Required(enum: DefaultState::class)]
    public string $defaultState;

    /**
     * The name of the flag.
     */
    #[Required]
    public string $flagName;

    /**
     * An optional flag value that overrides all others for this flag name and app, including portal-level values.
     *
     * @var value-of<OverrideState>|null $overrideState
     */
    #[Optional(enum: OverrideState::class)]
    public ?string $overrideState;

    /**
     * `new FlagResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlagResponse::with(appID: ..., defaultState: ..., flagName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlagResponse)->withAppID(...)->withDefaultState(...)->withFlagName(...)
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
     * @param DefaultState|value-of<DefaultState> $defaultState
     * @param OverrideState|value-of<OverrideState>|null $overrideState
     */
    public static function with(
        int $appID,
        DefaultState|string $defaultState,
        string $flagName,
        OverrideState|string|null $overrideState = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['defaultState'] = $defaultState;
        $self['flagName'] = $flagName;

        null !== $overrideState && $self['overrideState'] = $overrideState;

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
     * The flag state for any portal that doesn't have an override value.
     *
     * @param DefaultState|value-of<DefaultState> $defaultState
     */
    public function withDefaultState(DefaultState|string $defaultState): self
    {
        $self = clone $this;
        $self['defaultState'] = $defaultState;

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
     * An optional flag value that overrides all others for this flag name and app, including portal-level values.
     *
     * @param OverrideState|value-of<OverrideState> $overrideState
     */
    public function withOverrideState(OverrideState|string $overrideState): self
    {
        $self = clone $this;
        $self['overrideState'] = $overrideState;

        return $self;
    }
}
