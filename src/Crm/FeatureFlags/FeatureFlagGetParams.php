<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the current status of the app's feature flags. No request body is included.
 *
 * @see HubSpotSDK\Services\Crm\FeatureFlagsService::get()
 *
 * @phpstan-type FeatureFlagGetParamsShape = array{appID: int}
 */
final class FeatureFlagGetParams implements BaseModel
{
    /** @use SdkModel<FeatureFlagGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new FeatureFlagGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FeatureFlagGetParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FeatureFlagGetParams)->withAppID(...)
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
