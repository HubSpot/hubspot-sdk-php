<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing event subscription by ID.
 *
 * @see HubspotSDK\Webhooks\Subscriptions->delete
 *
 * @phpstan-type subscription_delete_params = array{appID: int}
 */
final class SubscriptionDeleteParams implements BaseModel
{
    /** @use SdkModel<subscription_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * `new SubscriptionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDeleteParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionDeleteParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
