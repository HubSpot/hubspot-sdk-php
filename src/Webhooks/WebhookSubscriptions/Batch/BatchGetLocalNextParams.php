<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions\Batch;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Webhooks\WebhookSubscriptions\BatchService::getLocalNext()
 *
 * @phpstan-type BatchGetLocalNextParamsShape = array{
 *   offset: string, installPortalID?: int|null
 * }
 */
final class BatchGetLocalNextParams implements BaseModel
{
    /** @use SdkModel<BatchGetLocalNextParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $offset;

    #[Optional]
    public ?int $installPortalID;

    /**
     * `new BatchGetLocalNextParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchGetLocalNextParams::with(offset: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchGetLocalNextParams)->withOffset(...)
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
