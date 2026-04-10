<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete an account-level flag state for a specific HubSpot account. No request body is included.
 *
 * @see HubSpotSDK\Services\Crm\FeatureFlagsService::deletePortalState()
 *
 * @phpstan-type FeatureFlagDeletePortalStateParamsShape = array{
 *   appID: int, flagName: string
 * }
 */
final class FeatureFlagDeletePortalStateParams implements BaseModel
{
    /** @use SdkModel<FeatureFlagDeletePortalStateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $flagName;

    /**
     * `new FeatureFlagDeletePortalStateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FeatureFlagDeletePortalStateParams::with(appID: ..., flagName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FeatureFlagDeletePortalStateParams)->withAppID(...)->withFlagName(...)
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
     */
    public static function with(int $appID, string $flagName): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['flagName'] = $flagName;

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
}
