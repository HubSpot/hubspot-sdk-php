<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for an existing oEmbed domain.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->getOembedDomain
 *
 * @phpstan-type integrator_setting_get_oembed_domain_params = array{appID: string}
 */
final class IntegratorSettingGetOembedDomainParams implements BaseModel
{
    /** @use SdkModel<integrator_setting_get_oembed_domain_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /**
     * `new IntegratorSettingGetOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingGetOembedDomainParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingGetOembedDomainParams)->withAppID(...)
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
    public static function with(string $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
