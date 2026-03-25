<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

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
     * Determines if the subscription is active or paused.
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
     * Determines if the subscription is active or paused.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
