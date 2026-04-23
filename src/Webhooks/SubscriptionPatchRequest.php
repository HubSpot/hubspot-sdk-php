<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SubscriptionPatchRequestShape = array{active?: bool|null}
 */
final class SubscriptionPatchRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionPatchRequestShape> */
    use SdkModel;

    /**
     * A boolean indicating whether the subscription is active. If true, the subscription is active; if false, it is inactive.
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
     * A boolean indicating whether the subscription is active. If true, the subscription is active; if false, it is inactive.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
