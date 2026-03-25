<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for existing oEmbed domains for your app.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::listOembedDomains()
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
