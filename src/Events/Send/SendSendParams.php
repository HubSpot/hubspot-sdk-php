<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Api;
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
 *   objectId?: string,
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
    #[Api]
    public string $eventName;

    /**
     * The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     *
     * @var array<string,string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /**
     * The visitor's email address. Used for associating the event data with a CRM record.
     */
    #[Api(optional: true)]
    public ?string $email;

    /**
     * The ID of the object that completed the event (e.g., contact ID or visitor ID).
     */
    #[Api(optional: true)]
    public ?string $objectId;

    /**
     * The time when this event occurred. If this isn't set, the current time will be used.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurredAt;

    /**
     * The visitor's usertoken. Used for associating the event data with a CRM record.
     */
    #[Api(optional: true)]
    public ?string $utk;

    /**
     * Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     */
    #[Api(optional: true)]
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
        ?string $objectId = null,
        ?\DateTimeInterface $occurredAt = null,
        ?string $utk = null,
        ?string $uuid = null,
    ): self {
        $obj = new self;

        $obj['eventName'] = $eventName;
        $obj['properties'] = $properties;

        null !== $email && $obj['email'] = $email;
        null !== $objectId && $obj['objectId'] = $objectId;
        null !== $occurredAt && $obj['occurredAt'] = $occurredAt;
        null !== $utk && $obj['utk'] = $utk;
        null !== $uuid && $obj['uuid'] = $uuid;

        return $obj;
    }

    /**
     * The internal name of the event (`pe<portalID>_eventName`). Can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     */
    public function withEventName(string $eventName): self
    {
        $obj = clone $this;
        $obj['eventName'] = $eventName;

        return $obj;
    }

    /**
     * The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The visitor's email address. Used for associating the event data with a CRM record.
     */
    public function withEmail(string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * The ID of the object that completed the event (e.g., contact ID or visitor ID).
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * The time when this event occurred. If this isn't set, the current time will be used.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj['occurredAt'] = $occurredAt;

        return $obj;
    }

    /**
     * The visitor's usertoken. Used for associating the event data with a CRM record.
     */
    public function withUtk(string $utk): self
    {
        $obj = clone $this;
        $obj['utk'] = $utk;

        return $obj;
    }

    /**
     * Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     */
    public function withUuid(string $uuid): self
    {
        $obj = clone $this;
        $obj['uuid'] = $uuid;

        return $obj;
    }
}
