<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks\Subscriptions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\Subscriptions\SubscriptionCreateParams\EventType;

/**
 * Create new event subscription for the specified app.
 *
 * @see HubspotSDK\Services\Webhooks\SubscriptionsService::create()
 *
 * @phpstan-type SubscriptionCreateParamsShape = array{
 *   eventType: EventType|value-of<EventType>,
 *   active?: bool,
 *   objectTypeID?: string,
 *   propertyName?: string,
 * }
 */
final class SubscriptionCreateParams implements BaseModel
{
    /** @use SdkModel<SubscriptionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
    #[Optional]
    public ?bool $active;

    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * `new SubscriptionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionCreateParams::with(eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionCreateParams)->withEventType(...)
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
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public static function with(
        EventType|string $eventType,
        ?bool $active = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
    ): self {
        $self = new self;

        $self['eventType'] = $eventType;

        null !== $active && $self['active'] = $active;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $propertyName && $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * Determines if the subscription is active or paused. Defaults to false.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The internal name of the property to monitor for changes. Only applies when `eventType` is `propertyChange`.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }
}
