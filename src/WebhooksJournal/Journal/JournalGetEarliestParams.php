<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\Journal;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the earliest entry from the webhooks journal for the specified portal. This endpoint is useful for accessing the first recorded webhook event in the journal, which can be helpful for auditing or debugging purposes.
 *
 * @see HubSpotSDK\Services\WebhooksJournal\JournalService::getEarliest()
 *
 * @phpstan-type JournalGetEarliestParamsShape = array{installPortalID?: int|null}
 */
final class JournalGetEarliestParams implements BaseModel
{
    /** @use SdkModel<JournalGetEarliestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the journal entries by. This is an integer value.
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
     * The ID of the portal installation to filter the journal entries by. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
