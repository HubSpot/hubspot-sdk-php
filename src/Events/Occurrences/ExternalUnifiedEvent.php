<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Occurrences;

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
        $self = new self;

        $self['id'] = $id;
        $self['eventType'] = $eventType;
        $self['objectID'] = $objectID;
        $self['objectType'] = $objectType;
        $self['occurredAt'] = $occurredAt;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * A unique identifier for the event.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The format of the `eventType` string is `ae{appId}_{eventTypeLabel}`, `pe{portalId}_{eventTypeLabel}`, or just `e_{eventTypeLabel}` for HubSpot events.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * The objectId of the object which did the event.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The objectType for the object which did the event.
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * An ISO 8601 timestamp when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * A key-value map of event-specific properties. The available properties depend on the event type definition.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
