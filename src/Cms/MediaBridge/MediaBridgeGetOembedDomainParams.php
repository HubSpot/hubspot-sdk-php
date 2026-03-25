<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for an existing oEmbed domain.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::getOembedDomain()
 *
 * @phpstan-type MediaBridgeGetOembedDomainParamsShape = array{appID: string}
 */
final class MediaBridgeGetOembedDomainParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeGetOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

    /**
     * `new MediaBridgeGetOembedDomainParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeGetOembedDomainParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeGetOembedDomainParams)->withAppID(...)
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
    public static function with(string $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
