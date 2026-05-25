<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the latest entries from the webhooks journal for the specified portal. This endpoint is useful for accessing the most recent webhook events and their statuses, allowing you to monitor and debug webhook activity effectively.
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
     * The unique identifier of the portal installation for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
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
     * The unique identifier of the portal installation for which to retrieve the latest journal entries. This parameter is optional and should be an integer.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
