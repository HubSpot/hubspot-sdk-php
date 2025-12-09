<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionBatchUpdateRequestShape = array{id: int, active: bool}
 */
final class SubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionBatchUpdateRequestShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public bool $active;

    /**
     * `new SubscriptionBatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionBatchUpdateRequest::with(id: ..., active: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionBatchUpdateRequest)->withID(...)->withActive(...)
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
    public static function with(int $id, bool $active): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
