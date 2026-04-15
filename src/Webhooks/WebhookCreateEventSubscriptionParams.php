<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\WebhookCreateEventSubscriptionParams\EventType;

/**
 * Create new event subscription for the specified app.
 *
 * @see HubSpotSDK\Services\WebhooksService::createEventSubscription()
 *
 * @phpstan-type WebhookCreateEventSubscriptionParamsShape = array{
 *   active: bool,
 *   eventType: EventType|value-of<EventType>,
 *   eventTypeName?: string|null,
 *   objectTypeID?: string|null,
 *   propertyName?: string|null,
 * }
 */
final class WebhookCreateEventSubscriptionParams implements BaseModel
{
    /** @use SdkModel<WebhookCreateEventSubscriptionParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A boolean indicating whether the subscription is active. This field is required.
     */
    #[Required]
    public bool $active;

    /**
     * A string representing the type of event to subscribe to. Valid values include various object changes such as 'contact.propertyChange', 'deal.creation', and 'conversation.newMessage'.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * A string that provides a human-readable name for the event type. This is optional.
     */
    #[Optional]
    public ?string $eventTypeName;

    /**
     * A string representing the identifier of the object type for which the subscription is being created. This is optional.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * A string indicating the name of the property that triggers the event. This is optional and used when subscribing to property change events.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * `new WebhookCreateEventSubscriptionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WebhookCreateEventSubscriptionParams::with(active: ..., eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WebhookCreateEventSubscriptionParams)->withActive(...)->withEventType(...)
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
        bool $active,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
    ): self {
        $self = new self;

        $self['active'] = $active;
        $self['eventType'] = $eventType;

        null !== $eventTypeName && $self['eventTypeName'] = $eventTypeName;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $propertyName && $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * A boolean indicating whether the subscription is active. This field is required.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * A string representing the type of event to subscribe to. Valid values include various object changes such as 'contact.propertyChange', 'deal.creation', and 'conversation.newMessage'.
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
     * A string that provides a human-readable name for the event type. This is optional.
     */
    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * A string representing the identifier of the object type for which the subscription is being created. This is optional.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * A string indicating the name of the property that triggers the event. This is optional and used when subscribing to property change events.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }
}
