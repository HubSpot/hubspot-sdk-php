<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing oEmbed domain.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::deleteOembedDomain()
 *
 * @phpstan-type MediaBridgeDeleteOembedDomainParamsShape = array{
 *   id?: int|null, domainPortalID?: int|null
 * }
 */
final class MediaBridgeDeleteOembedDomainParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeDeleteOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $id;

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
    public static function with(
        ?int $id = null,
        ?int $domainPortalID = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $domainPortalID && $self['domainPortalID'] = $domainPortalID;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDomainPortalID(int $domainPortalID): self
    {
        $self = clone $this;
        $self['domainPortalID'] = $domainPortalID;

        return $self;
    }
}
