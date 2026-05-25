<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching recent webhook data for analysis or processing. The count parameter determines the maximum number of entries to return.
 *
 * @see HubSpotSDK\Services\WebhooksService::getLatestJournalBatch()
 *
 * @phpstan-type WebhookGetLatestJournalBatchParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetLatestJournalBatchParams implements BaseModel
{
    /** @use SdkModel<WebhookGetLatestJournalBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation. This is an integer value used to specify the portal context for the request.
     */
    #[Optional]
    public ?int $installPortalID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $installPortalID = null): self
    {
        $self = new self;

        null !== $installPortalID && $self['installPortalID'] = $installPortalID;

        return $self;
    }

    /**
     * The ID of the portal installation. This is an integer value used to specify the portal context for the request.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
