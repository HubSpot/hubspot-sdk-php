<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific event subscription by ID.
 *
 * @see HubspotSDK\Webhooks\Subscriptions->get
 *
 * @phpstan-type subscription_get_params = array{appID: int}
 */
final class SubscriptionGetParams implements BaseModel
{
    /** @use SdkModel<subscription_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    /**
     * `new SubscriptionGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionGetParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionGetParams)->withAppID(...)
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
