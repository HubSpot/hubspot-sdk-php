<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Cms\MediaBridge\Endpoints;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set up a new oEmbed domain for your media bridge app.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::createOembedDomain()
 *
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 *
 * @phpstan-type IntegratorSettingCreateOembedDomainParamsShape = array{
 *   endpoints: Endpoints|EndpointsShape, portalID?: int|null
 * }
 */
final class IntegratorSettingCreateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingCreateOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Endpoints $endpoints;

    #[Optional('portalId')]
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
     *
     * @param Endpoints|EndpointsShape $endpoints
     */
    public static function with(
        Endpoints|array $endpoints,
        ?int $portalID = null
    ): self {
        $self = new self;

        $self['endpoints'] = $endpoints;

        null !== $portalID && $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * @param Endpoints|EndpointsShape $endpoints
     */
    public function withEndpoints(Endpoints|array $endpoints): self
    {
        $self = clone $this;
        $self['endpoints'] = $endpoints;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
