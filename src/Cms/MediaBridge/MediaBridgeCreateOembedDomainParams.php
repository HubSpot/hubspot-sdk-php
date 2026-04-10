<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Set up a new oEmbed domain for your media bridge app.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::createOembedDomain()
 *
 * @phpstan-import-type EndpointsShape from \HubSpotSDK\Cms\MediaBridge\Endpoints
 *
 * @phpstan-type MediaBridgeCreateOembedDomainParamsShape = array{
 *   endpoints: Endpoints|EndpointsShape, portalID?: int|null
 * }
 */
final class MediaBridgeCreateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeCreateOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public Endpoints $endpoints;

    #[Optional('portalId')]
    public ?int $portalID;

    /**
     * `new MediaBridgeCreateOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeCreateOembedDomainParams::with(endpoints: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeCreateOembedDomainParams)->withEndpoints(...)
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
