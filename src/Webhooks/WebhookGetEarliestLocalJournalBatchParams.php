<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest batch of webhook journal entries. This endpoint is useful for accessing the oldest available data in the webhook journal, allowing users to process or analyze historical webhook events. The number of entries to fetch is specified by the 'count' path parameter.
 *
 * @see HubSpotSDK\Services\WebhooksService::getEarliestLocalJournalBatch()
 *
 * @phpstan-type WebhookGetEarliestLocalJournalBatchParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetEarliestLocalJournalBatchParams implements BaseModel
{
    /** @use SdkModel<WebhookGetEarliestLocalJournalBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the webhook journal entries. This is an optional integer parameter.
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
     * The ID of the portal installation to filter the webhook journal entries. This is an optional integer parameter.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
