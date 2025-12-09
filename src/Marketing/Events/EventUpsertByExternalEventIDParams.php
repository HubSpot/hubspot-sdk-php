<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\PropertyValue\DataSensitivity;
use HubspotSDK\Marketing\Events\PropertyValue\Source;

/**
 * Upserts a marketing event If there is an existing marketing event with the specified ID, it will be updated; otherwise a new event will be created.
 *
 * @see HubspotSDK\Services\Marketing\EventsService::upsertByExternalEventID()
 *
 * @phpstan-type EventUpsertByExternalEventIDParamsShape = array{
 *   customProperties: list<PropertyValue|array{
 *     dataSensitivity: value-of<DataSensitivity>,
 *     isEncrypted: bool,
 *     isLargeValue: bool,
 *     name: string,
 *     persistenceTimestamp: int,
 *     requestID: string,
 *     selectedByUser: bool,
 *     selectedByUserTimestamp: int,
 *     source: value-of<Source>,
 *     sourceID: string,
 *     sourceLabel: string,
 *     sourceMetadata: string,
 *     sourceUpstreamDeployable: string,
 *     sourceVid: list<int>,
 *     timestamp: int,
 *     unit: string,
 *     updatedByUserID: int,
 *     useTimestampAsPersistenceTimestamp: bool,
 *     value: string,
 *   }>,
 *   eventName: string,
 *   eventOrganizer: string,
 *   externalAccountID: string,
 *   externalEventID: string,
 *   endDateTime?: \DateTimeInterface,
 *   eventCancelled?: bool,
 *   eventCompleted?: bool,
 *   eventDescription?: string,
 *   eventType?: string,
 *   eventURL?: string,
 *   startDateTime?: \DateTimeInterface,
 * }
 */
final class EventUpsertByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<EventUpsertByExternalEventIDParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Required('externalAccountId')]
    public string $externalAccountID;

    /**
     * The id of the marketing event in the external event application.
     */
    #[Required('externalEventId')]
    public string $externalEventID;

    /**
     * The end date and time of the marketing event.
     */
    #[Optional]
    public ?\DateTimeInterface $endDateTime;

    /**
     * Indicates if the marketing event has been cancelled.  Defaults to `false`.
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
     * Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`.
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
     * `new EventUpsertByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpsertByExternalEventIDParams::with(
     *   customProperties: ...,
     *   eventName: ...,
     *   eventOrganizer: ...,
     *   externalAccountID: ...,
     *   externalEventID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpsertByExternalEventIDParams)
     *   ->withCustomProperties(...)
     *   ->withEventName(...)
     *   ->withEventOrganizer(...)
     *   ->withExternalAccountID(...)
     *   ->withExternalEventID(...)
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
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
     *   useTimestampAsPersistenceTimestamp: bool,
     *   value: string,
     * }> $customProperties
     */
    public static function with(
        array $customProperties,
        string $eventName,
        string $eventOrganizer,
        string $externalAccountID,
        string $externalEventID,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj['customProperties'] = $customProperties;
        $obj['eventName'] = $eventName;
        $obj['eventOrganizer'] = $eventOrganizer;
        $obj['externalAccountID'] = $externalAccountID;
        $obj['externalEventID'] = $externalEventID;

        null !== $endDateTime && $obj['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $obj['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $obj['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $obj['eventDescription'] = $eventDescription;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $eventURL && $obj['eventURL'] = $eventURL;
        null !== $startDateTime && $obj['startDateTime'] = $startDateTime;

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
     *   requestID: string,
     *   selectedByUser: bool,
     *   selectedByUserTimestamp: int,
     *   source: value-of<Source>,
     *   sourceID: string,
     *   sourceLabel: string,
     *   sourceMetadata: string,
     *   sourceUpstreamDeployable: string,
     *   sourceVid: list<int>,
     *   timestamp: int,
     *   unit: string,
     *   updatedByUserID: int,
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
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj['externalAccountID'] = $externalAccountID;

        return $obj;
    }

    /**
     * The id of the marketing event in the external event application.
     */
    public function withExternalEventID(string $externalEventID): self
    {
        $obj = clone $this;
        $obj['externalEventID'] = $externalEventID;

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
     * Indicates if the marketing event has been cancelled.  Defaults to `false`.
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
     * Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`.
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
        $obj['eventURL'] = $eventURL;

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
