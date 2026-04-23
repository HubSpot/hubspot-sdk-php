<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest batch of webhook journal entries based on the specified count. This endpoint is useful for fetching a specific number of the earliest entries in the webhook journal for analysis or processing.
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
