<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest entries from the webhooks journal. This endpoint is useful for accessing the most recent webhook data for analysis or troubleshooting. It supports filtering by the installPortalId to narrow down results to a specific portal.
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
     * An integer representing the ID of the portal to filter the webhook journal entries.
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
     * An integer representing the ID of the portal to filter the webhook journal entries.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
