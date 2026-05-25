<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest batch of webhook journal entries for a specified count. This endpoint is useful for accessing historical webhook data in batches, allowing you to process or analyze older entries. The number of entries retrieved is determined by the count parameter.
 *
 * @see HubSpotSDK\Services\WebhooksService::getEarliestJournalBatch()
 *
 * @phpstan-type WebhookGetEarliestJournalBatchParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class WebhookGetEarliestJournalBatchParams implements BaseModel
{
    /** @use SdkModel<WebhookGetEarliestJournalBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation. This is an integer value that specifies which portal's data to access.
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
     * The ID of the portal installation. This is an integer value that specifies which portal's data to access.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
