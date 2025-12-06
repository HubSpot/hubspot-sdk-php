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
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::getOembedDomain()
 *
 * @phpstan-type IntegratorSettingGetOembedDomainParamsShape = array{appId: int}
 */
final class IntegratorSettingGetOembedDomainParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingGetOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * `new IntegratorSettingGetOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingGetOembedDomainParams::with(appId: ...)
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
