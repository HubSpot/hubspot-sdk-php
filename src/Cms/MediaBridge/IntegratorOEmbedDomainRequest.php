<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EndpointsShape from \HubSpotSDK\Cms\MediaBridge\Endpoints
 *
 * @phpstan-type IntegratorOEmbedDomainRequestShape = array{
 *   endpoints: Endpoints|EndpointsShape, portalID?: int|null
 * }
 */
final class IntegratorOEmbedDomainRequest implements BaseModel
{
    /** @use SdkModel<IntegratorOEmbedDomainRequestShape> */
    use SdkModel;

    #[Required]
    public Endpoints $endpoints;

    #[Optional('portalId')]
    public ?int $portalID;

    /**
     * `new IntegratorOEmbedDomainRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorOEmbedDomainRequest::with(endpoints: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorOEmbedDomainRequest)->withEndpoints(...)
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
