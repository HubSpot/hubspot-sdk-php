<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Webhooks\SubscriptionResponse\EventType;

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
     * The unique identifier for the subscription, represented as an integer.
     */
    #[Required]
    public string $id;

    /**
     * A boolean indicating whether the subscription is currently active.
     */
    #[Required]
    public bool $active;

    /**
     * The date and time when the subscription was created, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The type of event that triggers the subscription. Valid values include various object changes such as 'contact.propertyChange', 'deal.creation', and 'ticket.deletion'.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * A descriptive name for the event type.
     */
    #[Optional]
    public ?string $eventTypeName;

    /**
     * The identifier for the object type associated with the subscription, represented as a string.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The name of the property associated with the event, if applicable.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * The date and time when the subscription was last updated, in ISO 8601 format.
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
     * The unique identifier for the subscription, represented as an integer.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * A boolean indicating whether the subscription is currently active.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * The date and time when the subscription was created, in ISO 8601 format.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of event that triggers the subscription. Valid values include various object changes such as 'contact.propertyChange', 'deal.creation', and 'ticket.deletion'.
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
     * A descriptive name for the event type.
     */
    public function withEventTypeName(string $eventTypeName): self
    {
        $self = clone $this;
        $self['eventTypeName'] = $eventTypeName;

        return $self;
    }

    /**
     * The identifier for the object type associated with the subscription, represented as a string.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The name of the property associated with the event, if applicable.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * The date and time when the subscription was last updated, in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
