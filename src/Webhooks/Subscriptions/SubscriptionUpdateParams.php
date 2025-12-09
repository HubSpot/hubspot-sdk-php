<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing event subscription by ID.
 *
 * @see HubspotSDK\Services\Webhooks\SubscriptionsService::update()
 *
 * @phpstan-type SubscriptionUpdateParamsShape = array{appID: int, active?: bool}
 */
final class SubscriptionUpdateParams implements BaseModel
{
    /** @use SdkModel<SubscriptionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Determines if the subscription is active or paused.
     */
    #[Optional]
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
     * Determines if the subscription is active or paused.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }
}
