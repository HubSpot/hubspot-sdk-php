<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionBatchUpdateRequestShape = array{id: int, active: bool}
 */
final class SubscriptionBatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionBatchUpdateRequestShape> */
    use SdkModel;

    /**
     * The unique identifier for the subscription. It is an integer.
     */
    #[Required]
    public int $id;

    /**
     * A boolean indicating whether the subscription is active.
     */
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

    /**
     * The unique identifier for the subscription. It is an integer.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A boolean indicating whether the subscription is active.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
