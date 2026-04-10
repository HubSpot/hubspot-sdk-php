<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FeatureFlags\FlagPutRequest\DefaultState;
use HubSpotSDK\Crm\FeatureFlags\FlagPutRequest\OverrideState;

/**
 * @phpstan-type FlagPutRequestShape = array{
 *   defaultState: DefaultState|value-of<DefaultState>,
 *   overrideState?: null|OverrideState|value-of<OverrideState>,
 * }
 */
final class FlagPutRequest implements BaseModel
{
    /** @use SdkModel<FlagPutRequestShape> */
    use SdkModel;

    /**
     * The state that the flag should have if there are no overrides for a particular portal.
     *
     * @var value-of<DefaultState> $defaultState
     */
    #[Required(enum: DefaultState::class)]
    public string $defaultState;

    /**
     * A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides.
     *
     * @var value-of<OverrideState>|null $overrideState
     */
    #[Optional(enum: OverrideState::class)]
    public ?string $overrideState;

    /**
     * `new FlagPutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlagPutRequest::with(defaultState: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlagPutRequest)->withDefaultState(...)
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
        DefaultState|string $defaultState,
        OverrideState|string|null $overrideState = null,
    ): self {
        $self = new self;

        $self['defaultState'] = $defaultState;

        null !== $overrideState && $self['overrideState'] = $overrideState;

        return $self;
    }

    /**
     * The state that the flag should have if there are no overrides for a particular portal.
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
     * A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides.
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
