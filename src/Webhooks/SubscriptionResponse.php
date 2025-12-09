<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Webhooks\SubscriptionResponse\EventType;

/**
 * Complete details for an event subscription.
 *
 * @phpstan-type SubscriptionResponseShape = array{
 *   id: string,
 *   active: bool,
 *   createdAt: \DateTimeInterface,
 *   eventType: value-of<EventType>,
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
     * The unique ID of the subscription.
     */
    #[Required]
    public string $id;

    /**
     * Determines if the subscription is active or paused.
     */
    #[Required]
    public bool $active;

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @var value-of<EventType> $eventType
     */
    #[Required(enum: EventType::class)]
    public string $eventType;

    /**
     * The identifier of the object type associated with the subscription.
     */
    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The internal name of the property being monitored for changes. Only applies when `eventType` is `propertyChange`.
     */
    #[Optional]
    public ?string $propertyName;

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
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
        ?string $objectTypeID = null,
        ?string $propertyName = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['active'] = $active;
        $self['createdAt'] = $createdAt;
        $self['eventType'] = $eventType;

        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $propertyName && $self['propertyName'] = $propertyName;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The unique ID of the subscription.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * The identifier of the object type associated with the subscription.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The internal name of the property being monitored for changes. Only applies when `eventType` is `propertyChange`.
     */
    public function withPropertyName(string $propertyName): self
    {
        $self = clone $this;
        $self['propertyName'] = $propertyName;

        return $self;
    }

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
