<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams\FlagState;

/**
 * Specify an account-level flag state for a specific HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlagsService::updatePortalState()
 *
 * @phpstan-type FeatureFlagUpdatePortalStateParamsShape = array{
 *   appID: int, flagName: string, flagState: FlagState|value-of<FlagState>
 * }
 */
final class FeatureFlagUpdatePortalStateParams implements BaseModel
{
    /** @use SdkModel<FeatureFlagUpdatePortalStateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $flagName;

    /**
     * The state that the given flag should be in for this portal.
     *
     * @var value-of<FlagState> $flagState
     */
    #[Required(enum: FlagState::class)]
    public string $flagState;

    /**
     * `new FeatureFlagUpdatePortalStateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FeatureFlagUpdatePortalStateParams::with(
     *   appID: ..., flagName: ..., flagState: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FeatureFlagUpdatePortalStateParams)
     *   ->withAppID(...)
     *   ->withFlagName(...)
     *   ->withFlagState(...)
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
        FlagState|string $flagState
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['flagName'] = $flagName;
        $self['flagState'] = $flagState;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withFlagName(string $flagName): self
    {
        $self = clone $this;
        $self['flagName'] = $flagName;

        return $self;
    }

    /**
     * The state that the given flag should be in for this portal.
     *
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $self = clone $this;
        $self['flagState'] = $flagState;

        return $self;
    }
}
