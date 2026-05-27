<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events that have been logged, allowing for real-time monitoring or debugging of webhook activities.
 *
 * @see HubSpotSDK\Services\WebhooksService::getLatestLocalJournalEntry()
 *
 * @phpstan-type WebhookGetLatestLocalJournalEntryParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetLatestLocalJournalEntryParams implements BaseModel
{
    /** @use SdkModel<WebhookGetLatestLocalJournalEntryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal for which to retrieve the latest journal entries. This is an integer value.
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
     * The ID of the portal for which to retrieve the latest journal entries. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
