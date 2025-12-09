<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Send data for a single event completion.
 *
 * @see HubspotSDK\Services\Events\SendService::send()
 *
 * @phpstan-type SendSendParamsShape = array{
 *   eventName: string,
 *   properties: array<string,string>,
 *   email?: string,
 *   objectID?: string,
 *   occurredAt?: \DateTimeInterface,
 *   utk?: string,
 *   uuid?: string,
 * }
 */
final class SendSendParams implements BaseModel
{
    /** @use SdkModel<SendSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The internal name of the event (`pe<portalID>_eventName`). Can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     */
    #[Required]
    public string $eventName;

    /**
     * The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The visitor's email address. Used for associating the event data with a CRM record.
     */
    #[Optional]
    public ?string $email;

    /**
     * The ID of the object that completed the event (e.g., contact ID or visitor ID).
     */
    #[Optional('objectId')]
    public ?string $objectID;

    /**
     * The time when this event occurred. If this isn't set, the current time will be used.
     */
    #[Optional]
    public ?\DateTimeInterface $occurredAt;

    /**
     * The visitor's usertoken. Used for associating the event data with a CRM record.
     */
    #[Optional]
    public ?string $utk;

    /**
     * Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     */
    #[Optional]
    public ?string $uuid;

    /**
     * `new SendSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SendSendParams::with(eventName: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SendSendParams)->withEventName(...)->withProperties(...)
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
     * The internal name of the event (`pe<portalID>_eventName`). Can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     */
    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
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
     * The visitor's email address. Used for associating the event data with a CRM record.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * The ID of the object that completed the event (e.g., contact ID or visitor ID).
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The time when this event occurred. If this isn't set, the current time will be used.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * The visitor's usertoken. Used for associating the event data with a CRM record.
     */
    public function withUtk(string $utk): self
    {
        $self = clone $this;
        $self['utk'] = $utk;

        return $self;
    }

    /**
     * Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     */
    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
