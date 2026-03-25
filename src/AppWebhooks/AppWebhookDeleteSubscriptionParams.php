<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\AppWebhooksService::deleteSubscription()
 *
 * @phpstan-type AppWebhookDeleteSubscriptionParamsShape = array{appID: int}
 */
final class AppWebhookDeleteSubscriptionParams implements BaseModel
{
    /** @use SdkModel<AppWebhookDeleteSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new AppWebhookDeleteSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppWebhookDeleteSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppWebhookDeleteSubscriptionParams)->withAppID(...)
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
