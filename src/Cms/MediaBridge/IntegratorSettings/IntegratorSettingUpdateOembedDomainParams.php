<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing oEmbed domain.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->updateOembedDomain
 *
 * @phpstan-type integrator_setting_update_oembed_domain_params = array{
 *   appID: string, endpoints: Endpoints, portalID?: int
 * }
 */
final class IntegratorSettingUpdateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<integrator_setting_update_oembed_domain_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    #[Api]
    public Endpoints $endpoints;

    #[Api('portalId', optional: true)]
    public ?int $portalID;

    /**
     * `new IntegratorSettingUpdateOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingUpdateOembedDomainParams::with(appID: ..., endpoints: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingUpdateOembedDomainParams)
     *   ->withAppID(...)
     *   ->withEndpoints(...)
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
    public static function with(
        string $appID,
        Endpoints $endpoints,
        ?int $portalID = null
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->endpoints = $endpoints;

        null !== $portalID && $obj->portalID = $portalID;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withEndpoints(Endpoints $endpoints): self
    {
        $obj = clone $this;
        $obj->endpoints = $endpoints;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }
}
