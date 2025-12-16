<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing oEmbed domain.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::deleteOembedDomain()
 *
 * @phpstan-type IntegratorSettingDeleteOembedDomainParamsShape = array{
 *   id?: int|null, domainPortalID?: int|null
 * }
 */
final class IntegratorSettingDeleteOembedDomainParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingDeleteOembedDomainParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the oEmbed to delete.
     */
    #[Optional]
    public ?int $id;

    /**
     * Filter response by Hub ID.
     */
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

    /**
     * The ID of the oEmbed to delete.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Filter response by Hub ID.
     */
    public function withDomainPortalID(int $domainPortalID): self
    {
        $self = clone $this;
        $self['domainPortalID'] = $domainPortalID;

        return $self;
    }
}
