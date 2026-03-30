<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

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

    /**
     * The ID of the webhook subscription to update.
     */
    #[Required]
    public int $id;

    /**
     * Whether to activate or pause the webhook subscription. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
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
     * The ID of the webhook subscription to update.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether to activate or pause the webhook subscription. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
