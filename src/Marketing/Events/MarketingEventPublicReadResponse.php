<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;

/**
 * @phpstan-type MarketingEventPublicReadResponseShape = array{
 *   id: string,
 *   attendees: int,
 *   cancellations: int,
 *   createdAt: \DateTimeInterface,
 *   customProperties: list<PropertyValue>,
 *   eventName: string,
 *   eventOrganizer: string,
 *   externalEventId: string,
 *   noShows: int,
 *   registrants: int,
 *   updatedAt: \DateTimeInterface,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventType?: string|null,
 *   eventUrl?: string|null,
 *   objectId?: string|null,
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
    #[Required]
    public string $externalEventId;

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
    #[Optional]
    public ?string $eventUrl;

    #[Optional]
    public ?string $objectId;

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
     *   externalEventId: ...,
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
     * @param list<PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestId: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceId: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserId: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }> $customProperties
     */
    public static function with(
        string $id,
        int $attendees,
        int $cancellations,
        \DateTimeInterface $createdAt,
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalEventId,
        int $noShows,
        int $registrants,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventUrl = null,
        ?string $objectId = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['attendees'] = $attendees;
        $obj['cancellations'] = $cancellations;
        $obj['createdAt'] = $createdAt;
        $obj['customProperties'] = $customProperties;
        $obj['eventName'] = $eventName;
        $obj['eventOrganizer'] = $eventOrganizer;
        $obj['externalEventId'] = $externalEventId;
        $obj['noShows'] = $noShows;
        $obj['registrants'] = $registrants;
        $obj['updatedAt'] = $updatedAt;

        null !== $endDateTime && $obj['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $obj['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $obj['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $obj['eventDescription'] = $eventDescription;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $eventUrl && $obj['eventUrl'] = $eventUrl;
        null !== $objectId && $obj['objectId'] = $objectId;
        null !== $startDateTime && $obj['startDateTime'] = $startDateTime;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that attended this marketing event.
     */
    public function withAttendees(int $attendees): self
    {
        $obj = clone $this;
        $obj['attendees'] = $attendees;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but later cancelled their registration.
     */
    public function withCancellations(int $cancellations): self
    {
        $obj = clone $this;
        $obj['cancellations'] = $cancellations;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @param list<PropertyValue|array{
     *   dataSensitivity: value-of<DataSensitivity>,
     *   isEncrypted: bool,
     *   isLargeValue: bool,
     *   name: string,
     *   persistenceTimestamp: int,
     *   requestId: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceId: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserId: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }> $customProperties
     */
    public function withCustomProperties(array $customProperties): self
    {
        $obj = clone $this;
        $obj['customProperties'] = $customProperties;

        return $obj;
    }

    /**
     * The name of the marketing event.
     */
    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj['eventName'] = $eventName;

        return $obj;
    }

    /**
     * The name of the organizer of the marketing event.
     */
    public function withEventOrganizer(string $eventOrganizer): self
    {
        $obj = clone $this;
        $obj['eventOrganizer'] = $eventOrganizer;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventId'] = $externalEventID;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event, but did not attend. This field only had a value when the event is over.
     */
    public function withNoShows(int $noShows): self
    {
        $obj = clone $this;
        $obj['noShows'] = $noShows;

        return $obj;
    }

    /**
     * The number of HubSpot contacts that registered for this marketing event.
     */
    public function withRegistrants(int $registrants): self
    {
        $obj = clone $this;
        $obj['registrants'] = $registrants;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The end date and time of the marketing event.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $obj = clone $this;
        $obj['endDateTime'] = $endDateTime;

        return $obj;
    }

    /**
     * Indicates if the marketing event has been cancelled.
     */
    public function withEventCancelled(bool $eventCancelled): self
    {
        $obj = clone $this;
        $obj['eventCancelled'] = $eventCancelled;

        return $obj;
    }

    public function withEventCompleted(bool $eventCompleted): self
    {
        $obj = clone $this;
        $obj['eventCompleted'] = $eventCompleted;

        return $obj;
    }

    /**
     * The description of the marketing event.
     */
    public function withEventDescription(string $eventDescription): self
    {
        $obj = clone $this;
        $obj['eventDescription'] = $eventDescription;

        return $obj;
    }

    /**
     * The type of the marketing event.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    public function withEventURL(string $eventURL): self
    {
        $obj = clone $this;
        $obj['eventUrl'] = $eventURL;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * The start date and time of the marketing event.
     */
    public function withStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $obj = clone $this;
        $obj['startDateTime'] = $startDateTime;

        return $obj;
    }
}
