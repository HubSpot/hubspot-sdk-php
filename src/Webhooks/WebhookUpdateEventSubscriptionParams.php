<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing event subscription by ID.
 *
 * @see HubSpotSDK\Services\WebhooksService::updateEventSubscription()
 *
 * @phpstan-type WebhookUpdateEventSubscriptionParamsShape = array{
 *   appID: int, active?: bool|null
 * }
 */
final class WebhookUpdateEventSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookUpdateEventSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * A boolean indicating whether the subscription is active. If true, the subscription is active; if false, it is inactive.
     */
    #[Optional]
    public ?bool $active;

    /**
     * `new WebhookUpdateEventSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookUpdateEventSubscriptionParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookUpdateEventSubscriptionParams)->withAppID(...)
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
        $self = new self;

        $self['appID'] = $appID;

        null !== $active && $self['active'] = $active;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * A boolean indicating whether the subscription is active. If true, the subscription is active; if false, it is inactive.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
