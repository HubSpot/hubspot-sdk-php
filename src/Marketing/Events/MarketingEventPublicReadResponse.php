<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\Marketing\Events\PropertyValue
 *
 * @phpstan-type MarketingEventPublicReadResponseShape = array{
 *   id: string,
 *   attendees: int,
 *   cancellations: int,
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<PropertyValueShape>,
 *   eventName: string,
 *   eventOrganizer: string,
 *   externalEventID: string,
 *   noShows: int,
 *   registrants: int,
 *   updatedAt: \DateTimeInterface,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   objectID?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventPublicReadResponse implements BaseModel
{
    /** @use SdkModel<MarketingEventPublicReadResponseShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * The number of HubSpot contacts that attended this marketing event.
     */
    #[Required]
    public int $attendees;

    /**
     * The number of HubSpot contacts that registered for this marketing event, but later cancelled their registration.
     */
    #[Required]
    public int $cancellations;

    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @var list<PropertyValue> $customProperties
     */
    #[Required(list: PropertyValue::class)]
    public array $customProperties;

    /**
     * The name of the marketing event.
     */
    #[Required]
    public string $eventName;

    /**
     * The name of the organizer of the marketing event.
     */
    #[Required]
    public string $eventOrganizer;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Required('externalEventId')]
    public string $externalEventID;

    /**
     * The number of HubSpot contacts that registered for this marketing event, but did not attend. This field only had a value when the event is over.
     */
    #[Required]
    public int $noShows;

    /**
     * The number of HubSpot contacts that registered for this marketing event.
     */
    #[Required]
    public int $registrants;

    #[Required]
    public \DateTimeInterface $updatedAt;

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

    #[Optional]
    public ?bool $eventCompleted;

    /**
     * The description of the marketing event.
     */
    #[Optional]
    public ?string $eventDescription;

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

    #[Optional('objectId')]
    public ?string $objectID;

    /**
     * The start date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new MarketingEventPublicReadResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventPublicReadResponse::with(
     *   id: ...,
     *   attendees: ...,
     *   cancellations: ...,
     *   createdAt: ...,
     *   customProperties: ...,
     *   eventName: ...,
     *   eventOrganizer: ...,
     *   externalEventID: ...,
     *   noShows: ...,
     *   registrants: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingEventPublicReadResponse)
     *   ->withID(...)
     *   ->withAttendees(...)
     *   ->withCancellations(...)
     *   ->withCreatedAt(...)
     *   ->withCustomProperties(...)
     *   ->withEventName(...)
     *   ->withEventOrganizer(...)
     *   ->withExternalEventID(...)
     *   ->withNoShows(...)
     *   ->withRegistrants(...)
     *   ->withUpdatedAt(...)
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
     * @param list<PropertyValueShape> $customProperties
     */
    public static function with(
        string $id,
        int $attendees,
        int $cancellations,
        \DateTimeInterface $createdAt,
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalEventID,
        int $noShows,
        int $registrants,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?string $objectID = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attendees'] = $attendees;
        $self['cancellations'] = $cancellations;
        $self['createdAt'] = $createdAt;
        $self['customProperties'] = $customProperties;
        $self['eventName'] = $eventName;
        $self['eventOrganizer'] = $eventOrganizer;
        $self['externalEventID'] = $externalEventID;
        $self['noShows'] = $noShows;
        $self['registrants'] = $registrants;
        $self['updatedAt'] = $updatedAt;

        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $self['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The number of HubSpot contacts that attended this marketing event.
     */
    public function withAttendees(int $attendees): self
    {
        $self = clone $this;
        $self['attendees'] = $attendees;

        return $self;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but later cancelled their registration.
     */
    public function withCancellations(int $cancellations): self
    {
        $self = clone $this;
        $self['cancellations'] = $cancellations;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @param list<PropertyValueShape> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $self = clone $this;
        $self['customProperties'] = $customProperties;

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
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $self = clone $this;
        $self['externalEventID'] = $externalEventID;

        return $self;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but did not attend. This field only had a value when the event is over.
     */
    public function withNoShows(int $noShows): self
    {
        $self = clone $this;
        $self['noShows'] = $noShows;

        return $self;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event.
     */
    public function withRegistrants(int $registrants): self
    {
        $self = clone $this;
        $self['registrants'] = $registrants;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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

    public function withEventCompleted(bool $eventCompleted): self
    {
        $self = clone $this;
        $self['eventCompleted'] = $eventCompleted;

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

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

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
