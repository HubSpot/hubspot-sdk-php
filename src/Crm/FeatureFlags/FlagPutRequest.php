<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\FlagPutRequest\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FlagPutRequest\OverrideState;

/**
 * @phpstan-type FlagPutRequestShape = array{
 *   defaultState: value-of<DefaultState>,
 *   overrideState?: value-of<OverrideState>|null,
 * }
 */
final class FlagPutRequest implements BaseModel
{
    /** @use SdkModel<FlagPutRequestShape> */
    use SdkModel;

    /** @var value-of<DefaultState> $defaultState */
    #[Api(enum: DefaultState::class)]
    public string $defaultState;

    /** @var value-of<OverrideState>|null $overrideState */
    #[Api(enum: OverrideState::class, optional: true)]
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
     * @param OverrideState|value-of<OverrideState> $overrideState
     */
    public static function with(
        DefaultState|string $defaultState,
        OverrideState|string|null $overrideState = null,
    ): self {
        $obj = new self;

        $obj['defaultState'] = $defaultState;

        null !== $overrideState && $obj['overrideState'] = $overrideState;

        return $obj;
    }

    /**
     * @param DefaultState|value-of<DefaultState> $defaultState
     */
    public function withDefaultState(DefaultState|string $defaultState): self
    {
        $obj = clone $this;
        $obj['defaultState'] = $defaultState;

        return $obj;
    }

    /**
     * @param OverrideState|value-of<OverrideState> $overrideState
     */
    public function withOverrideState(OverrideState|string $overrideState): self
    {
        $obj = clone $this;
        $obj['overrideState'] = $overrideState;

        return $obj;
    }
}
