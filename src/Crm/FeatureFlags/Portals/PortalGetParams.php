<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the account-level flag state of a specific HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\PortalsService::get()
 *
 * @phpstan-type PortalGetParamsShape = array{appId: int, flagName: string}
 */
final class PortalGetParams implements BaseModel
{
    /** @use SdkModel<PortalGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $flagName;

    /**
     * `new PortalGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalGetParams::with(appId: ..., flagName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalGetParams)->withAppID(...)->withFlagName(...)
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
    public static function with(int $appId, string $flagName): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['flagName'] = $flagName;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withFlagName(string $flagName): self
    {
        $obj = clone $this;
        $obj['flagName'] = $flagName;

        return $obj;
    }
}
