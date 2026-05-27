<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\Journal;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the next set of entries from the webhooks journal starting from a specified offset. This endpoint is useful for paginating through journal entries to process or analyze webhook events sequentially.
 *
 * @see HubSpotSDK\Services\WebhooksJournal\JournalService::getNextFromOffset()
 *
 * @phpstan-type JournalGetNextFromOffsetParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class JournalGetNextFromOffsetParams implements BaseModel
{
    /** @use SdkModel<JournalGetNextFromOffsetParamsShape> */
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
