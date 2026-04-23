<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events processed by your HubSpot account. It allows you to filter the results by the portal ID to ensure you are retrieving data relevant to a specific installation.
 *
 * @see HubSpotSDK\Services\WebhooksService::getLatestJournalEntry()
 *
 * @phpstan-type WebhookGetLatestJournalEntryParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetLatestJournalEntryParams implements BaseModel
{
    /** @use SdkModel<WebhookGetLatestJournalEntryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the journal entries. It is an integer value.
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
     * The ID of the portal installation to filter the journal entries. It is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
