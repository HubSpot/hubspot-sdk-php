<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set up a new oEmbed domain for your media bridge app.
 *
 * @see HubspotSDK\Cms\MediaBridge\IntegratorSettings->createOembedDomain
 *
 * @phpstan-type integrator_setting_create_oembed_domain_params = array{
 *   endpoints: Endpoints, portalID?: int
 * }
 */
final class IntegratorSettingCreateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<integrator_setting_create_oembed_domain_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public Endpoints $endpoints;

    #[Api('portalId', optional: true)]
    public ?int $portalID;

    /**
     * `new IntegratorSettingCreateOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingCreateOembedDomainParams::with(endpoints: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorSettingCreateOembedDomainParams)->withEndpoints(...)
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
        Endpoints $endpoints,
        ?int $portalID = null
    ): self {
        $obj = new self;

        $obj->endpoints = $endpoints;

        null !== $portalID && $obj->portalID = $portalID;

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
