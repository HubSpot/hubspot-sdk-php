<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Apps;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the current status of the app's feature flags. No request body is included.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\AppsService::get()
 *
 * @phpstan-type AppGetParamsShape = array{appId: int}
 */
final class AppGetParams implements BaseModel
{
    /** @use SdkModel<AppGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    /**
     * `new AppGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppGetParams::with(appId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppGetParams)->withAppID(...)
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
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }
}
