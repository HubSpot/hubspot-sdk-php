<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;

/**
 * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
 *
 * @see HubspotSDK\Crm\FeatureFlags\Apps->update
 *
 * @phpstan-type AppUpdateParamsShape = array{
 *   appId: int,
 *   defaultState: DefaultState|value-of<DefaultState>,
 *   overrideState?: OverrideState|value-of<OverrideState>,
 * }
 */
final class AppUpdateParams implements BaseModel
{
    /** @use SdkModel<AppUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /** @var value-of<DefaultState> $defaultState */
    #[Api(enum: DefaultState::class)]
    public string $defaultState;

    /** @var value-of<OverrideState>|null $overrideState */
    #[Api(enum: OverrideState::class, optional: true)]
    public ?string $overrideState;

    /**
     * `new AppUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppUpdateParams::with(appId: ..., defaultState: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppUpdateParams)->withAppID(...)->withDefaultState(...)
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
        OverrideState|string|null $overrideState = null,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj['defaultState'] = $defaultState;

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
