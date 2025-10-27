<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updates the details of an existing Marketing Event identified by its externalAccountId, externalEventId if it exists.
 *
 * Only Marketing Events created by the same app can be updated.
 *
 * @see HubspotSDK\Marketing\Events->updateByExternalEventID
 *
 * @phpstan-type event_update_by_external_event_id_params = array{
 *   externalAccountID: string,
 *   customProperties?: list<PropertyValue>,
 *   endDateTime?: \DateTimeInterface,
 *   eventCancelled?: bool,
 *   eventCompleted?: bool,
 *   eventDescription?: string,
 *   eventName?: string,
 *   eventOrganizer?: string,
 *   eventType?: string,
 *   eventURL?: string,
 *   startDateTime?: \DateTimeInterface,
 * }
 */
final class EventUpdateByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<event_update_by_external_event_id_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    #[Api]
    public string $externalAccountID;

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
     * Indicates if the marketing event has been cancelled. Defaults to `false`.
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
     * The name of the marketing event.
     */
    #[Api(optional: true)]
    public ?string $eventName;

    /**
     * The name of the organizer of the marketing event.
     */
    #[Api(optional: true)]
    public ?string $eventOrganizer;

    /**
     * Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`.
     */
    #[Api(optional: true)]
    public ?string $eventType;

    /**
     * A URL in the external event application where the marketing event can be managed.
     */
    #[Api('eventUrl', optional: true)]
    public ?string $eventURL;

    /**
     * The start date and time of the marketing event.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $startDateTime;

    /**
     * `new EventUpdateByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventUpdateByExternalEventIDParams::with(externalAccountID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventUpdateByExternalEventIDParams)->withExternalAccountID(...)
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
        string $externalAccountID,
        ?array $customProperties = null,
        ?\DateTimeInterface $endDateTime = null,
        ?bool $eventCancelled = null,
        ?bool $eventCompleted = null,
        ?string $eventDescription = null,
        ?string $eventName = null,
        ?string $eventOrganizer = null,
        ?string $eventType = null,
        ?string $eventURL = null,
        ?\DateTimeInterface $startDateTime = null,
    ): self {
        $obj = new self;

        $obj->externalAccountID = $externalAccountID;

        null !== $customProperties && $obj->customProperties = $customProperties;
        null !== $endDateTime && $obj->endDateTime = $endDateTime;
        null !== $eventCancelled && $obj->eventCancelled = $eventCancelled;
        null !== $eventCompleted && $obj->eventCompleted = $eventCompleted;
        null !== $eventDescription && $obj->eventDescription = $eventDescription;
        null !== $eventName && $obj->eventName = $eventName;
        null !== $eventOrganizer && $obj->eventOrganizer = $eventOrganizer;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $eventURL && $obj->eventURL = $eventURL;
        null !== $startDateTime && $obj->startDateTime = $startDateTime;

        return $obj;
    }

    /**
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $obj = clone $this;
        $obj->externalAccountID = $externalAccountID;

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
     * Indicates if the marketing event has been cancelled. Defaults to `false`.
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
     * Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`.
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
