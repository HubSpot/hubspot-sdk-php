<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing oEmbed domain.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::deleteOembedDomain()
 *
 * @phpstan-type IntegratorSettingDeleteOembedDomainParamsShape = array{
 *   id?: int, domainPortalId?: int
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
    #[Api(optional: true)]
    public ?int $id;

    /**
     * Filter response by Hub ID.
     */
    #[Api(optional: true)]
    public ?int $domainPortalId;

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
        ?int $domainPortalId = null
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $domainPortalId && $obj->domainPortalId = $domainPortalId;

        return $obj;
    }

    /**
     * The ID of the oEmbed to delete.
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Filter response by Hub ID.
     */
    public function withDomainPortalID(int $domainPortalID): self
    {
        $obj = clone $this;
        $obj->domainPortalId = $domainPortalID;

        return $obj;
    }
}
