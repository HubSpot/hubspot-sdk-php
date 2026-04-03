<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing event subscription by ID.
 *
 * @see HubspotSDK\Services\Webhooks\WebhookSubscriptionsService::deleteSubscription()
 *
 * @phpstan-type WebhookSubscriptionDeleteSubscriptionParamsShape = array{
 *   appID: int
 * }
 */
final class WebhookSubscriptionDeleteSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookSubscriptionDeleteSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new WebhookSubscriptionDeleteSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookSubscriptionDeleteSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookSubscriptionDeleteSubscriptionParams)->withAppID(...)
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
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
