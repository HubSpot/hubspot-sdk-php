<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;

/**
 * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\AppsService::update()
 *
 * @phpstan-type AppUpdateParamsShape = array{
 *   appID: int,
 *   defaultState: DefaultState|value-of<DefaultState>,
 *   overrideState?: null|OverrideState|value-of<OverrideState>,
 * }
 */
final class AppUpdateParams implements BaseModel
{
    /** @use SdkModel<AppUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var value-of<DefaultState> $defaultState */
    #[Required(enum: DefaultState::class)]
    public string $defaultState;

    /** @var value-of<OverrideState>|null $overrideState */
    #[Optional(enum: OverrideState::class)]
    public ?string $overrideState;

    /**
     * `new AppUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppUpdateParams::with(appID: ..., defaultState: ...)
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
        int $appID,
        DefaultState|string $defaultState,
        OverrideState|string|null $overrideState = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['defaultState'] = $defaultState;

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
