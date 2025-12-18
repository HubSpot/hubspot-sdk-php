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
 * Update an existing oEmbed domain.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::updateOembedDomain()
 *
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 *
 * @phpstan-type IntegratorSettingUpdateOembedDomainParamsShape = array{
 *   appID: int, endpoints: Endpoints|EndpointsShape, portalID?: int|null
 * }
 */
final class IntegratorSettingUpdateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingUpdateOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public Endpoints $endpoints;

    #[Optional('portalId')]
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
     *
     * @param Endpoints|EndpointsShape $endpoints
     */
    public static function with(
        int $appID,
        Endpoints|array $endpoints,
        ?int $portalID = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['endpoints'] = $endpoints;

        null !== $portalID && $self['portalID'] = $portalID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
