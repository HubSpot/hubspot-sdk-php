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
 * @phpstan-type IntegratorSettingCreateOembedDomainParamsShape = array{
 *   endpoints: Endpoints|array{
 *     discovery: bool, schemes: list<string>, url: string
 *   },
 *   portalID?: int,
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
