<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest batch of webhook journal entries up to a specified count. This endpoint is useful for fetching the most recent webhook events processed by the system. It requires authentication and supports various security schemes.
 *
 * @see HubSpotSDK\Services\WebhooksService::getLatestLocalJournalBatch()
 *
 * @phpstan-type WebhookGetLatestLocalJournalBatchParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetLatestLocalJournalBatchParams implements BaseModel
{
    /** @use SdkModel<WebhookGetLatestLocalJournalBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the webhook journal entries. It is an optional integer parameter.
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
     * The ID of the portal installation to filter the webhook journal entries. It is an optional integer parameter.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
