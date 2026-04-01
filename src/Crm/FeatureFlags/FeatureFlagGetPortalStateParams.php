<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the account-level flag state of a specific HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlagsService::getPortalState()
 *
 * @phpstan-type FeatureFlagGetPortalStateParamsShape = array{
 *   appID: int, flagName: string
 * }
 */
final class FeatureFlagGetPortalStateParams implements BaseModel
{
    /** @use SdkModel<FeatureFlagGetPortalStateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $flagName;

    /**
     * `new FeatureFlagGetPortalStateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FeatureFlagGetPortalStateParams::with(appID: ..., flagName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FeatureFlagGetPortalStateParams)->withAppID(...)->withFlagName(...)
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
