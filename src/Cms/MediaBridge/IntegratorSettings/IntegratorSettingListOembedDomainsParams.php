<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\IntegratorSettings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for existing oEmbed domains for your app.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\IntegratorSettingsService::listOembedDomains()
 *
 * @phpstan-type IntegratorSettingListOembedDomainsParamsShape = array{
 *   domainPortalId?: int
 * }
 */
final class IntegratorSettingListOembedDomainsParams implements BaseModel
{
    /** @use SdkModel<IntegratorSettingListOembedDomainsParamsShape> */
    use SdkModel;
    use SdkParams;

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
    public static function with(?int $domainPortalId = null): self
    {
        $obj = new self;

        null !== $domainPortalId && $obj['domainPortalId'] = $domainPortalId;

        return $obj;
    }

    /**
     * Filter response by Hub ID.
     */
    public function withDomainPortalID(int $domainPortalID): self
    {
        $obj = clone $this;
        $obj['domainPortalId'] = $domainPortalID;

        return $obj;
    }
}
