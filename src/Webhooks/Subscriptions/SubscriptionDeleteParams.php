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
 * @phpstan-type SubscriptionDeleteParamsShape = array{appId: int}
 */
final class SubscriptionDeleteParams implements BaseModel
{
    /** @use SdkModel<SubscriptionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * `new SubscriptionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionDeleteParams::with(appId: ...)
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
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj->appId = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }
}
