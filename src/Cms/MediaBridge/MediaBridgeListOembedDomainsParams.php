<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for existing oEmbed domains for your app.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::listOembedDomains()
 *
 * @phpstan-type MediaBridgeListOembedDomainsParamsShape = array{
 *   domainPortalID?: int|null
 * }
 */
final class MediaBridgeListOembedDomainsParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeListOembedDomainsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $domainPortalID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $domainPortalID = null): self
    {
        $self = new self;

        null !== $domainPortalID && $self['domainPortalID'] = $domainPortalID;

        return $self;
    }

    public function withDomainPortalID(int $domainPortalID): self
    {
        $self = clone $this;
        $self['domainPortalID'] = $domainPortalID;

        return $self;
    }
}
