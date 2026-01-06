<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorOEmbedDomainRequestShape = array{
 *   endpoints: Endpoints, portalID?: int|null
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
     * @param Endpoints|array{
     *   discovery: bool, schemes: list<string>, url: string
     * } $endpoints
     */
    public static function with(
        Endpoints|array $endpoints,
        ?int $portalID = null
    ): self {
        $obj = new self;

        $obj['endpoints'] = $endpoints;

        null !== $portalID && $obj['portalID'] = $portalID;

        return $obj;
    }

    /**
     * @param Endpoints|array{
     *   discovery: bool, schemes: list<string>, url: string
     * } $endpoints
     */
    public function withEndpoints(Endpoints|array $endpoints): self
    {
        $obj = clone $this;
        $obj['endpoints'] = $endpoints;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalID'] = $portalID;

        return $obj;
    }
}
