<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest webhook journal entries for the specified portal. This endpoint can be used to access the oldest records available in the webhook journal, which may be useful for auditing or historical analysis.
 *
 * @see HubSpotSDK\Services\WebhooksService::getEarliestLocalJournalEntry()
 *
 * @phpstan-type WebhookGetEarliestLocalJournalEntryParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetEarliestLocalJournalEntryParams implements BaseModel
{
    /** @use SdkModel<WebhookGetEarliestLocalJournalEntryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal for which to retrieve the earliest webhook journal entries. This parameter is optional and should be an integer.
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
     * The ID of the portal for which to retrieve the earliest webhook journal entries. This parameter is optional and should be an integer.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
