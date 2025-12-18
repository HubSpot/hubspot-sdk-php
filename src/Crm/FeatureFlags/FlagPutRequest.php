<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\FlagPutRequest\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FlagPutRequest\OverrideState;

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

    /** @var value-of<DefaultState> $defaultState */
    #[Required(enum: DefaultState::class)]
    public string $defaultState;

    /** @var value-of<OverrideState>|null $overrideState */
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
     * @param DefaultState|value-of<DefaultState> $defaultState
     */
    public function withDefaultState(DefaultState|string $defaultState): self
    {
        $self = clone $this;
        $self['defaultState'] = $defaultState;

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
