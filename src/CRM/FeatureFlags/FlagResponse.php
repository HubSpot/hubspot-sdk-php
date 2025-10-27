<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\FeatureFlags\FlagResponse\DefaultState;
use HubspotSDK\CRM\FeatureFlags\FlagResponse\OverrideState;

/**
 * @phpstan-type flag_response = array{
 *   appID: int,
 *   defaultState: value-of<DefaultState>,
 *   flagName: string,
 *   overrideState?: value-of<OverrideState>,
 * }
 */
final class FlagResponse implements BaseModel
{
    /** @use SdkModel<flag_response> */
    use SdkModel;

    #[Api('appId')]
    public int $appID;

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
        $obj = new self;

        $obj->appID = $appID;
        $obj['defaultState'] = $defaultState;
        $obj->flagName = $flagName;

        null !== $overrideState && $obj['overrideState'] = $overrideState;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

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
