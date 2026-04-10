<?php

declare(strict_types=1);

namespace HubSpotSDK\Events;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BehavioralEventHTTPCompletionRequestShape = array{
 *   eventName: string,
 *   properties: array<string,string>,
 *   email?: string|null,
 *   objectID?: string|null,
 *   occurredAt?: \DateTimeInterface|null,
 *   utk?: string|null,
 *   uuid?: string|null,
 * }
 */
final class BehavioralEventHTTPCompletionRequest implements BaseModel
{
    /** @use SdkModel<BehavioralEventHTTPCompletionRequestShape> */
    use SdkModel;

    /**
     * Internal name of the event-type to trigger.
     */
    #[Required]
    public string $eventName;

    /**
     * Map of properties for the event in the format property internal name - property value.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * Email of visitor.
     */
    #[Optional]
    public ?string $email;

    /**
     * The object id that this event occurred on. Could be a contact id or a visitor id.
     */
    #[Optional('objectId')]
    public ?string $objectID;

    /**
     * The time when this event occurred (if any). If this isn't set, the current time will be used.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredAt;

    /**
     * User token.
     */
    #[Optional]
    public ?string $utk;

    #[Optional]
    public ?string $uuid;

    /**
     * `new BehavioralEventHTTPCompletionRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BehavioralEventHTTPCompletionRequest::with(eventName: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BehavioralEventHTTPCompletionRequest)
     *   ->withEventName(...)
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
        string $eventName,
        array $properties,
        ?string $email = null,
        ?string $objectID = null,
        ?\DateTimeInterface $occurredAt = null,
        ?string $utk = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        $self['eventName'] = $eventName;
        $self['properties'] = $properties;

        null !== $email && $self['email'] = $email;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;
        null !== $utk && $self['utk'] = $utk;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    /**
     * Internal name of the event-type to trigger.
     */
    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * Map of properties for the event in the format property internal name - property value.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Email of visitor.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The object id that this event occurred on. Could be a contact id or a visitor id.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The time when this event occurred (if any). If this isn't set, the current time will be used.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * User token.
     */
    public function withUtk(string $utk): self
    {
        $self = clone $this;
        $self['utk'] = $utk;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
