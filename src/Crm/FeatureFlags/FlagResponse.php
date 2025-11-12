<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\FlagResponse\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse\OverrideState;

/**
 * @phpstan-type FlagResponseShape = array{
 *   appId: int,
 *   defaultState: value-of<DefaultState>,
 *   flagName: string,
 *   overrideState?: value-of<OverrideState>|null,
 * }
 */
final class FlagResponse implements BaseModel
{
    /** @use SdkModel<FlagResponseShape> */
    use SdkModel;

    #[Api]
    public int $appId;

    /** @var value-of<DefaultState> $defaultState */
    #[Api(enum: DefaultState::class)]
    public string $defaultState;

    #[Api]
    public string $flagName;

    /** @var value-of<OverrideState>|null $overrideState */
    #[Api(enum: OverrideState::class, optional: true)]
    public ?string $overrideState;

    /**
     * `new FlagResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlagResponse::with(appId: ..., defaultState: ..., flagName: ...)
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
        int $appId,
        DefaultState|string $defaultState,
        string $flagName,
        OverrideState|string|null $overrideState = null,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj['defaultState'] = $defaultState;
        $obj->flagName = $flagName;

        null !== $overrideState && $obj['overrideState'] = $overrideState;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

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

    public function withFlagName(string $flagName): self
    {
        $obj = clone $this;
        $obj->flagName = $flagName;

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
