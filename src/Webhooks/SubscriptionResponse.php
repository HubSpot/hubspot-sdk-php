<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\SubscriptionResponse\EventType;

/**
 * @phpstan-type SubscriptionResponseShape = array{
 *   id: string,
 *   active: bool,
 *   createdAt: \DateTimeInterface,
 *   eventType: EventType|value-of<EventType>,
 *   eventTypeName?: string|null,
 *   objectTypeID?: string|null,
 *   propertyName?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class SubscriptionResponse implements BaseModel
{
    /** @use SdkModel<SubscriptionResponseShape> */
    use SdkModel;

    /**
     * The unique ID of the webhook subscription.
     */
    #[Required]
    public string $id;

    /**
     * Whether the subscription is active or paused. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     */
    #[Required]
    public bool $active;

    /**
     * The timestamp when the webhook subscription was created, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The type of event to listen for. Accepted values include contact.creation, contact.deletion, contact.propertyChange, and similar event types for other CRM objects and custom objects.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * The name of the event to listen for. This is used with custom objects to specify custom event types beyond the standard eventType enum values.
     */
    #[Optional]
    public ?string $eventTypeName;

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The internal name of the property to monitor for changes. Only applies when eventType is propertyChange.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * The timestamp when the webhook subscription was last updated, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new SubscriptionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SubscriptionResponse::with(id: ..., active: ..., createdAt: ..., eventType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SubscriptionResponse)
     *   ->withID(...)
     *   ->withActive(...)
     *   ->withCreatedAt(...)
     *   ->withEventType(...)
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
        string $id,
        bool $active,
        \DateTimeInterface $createdAt,
        EventType|string $eventType,
        ?string $eventTypeName = null,
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['createdAt'] = $createdAt;
        $self['eventType'] = $eventType;

        null !== $eventTypeName && $self['eventTypeName'] = $eventTypeName;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique ID of the webhook subscription.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether the subscription is active or paused. If true, the subscription will send webhook notifications. If false, the subscription is paused and will not send notifications.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * The timestamp when the webhook subscription was created, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of event to listen for. Accepted values include contact.creation, contact.deletion, contact.propertyChange, and similar event types for other CRM objects and custom objects.
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
     * The name of the event to listen for. This is used with custom objects to specify custom event types beyond the standard eventType enum values.
     */
    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * The ID of the object type for the subscription. This can be a standard CRM object (e.g., 'contact', 'company', 'deal') or a custom object ID for custom object subscriptions.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The internal name of the property to monitor for changes. Only applies when eventType is propertyChange.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * The timestamp when the webhook subscription was last updated, in ISO 8601 format (e.g., 2020-02-29T12:30:00Z).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
