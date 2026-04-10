<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
 *
 * @see HubSpotSDK\Services\Crm\FeatureFlagsService::delete()
 *
 * @phpstan-type FeatureFlagDeleteParamsShape = array{appID: int}
 */
final class FeatureFlagDeleteParams implements BaseModel
{
    /** @use SdkModel<FeatureFlagDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new FeatureFlagDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FeatureFlagDeleteParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FeatureFlagDeleteParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
