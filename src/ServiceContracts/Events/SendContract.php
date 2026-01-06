<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface SendContract
{
    /**
     * @api
     *
     * @param string $eventName The internal name of the event (`pe<portalID>_eventName`). Can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     * @param array<string,string> $properties The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     * @param string $email The visitor's email address. Used for associating the event data with a CRM record.
     * @param string $objectID The ID of the object that completed the event (e.g., contact ID or visitor ID).
     * @param string|\DateTimeInterface $occurredAt The time when this event occurred. If this isn't set, the current time will be used.
     * @param string $utk The visitor's usertoken. Used for associating the event data with a CRM record.
     * @param string $uuid Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     *
     * @throws APIException
     */
    public function send(
        string $eventName,
        array $properties,
        ?string $email = null,
        ?string $objectID = null,
        string|\DateTimeInterface|null $occurredAt = null,
        ?string $utk = null,
        ?string $uuid = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<array{
     *   eventName: string,
     *   properties: array<string,string>,
     *   email?: string,
     *   objectID?: string,
     *   occurredAt?: string|\DateTimeInterface,
     *   utk?: string,
     *   uuid?: string,
     * }> $inputs
     *
     * @throws APIException
     */
    public function sendBatch(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
