<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Api;
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
 *   objectTypeID?: string,
 *   propertyName?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class SubscriptionResponse implements BaseModel
{
    /** @use SdkModel<SubscriptionResponseShape> */
    use SdkModel;

    /**
     * The unique ID of the subscription.
     */
    #[Api]
    public string $id;

    /**
     * Determines if the subscription is active or paused.
     */
    #[Api]
    public bool $active;

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @var value-of<EventType> $eventType
     */
    #[Api(enum: EventType::class)]
    public string $eventType;

    /**
     * The identifier of the object type associated with the subscription.
     */
    #[Api('objectTypeId', optional: true)]
    public ?string $objectTypeID;

    /**
     * The internal name of the property being monitored for changes. Only applies when `eventType` is `propertyChange`.
     */
    #[Api(optional: true)]
    public ?string $propertyName;

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->active = $active;
        $obj->createdAt = $createdAt;
        $obj['eventType'] = $eventType;

        null !== $objectTypeID && $obj->objectTypeID = $objectTypeID;
        null !== $propertyName && $obj->propertyName = $propertyName;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The unique ID of the subscription.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Determines if the subscription is active or paused.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

        return $obj;
    }

    /**
     * When this subscription was created. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Type of event to listen for. Can be one of `create`, `delete`, `deletedForPrivacy`, or `propertyChange`.
     *
     * @param EventType|value-of<EventType> $eventType
     */
    public function withEventType(EventType|string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * The identifier of the object type associated with the subscription.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * The internal name of the property being monitored for changes. Only applies when `eventType` is `propertyChange`.
     */
    public function withPropertyName(string $propertyName): self
    {
        $obj = clone $this;
        $obj->propertyName = $propertyName;

        return $obj;
    }

    /**
     * When this subscription was last updated. Formatted as milliseconds from the [Unix epoch](#).
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
