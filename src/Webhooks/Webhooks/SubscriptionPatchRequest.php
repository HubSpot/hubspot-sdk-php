<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionPatchRequestShape = array{active?: bool|null}
 */
final class SubscriptionPatchRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionPatchRequestShape> */
    use SdkModel;

    /**
     * Whether to activate or pause the webhook subscription. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     */
    #[Optional]
    public ?bool $active;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $active = null): self
    {
        $self = new self;

        null !== $active && $self['active'] = $active;

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
