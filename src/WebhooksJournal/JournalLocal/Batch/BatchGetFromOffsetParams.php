<?php

declare(strict_types=1);

namespace HubSpotSDK\WebhooksJournal\JournalLocal\Batch;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a batch of webhook journal entries starting from a specified offset. This endpoint is useful for paginating through large sets of webhook data. The number of entries returned is determined by the 'count' parameter.
 *
 * @see HubSpotSDK\Services\WebhooksJournal\JournalLocal\BatchService::getFromOffset()
 *
 * @phpstan-type BatchGetFromOffsetParamsShape = array{
 *   offset: string, installPortalID?: int|null
 * }
 */
final class BatchGetFromOffsetParams implements BaseModel
{
    /** @use SdkModel<BatchGetFromOffsetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $offset;

    /**
     * The ID of the portal where the webhooks are installed. This is an optional parameter.
     */
    #[Optional]
    public ?int $installPortalID;

    /**
     * `new BatchGetFromOffsetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetFromOffsetParams::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetFromOffsetParams)->withOffset(...)
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
     * The ID of the portal where the webhooks are installed. This is an optional parameter.
     */
    public function withInstallPortalID(int $installPortalID): self
    {
        $self = clone $this;
        $self['installPortalID'] = $installPortalID;

        return $self;
    }
}
