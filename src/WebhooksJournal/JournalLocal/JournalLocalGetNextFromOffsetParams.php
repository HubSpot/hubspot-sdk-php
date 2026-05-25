<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\JournalLocal;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve the next set of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data, allowing you to continue from where a previous request left off.
 *
 * @see HubSpotSDK\Services\WebhooksJournal\JournalLocalService::getNextFromOffset()
 *
 * @phpstan-type JournalLocalGetNextFromOffsetParamsShape = array{
 *   installPortalID?: int|null
 * }
 */
final class JournalLocalGetNextFromOffsetParams implements BaseModel
{
    /** @use SdkModel<JournalLocalGetNextFromOffsetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the portal installation to filter the webhook journal entries. This is an integer value.
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
     * The ID of the portal installation to filter the webhook journal entries. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
