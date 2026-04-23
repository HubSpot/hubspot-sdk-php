<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\SubscriptionCreateRequest\EventType;

/**
 * @phpstan-type SubscriptionCreateRequestShape = array{
 *   active: bool,
 *   eventType: EventType|value-of<EventType>,
 *   eventTypeName?: string|null,
 *   objectTypeID?: string|null,
 *   propertyName?: string|null,
 * }
 */
final class SubscriptionCreateRequest implements BaseModel
{
    /** @use SdkModel<SubscriptionCreateRequestShape> */
    use SdkModel;

    /**
     * A boolean indicating whether the subscription is active.
     */
    #[Required]
    public bool $active;

    /**
     * A string representing the type of event to subscribe to. Valid values include various property changes, creations, deletions, merges, restorations, association changes, and event completions.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * A string providing a human-readable name for the event type.
     */
    #[Optional]
    public ?string $eventTypeName;

    /**
     * A string representing the ID of the object type associated with the subscription.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * A string indicating the specific property name related to the event type, if applicable.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * `new SubscriptionCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionCreateRequest::with(active: ..., eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionCreateRequest)->withActive(...)->withEventType(...)
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
     * A boolean indicating whether the subscription is active.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * A string representing the type of event to subscribe to. Valid values include various property changes, creations, deletions, merges, restorations, association changes, and event completions.
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
     * A string providing a human-readable name for the event type.
     */
    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * A string representing the ID of the object type associated with the subscription.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * A string indicating the specific property name related to the event type, if applicable.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }
}
