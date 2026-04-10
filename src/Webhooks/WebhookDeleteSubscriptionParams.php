<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing event subscription by ID.
 *
 * @see HubSpotSDK\Services\WebhooksService::deleteSubscription()
 *
 * @phpstan-type WebhookDeleteSubscriptionParamsShape = array{appID: int}
 */
final class WebhookDeleteSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookDeleteSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new WebhookDeleteSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookDeleteSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookDeleteSubscriptionParams)->withAppID(...)
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
