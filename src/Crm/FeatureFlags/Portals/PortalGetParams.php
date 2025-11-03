<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the account-level flag state of a specific HubSpot account.
 *
 * @see HubspotSDK\Crm\FeatureFlags\Portals->get
 *
 * @phpstan-type PortalGetParamsShape = array{appID: int, flagName: string}
 */
final class PortalGetParams implements BaseModel
{
    /** @use SdkModel<PortalGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $flagName;

    /**
     * `new PortalGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalGetParams::with(appID: ..., flagName: ...)
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
    public static function with(int $appID, string $flagName): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->flagName = $flagName;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withFlagName(string $flagName): self
    {
        $obj = clone $this;
        $obj->flagName = $flagName;

        return $obj;
    }
}
