<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\AppsService::delete()
 *
 * @phpstan-type AppDeleteParamsShape = array{appID: int}
 */
final class AppDeleteParams implements BaseModel
{
    /** @use SdkModel<AppDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new AppDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppDeleteParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppDeleteParams)->withAppID(...)
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
