<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Send\BehavioralEventHTTPCompletionRequest;
use HubspotSDK\Events\Send\SendSendBatchParams;
use HubspotSDK\Events\Send\SendSendParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Events\SendContract;

use const HubspotSDK\Core\OMIT as omit;

final class SendService implements SendContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send data for a single event completion.
     *
     * @param string $eventName The internal name of the event (`pe<portalID>_eventName`). Can be retrieved through the [event definitions API](https://developers.hubspot.com/docs/reference/api/analytics-and-events/custom-events/custom-event-definitions#get-%2Fevents%2Fv3%2Fevent-definitions) or in [HubSpot's UI](https://knowledge.hubspot.com/reports/create-custom-behavioral-events-with-the-code-wizard#find-internal-name).
     * @param string $email The visitor's email address. Used for associating the event data with a CRM record.
     * @param string $objectID The ID of the object that completed the event (e.g., contact ID or visitor ID).
     * @param \DateTimeInterface $occurredAt The time when this event occurred. If this isn't set, the current time will be used.
     * @param array<string,
     * string,> $properties The event properties to update. Takes the format of key-value pairs (property internal name and property value). Learn more about [HubSpot's default event properties](https://developers.hubspot.com/docs/guides/api/analytics-and-events/custom-events/custom-event-definitions#hubspot-s-default-event-properties).
     * @param string $utk The visitor's usertoken. Used for associating the event data with a CRM record.
     * @param string $uuid Include a universally unique identifier to assign a unique ID to the event completion. Can be useful for matching data between HubSpot and other external systems.
     *
     * @throws APIException
     */
    public function send(
        $eventName,
        $email = omit,
        $objectID = omit,
        $occurredAt = omit,
        $properties = omit,
        $utk = omit,
        $uuid = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'eventName' => $eventName,
            'email' => $email,
            'objectID' => $objectID,
            'occurredAt' => $occurredAt,
            'properties' => $properties,
            'utk' => $utk,
            'uuid' => $uuid,
        ];

        return $this->sendRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SendSendParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'events/v3/send',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Send multiple event completions at once.
     *
     * @param list<BehavioralEventHTTPCompletionRequest> $inputs
     *
     * @throws APIException
     */
    public function sendBatch(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->sendBatchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendBatchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = SendSendBatchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'events/v3/send/batch',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
