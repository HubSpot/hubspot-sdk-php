<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing event subscription by ID.
 *
 * @see HubspotSDK\Webhooks\Subscriptions->update
 *
 * @phpstan-type subscription_update_params = array{appID: int, active?: bool}
 */
final class SubscriptionUpdateParams implements BaseModel
{
    /** @use SdkModel<subscription_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * Determines if the subscription is active or paused.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * `new SubscriptionUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionUpdateParams)->withAppID(...)
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
    public static function with(int $appID, ?bool $active = null): self
    {
        $obj = new self;

        $obj->appID = $appID;

        null !== $active && $obj->active = $active;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

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
