<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\FlagResponse\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse\OverrideState;

/**
 * @phpstan-type FlagResponseShape = array{
 *   appID: int,
 *   defaultState: value-of<DefaultState>,
 *   flagName: string,
 *   overrideState?: value-of<OverrideState>|null,
 * }
 */
final class FlagResponse implements BaseModel
{
    /** @use SdkModel<FlagResponseShape> */
    use SdkModel;

    #[Required('appId')]
    public int $appID;

    /** @var value-of<DefaultState> $defaultState */
    #[Required(enum: DefaultState::class)]
    public string $defaultState;

    #[Required]
    public string $flagName;

    /** @var value-of<OverrideState>|null $overrideState */
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
     * @param OverrideState|value-of<OverrideState> $overrideState
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

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * @param DefaultState|value-of<DefaultState> $defaultState
     */
    public function withDefaultState(DefaultState|string $defaultState): self
    {
        $self = clone $this;
        $self['defaultState'] = $defaultState;

        return $self;
    }

    public function withFlagName(string $flagName): self
    {
        $self = clone $this;
        $self['flagName'] = $flagName;

        return $self;
    }

    /**
     * @param OverrideState|value-of<OverrideState> $overrideState
     */
    public function withOverrideState(OverrideState|string $overrideState): self
    {
        $self = clone $this;
        $self['overrideState'] = $overrideState;

        return $self;
    }
}
