<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type marketing_event_public_read_response = array{
 *   id: string,
 *   attendees: int,
 *   cancellations: int,
 *   createdAt: \DateTimeInterface,
 *   eventName: string,
 *   eventOrganizer: string,
 *   externalEventID: string,
 *   noShows: int,
 *   registrants: int,
 *   updatedAt: \DateTimeInterface,
 *   customProperties?: list<PropertyValue>,
 *   endDateTime?: \DateTimeInterface,
 *   eventCancelled?: bool,
 *   eventCompleted?: bool,
 *   eventDescription?: string,
 *   eventType?: string,
 *   eventURL?: string,
 *   objectID?: string,
 *   startDateTime?: \DateTimeInterface,
 * }
 */
final class MarketingEventPublicReadResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<marketing_event_public_read_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    /**
     * The number of HubSpot contacts that attended this marketing event.
     */
    #[Api]
    public int $attendees;

    /**
     * The number of HubSpot contacts that registered for this marketing event, but later cancelled their registration.
     */
    #[Api]
    public int $cancellations;

    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The name of the marketing event.
     */
    #[Api]
    public string $eventName;

    /**
     * The name of the organizer of the marketing event.
     */
    #[Api]
    public string $eventOrganizer;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Api('externalEventId')]
    public string $externalEventID;

    /**
     * The number of HubSpot contacts that registered for this marketing event, but did not attend. This field only had a value when the event is over.
     */
    #[Api]
    public int $noShows;

    /**
     * The number of HubSpot contacts that registered for this marketing event.
     */
    #[Api]
    public int $registrants;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @var list<PropertyValue>|null $customProperties
     */
    #[Api(list: PropertyValue::class, optional: true)]
    public ?array $customProperties;

    /**
     * The end date and time of the marketing event.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $endDateTime;

    /**
     * Indicates if the marketing event has been cancelled.
     */
    #[Api(optional: true)]
    public ?bool $eventCancelled;

    #[Api(optional: true)]
    public ?bool $eventCompleted;

    /**
     * The description of the marketing event.
     */
    #[Api(optional: true)]
    public ?string $eventDescription;

    /**
     * The type of the marketing event.
     */
    #[Api(optional: true)]
    public ?string $eventType;

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    #[Api('eventUrl', optional: true)]
    public ?string $eventURL;

    #[Api('objectId', optional: true)]
    public ?string $objectID;

    /**
     * The start date and time of the marketing event.
     */
    #[Api(optional: true)]
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
     * @param list<PropertyValue> $customProperties
     */
    public static function with(
        string $id,
        int $attendees,
        int $cancellations,
        \DateTimeInterface $createdAt,
        string $eventName,
        string $eventOrganizer,
        string $externalEventID,
        int $noShows,
        int $registrants,
        \DateTimeInterface $updatedAt,
        ?array $customProperties = null,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?string $objectID = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->attendees = $attendees;
        $obj->cancellations = $cancellations;
        $obj->createdAt = $createdAt;
        $obj->eventName = $eventName;
        $obj->eventOrganizer = $eventOrganizer;
        $obj->externalEventID = $externalEventID;
        $obj->noShows = $noShows;
        $obj->registrants = $registrants;
        $obj->updatedAt = $updatedAt;

        null !== $customProperties && $obj->customProperties = $customProperties;
        null !== $endDateTime && $obj->endDateTime = $endDateTime;
        null !== $eventCancelled && $obj->eventCancelled = $eventCancelled;
        null !== $eventCompleted && $obj->eventCompleted = $eventCompleted;
        null !== $eventDescription && $obj->eventDescription = $eventDescription;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $eventURL && $obj->eventURL = $eventURL;
        null !== $objectID && $obj->objectID = $objectID;
        null !== $startDateTime && $obj->startDateTime = $startDateTime;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that attended this marketing event.
     */
    public function withAttendees(int $attendees): self
    {
        $obj = clone $this;
        $obj->attendees = $attendees;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but later cancelled their registration.
     */
    public function withCancellations(int $cancellations): self
    {
        $obj = clone $this;
        $obj->cancellations = $cancellations;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The name of the marketing event.
     */
    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj->eventName = $eventName;

        return $obj;
    }

    /**
     * The name of the organizer of the marketing event.
     */
    public function withEventOrganizer(string $eventOrganizer): self
    {
        $obj = clone $this;
        $obj->eventOrganizer = $eventOrganizer;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj->externalEventID = $externalEventID;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but did not attend. This field only had a value when the event is over.
     */
    public function withNoShows(int $noShows): self
    {
        $obj = clone $this;
        $obj->noShows = $noShows;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event.
     */
    public function withRegistrants(int $registrants): self
    {
        $obj = clone $this;
        $obj->registrants = $registrants;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @param list<PropertyValue> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj->customProperties = $customProperties;

        return $obj;
    }

    /**
     * The end date and time of the marketing event.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj->endDateTime = $endDateTime;

        return $obj;
    }

    /**
     * Indicates if the marketing event has been cancelled.
     */
    public function withEventCancelled(bool $eventCancelled): self
    {
        $obj = clone $this;
        $obj->eventCancelled = $eventCancelled;

        return $obj;
    }

    public function withEventCompleted(bool $eventCompleted): self
    {
        $obj = clone $this;
        $obj->eventCompleted = $eventCompleted;

        return $obj;
    }

    /**
     * The description of the marketing event.
     */
    public function withEventDescription(string $eventDescription): self
    {
        $obj = clone $this;
        $obj->eventDescription = $eventDescription;

        return $obj;
    }

    /**
     * The type of the marketing event.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->eventType = $eventType;

        return $obj;
    }

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    public function withEventURL(string $eventURL): self
    {
        $obj = clone $this;
        $obj->eventURL = $eventURL;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    /**
     * The start date and time of the marketing event.
     */
    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj->startDateTime = $startDateTime;

        return $obj;
    }
}
