<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\WebhookSubscriptions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific event subscription by ID.
 *
 * @see HubspotSDK\Services\Webhooks\WebhookSubscriptionsService::getSubscription()
 *
 * @phpstan-type WebhookSubscriptionGetSubscriptionParamsShape = array{appID: int}
 */
final class WebhookSubscriptionGetSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookSubscriptionGetSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new WebhookSubscriptionGetSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookSubscriptionGetSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookSubscriptionGetSubscriptionParams)->withAppID(...)
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
