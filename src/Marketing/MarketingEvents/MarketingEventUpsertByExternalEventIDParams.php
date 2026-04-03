<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PropertyValue;

/**
 * Upserts a marketing event If there is an existing marketing event with the specified ID, it will be updated; otherwise a new event will be created.
 *
 * @see HubspotSDK\Services\Marketing\MarketingEventsService::upsertByExternalEventID()
 *
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 *
 * @phpstan-type MarketingEventUpsertByExternalEventIDParamsShape = array{
 *   customProperties: list<PropertyValue|PropertyValueShape>,
 *   eventName: string,
 *   eventOrganizer: string,
 *   externalAccountID: string,
 *   externalEventID: string,
 *   endDateTime?: \DateTimeInterface|null,
 *   eventCancelled?: bool|null,
 *   eventCompleted?: bool|null,
 *   eventDescription?: string|null,
 *   eventType?: string|null,
 *   eventURL?: string|null,
 *   startDateTime?: \DateTimeInterface|null,
 * }
 */
final class MarketingEventUpsertByExternalEventIDParams implements BaseModel
{
    /** @use SdkModel<MarketingEventUpsertByExternalEventIDParamsShape> */
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

    /**
     * Indicates if the marketing event has been completed.  Defaults to `false`.
     */
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
     * `new MarketingEventUpsertByExternalEventIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingEventUpsertByExternalEventIDParams::with(
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
     * (new MarketingEventUpsertByExternalEventIDParams)
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
     * @param list<PropertyValue|PropertyValueShape> $customProperties
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
        $self = new self;

        $self['customProperties'] = $customProperties;
        $self['eventName'] = $eventName;
        $self['eventOrganizer'] = $eventOrganizer;
        $self['externalAccountID'] = $externalAccountID;
        $self['externalEventID'] = $externalEventID;

        null !== $endDateTime && $self['endDateTime'] = $endDateTime;
        null !== $eventCancelled && $self['eventCancelled'] = $eventCancelled;
        null !== $eventCompleted && $self['eventCompleted'] = $eventCompleted;
        null !== $eventDescription && $self['eventDescription'] = $eventDescription;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $eventURL && $self['eventURL'] = $eventURL;
        null !== $startDateTime && $self['startDateTime'] = $startDateTime;

        return $self;
    }

    /**
     * A list of PropertyValues. These can be whatever kind of property names and values you want. However, they must already exist on the HubSpot account's definition of the MarketingEvent Object. If they don't they will be filtered out and not set.
     * In order to do this you'll need to create a new PropertyGroup on the HubSpot account's MarketingEvent object for your specific app and create the Custom Property you want to track on that HubSpot account. Do not create any new default properties on the MarketingEvent object as that will apply to all HubSpot accounts.
     *
     * @param list<PropertyValue|PropertyValueShape> $customProperties
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
     * The accountId that is associated with this marketing event in the external event application.
     */
    public function withExternalAccountID(string $externalAccountID): self
    {
        $self = clone $this;
        $self['externalAccountID'] = $externalAccountID;

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
     * The end date and time of the marketing event.
     */
    public function withEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $self = clone $this;
        $self['endDateTime'] = $endDateTime;

        return $self;
    }

    /**
     * Indicates if the marketing event has been cancelled.  Defaults to `false`.
     */
    public function withEventCancelled(bool $eventCancelled): self
    {
        $self = clone $this;
        $self['eventCancelled'] = $eventCancelled;

        return $self;
    }

    /**
     * Indicates if the marketing event has been completed.  Defaults to `false`.
     */
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
     * Describes what type of event this is.  For example: `WEBINAR`, `CONFERENCE`, `WORKSHOP`.
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
