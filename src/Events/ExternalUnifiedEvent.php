<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalUnifiedEventShape = array{
 *   id: string,
 *   eventType: string,
 *   objectID: string,
 *   objectType: string,
 *   occurredAt: \DateTimeInterface,
 *   properties: array<string,string>,
 * }
 */
final class ExternalUnifiedEvent implements BaseModel
{
    /** @use SdkModel<ExternalUnifiedEventShape> */
    use SdkModel;

    /**
     * A unique identifier for the event.
     */
    #[Required]
    public string $id;

    /**
     * The format of the `eventType` string is `ae{appId}_{eventTypeLabel}`, `pe{portalId}_{eventTypeLabel}`, or just `e_{eventTypeLabel}` for HubSpot events.
     */
    #[Required]
    public string $eventType;

    /**
     * The objectId of the object which did the event.
     */
    #[Required('objectId')]
    public string $objectID;

    /**
     * The objectType for the object which did the event.
     */
    #[Required]
    public string $objectType;

    /**
     * An ISO 8601 timestamp when the event occurred.
     */
    #[Required]
    public \DateTimeInterface $occurredAt;

    /**
     * A key-value map of event-specific properties. The available properties depend on the event type definition.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new ExternalUnifiedEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalUnifiedEvent::with(
     *   id: ...,
     *   eventType: ...,
     *   objectID: ...,
     *   objectType: ...,
     *   occurredAt: ...,
     *   properties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalUnifiedEvent)
     *   ->withID(...)
     *   ->withEventType(...)
     *   ->withObjectID(...)
     *   ->withObjectType(...)
     *   ->withOccurredAt(...)
     *   ->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(
        string $id,
        string $eventType,
        string $objectID,
        string $objectType,
        \DateTimeInterface $occurredAt,
        array $properties,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['eventType'] = $eventType;
        $obj['objectID'] = $objectID;
        $obj['objectType'] = $objectType;
        $obj['occurredAt'] = $occurredAt;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * A unique identifier for the event.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The format of the `eventType` string is `ae{appId}_{eventTypeLabel}`, `pe{portalId}_{eventTypeLabel}`, or just `e_{eventTypeLabel}` for HubSpot events.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * The objectId of the object which did the event.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectID'] = $objectID;

        return $obj;
    }

    /**
     * The objectType for the object which did the event.
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * An ISO 8601 timestamp when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * A key-value map of event-specific properties. The available properties depend on the event type definition.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
