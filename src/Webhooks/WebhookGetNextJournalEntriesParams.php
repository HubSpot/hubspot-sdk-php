<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through webhook journal entries in a HubSpot account. It allows you to continue fetching entries from where the last request left off, using the offset parameter.
 *
 * @see HubSpotSDK\Services\WebhooksService::getNextJournalEntries()
 *
 * @phpstan-type WebhookGetNextJournalEntriesParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetNextJournalEntriesParams implements BaseModel
{
    /** @use SdkModel<WebhookGetNextJournalEntriesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal where the webhooks are installed. This is an integer value.
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
     * The ID of the portal where the webhooks are installed. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
