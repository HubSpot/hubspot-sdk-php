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
 * @phpstan-type IntegratorSettingUpdateOembedDomainParamsShape = array{
 *   appId: int,
 *   endpoints: Endpoints|array{
 *     discovery: bool, schemes: list<string>, url: string
 *   },
 *   portalId?: int,
 * }
 */
final class IntegratorSettingUpdateOembedDomainParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingUpdateOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public Endpoints $endpoints;

    #[Optional]
    public ?int $portalId;

    /**
     * `new IntegratorSettingUpdateOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorSettingUpdateOembedDomainParams::with(appId: ..., endpoints: ...)
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
     * @param Endpoints|array{
     *   discovery: bool, schemes: list<string>, url: string
     * } $endpoints
     */
    public static function with(
        int $appId,
        Endpoints|array $endpoints,
        ?int $portalId = null
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['endpoints'] = $endpoints;

        null !== $portalId && $obj['portalId'] = $portalId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

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
        $obj['portalId'] = $portalID;

        return $obj;
    }
}
