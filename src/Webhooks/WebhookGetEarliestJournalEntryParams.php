<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest entry from the webhooks journal for the specified version. This endpoint is useful for accessing the oldest records available in the journal, which can be helpful for auditing or historical data analysis.
 *
 * @see HubSpotSDK\Services\WebhooksService::getEarliestJournalEntry()
 *
 * @phpstan-type WebhookGetEarliestJournalEntryParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetEarliestJournalEntryParams implements BaseModel
{
    /** @use SdkModel<WebhookGetEarliestJournalEntryParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the journal entries. It is an integer.
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
     * The ID of the portal installation to filter the journal entries. It is an integer.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
