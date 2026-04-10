<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\WebhooksService::getJournalBatchAfterOffset()
 *
 * @phpstan-type WebhookGetJournalBatchAfterOffsetParamsShape = array{
 *   offset: string, installPortalID?: int|null
 * }
 */
final class WebhookGetJournalBatchAfterOffsetParams implements BaseModel
{
    /** @use SdkModel<WebhookGetJournalBatchAfterOffsetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $offset;

    #[Optional]
    public ?int $installPortalID;

    /**
     * `new WebhookGetJournalBatchAfterOffsetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookGetJournalBatchAfterOffsetParams::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookGetJournalBatchAfterOffsetParams)->withOffset(...)
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

    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
