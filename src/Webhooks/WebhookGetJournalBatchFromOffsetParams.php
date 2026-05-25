<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint allows you to fetch a defined number of entries, which can be useful for processing large datasets in manageable chunks.
 *
 * @see HubSpotSDK\Services\WebhooksService::getJournalBatchFromOffset()
 *
 * @phpstan-type WebhookGetJournalBatchFromOffsetParamsShape = array{
 *   offset: string, installPortalID?: int|null
 * }
 */
final class WebhookGetJournalBatchFromOffsetParams implements BaseModel
{
    /** @use SdkModel<WebhookGetJournalBatchFromOffsetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $offset;

    /**
     * The ID of the portal installation. This is an integer value.
     */
    #[Optional]
    public ?int $installPortalID;

    /**
     * `new WebhookGetJournalBatchFromOffsetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookGetJournalBatchFromOffsetParams::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookGetJournalBatchFromOffsetParams)->withOffset(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $offset,
        ?int $installPortalID = null
    ): self {
        $self = new self;

        $self['offset'] = $offset;

        null !== $installPortalID && $self['installPortalID'] = $installPortalID;

        return $self;
    }

    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * The ID of the portal installation. This is an integer value.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
