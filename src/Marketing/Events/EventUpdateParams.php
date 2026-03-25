<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyValue;

/**
 * @see HubspotSDK\Services\Marketing\EventsService::update()
 *
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 *
 * @phpstan-type EventUpdateParamsShape = array{
 *   customProperties: list<PropertyValue|PropertyValueShape>,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventDescription?: string|null,
 *   eventName?: string|null,
 *   eventOrganizer?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class EventUpdateParams implements BaseModel
{
    /** @use SdkModel<EventUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PropertyValue> $customProperties */
    #[Required(list: PropertyValue::class)]
    public array $customProperties;

    /**
     * The end date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $endDateTime;

    /**
     * Indicates if the marketing event has been cancelled.
     */
    #[Optional]
    public ?bool $eventCancelled;

    /**
     * The description of the marketing event.
     */
    #[Optional]
    public ?string $eventDescription;

    /**
     * The name of the marketing event.
     */
    #[Optional]
    public ?string $eventName;

    /**
     * The name of the organizer of the marketing event.
     */
    #[Optional]
    public ?string $eventOrganizer;

    /**
     * The type of the marketing event.
     */
    #[Optional]
    public ?string $eventType;

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    #[Optional('eventUrl')]
    public ?string $eventURL;

    /**
     * The start date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new EventUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpdateParams::with(customProperties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpdateParams)->withCustomProperties(...)
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
     * @param list<PropertyValue|PropertyValueShape> $customProperties
     */
    public static function with(
        array $customProperties,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $self = new self;

        $self['customProperties'] = $customProperties;

        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventName && $self['eventName'] = $eventName;
        null !== $eventOrganizer && $self['eventOrganizer'] = $eventOrganizer;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    /**
     * @param list<PropertyValue|PropertyValueShape> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

        return $self;
    }

    /**
     * The end date and time of the marketing event.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    /**
     * Indicates if the marketing event has been cancelled.
     */
    public function withEventCancelled(bool $eventCancelled): self
    {
        $self = clone $this;
        $self['eventCancelled'] = $eventCancelled;

        return $self;
    }

    /**
     * The description of the marketing event.
     */
    public function withEventDescription(string $eventDescription): self
    {
        $self = clone $this;
        $self['eventDescription'] = $eventDescription;

        return $self;
    }

    /**
     * The name of the marketing event.
     */
    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * The name of the organizer of the marketing event.
     */
    public function withEventOrganizer(string $eventOrganizer): self
    {
        $self = clone $this;
        $self['eventOrganizer'] = $eventOrganizer;

        return $self;
    }

    /**
     * The type of the marketing event.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    public function withEventURL(string $eventURL): self
    {
        $self = clone $this;
        $self['eventURL'] = $eventURL;

        return $self;
    }

    /**
     * The start date and time of the marketing event.
     */
    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $self = clone $this;
        $self['startDateTime'] = $startDateTime;

        return $self;
    }
}
