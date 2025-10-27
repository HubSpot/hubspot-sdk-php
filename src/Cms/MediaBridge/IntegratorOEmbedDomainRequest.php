<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type integrator_o_embed_domain_request = array{
 *   endpoints: Endpoints, portalID?: int
 * }
 */
final class IntegratorOEmbedDomainRequest implements BaseModel
{
    /** @use SdkModel<integrator_o_embed_domain_request> */
    use SdkModel;

    #[Api]
    public Endpoints $endpoints;

    #[Api('portalId', optional: true)]
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
