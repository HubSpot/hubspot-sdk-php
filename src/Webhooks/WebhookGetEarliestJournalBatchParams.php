<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest batch of webhook journal entries up to the specified count. This endpoint is useful for fetching historical webhook data in batches, allowing you to process or analyze them as needed.
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
     * The ID of the portal installation for which to fetch the journal entries. This is an optional parameter.
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
     * The ID of the portal installation for which to fetch the journal entries. This is an optional parameter.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
