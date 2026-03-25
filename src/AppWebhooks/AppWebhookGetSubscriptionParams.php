<?php

declare(strict_types=1);

namespace HubspotSDK\AppWebhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\AppWebhooksService::getSubscription()
 *
 * @phpstan-type AppWebhookGetSubscriptionParamsShape = array{appID: int}
 */
final class AppWebhookGetSubscriptionParams implements BaseModel
{
    /** @use SdkModel<AppWebhookGetSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new AppWebhookGetSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AppWebhookGetSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AppWebhookGetSubscriptionParams)->withAppID(...)
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
