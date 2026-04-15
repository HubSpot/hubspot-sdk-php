<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the next set of journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal entries in a sequential manner. It requires specifying the offset from which the next entries should be fetched.
 *
 * @see HubSpotSDK\Services\WebhooksService::getNextLocalJournalEntries()
 *
 * @phpstan-type WebhookGetNextLocalJournalEntriesParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetNextLocalJournalEntriesParams implements BaseModel
{
    /** @use SdkModel<WebhookGetNextLocalJournalEntriesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the journal entries by. This is an optional parameter.
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
     * The ID of the portal installation to filter the journal entries by. This is an optional parameter.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
