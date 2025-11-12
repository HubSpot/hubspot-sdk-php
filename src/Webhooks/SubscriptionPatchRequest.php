<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updated details for the subscription.
 *
 * @phpstan-type SubscriptionPatchRequestShape = array{active?: bool|null}
 */
final class SubscriptionPatchRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionPatchRequestShape> */
    use SdkModel;

    /**
     * Determines if the subscription is active or paused.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $active && $obj->active = $active;

        return $obj;
    }

    /**
     * Determines if the subscription is active or paused.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }
}
