<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\Events\EventBatchCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventGetDetailParams;
use HubspotSDK\Crm\Timeline\Events\EventGetParams;
use HubspotSDK\Crm\Timeline\TimelineEvent;
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\EventsContract;

use const HubspotSDK\Core\OMIT as omit;

final class EventsService implements EventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a single instance of event data to a specified event type.
     *
     * @param string $eventTemplateID the event template ID
     * @param array<string,
     * string,> $tokens A collection of token keys and values associated with the template tokens
     * @param string $id Identifier for the event. This is optional, and we recommend you do not pass this in. We will create one for you if you omit this. You can also use `{{uuid}}` anywhere in the ID to generate a unique string, guaranteeing uniqueness.
     * @param string $domain the event domain (often paired with utk)
     * @param string $email The email address used for contact-specific events. This can be used to identify existing contacts, create new ones, or change the email for an existing contact (if paired with the `objectId`).
     * @param mixed $extraData additional event-specific data that can be interpreted by the template's markdown
     * @param string $objectID The CRM object identifier. This is required for every event other than contacts (where utk or email can be used).
     * @param TimelineEventIFrame $timelineIFrame
     * @param \DateTimeInterface $timestamp The time the event occurred. If not passed in, the curren time will be assumed. This is used to determine where an event is shown on a CRM object's timeline.
     * @param string $utk Use the `utk` parameter to associate an event with a contact by `usertoken`. This is recommended if you don't know a user's email, but have an identifying user token in your cookie.
     *
     * @throws APIException
     */
    public function create(
        $eventTemplateID,
        $tokens,
        $id = omit,
        $domain = omit,
        $email = omit,
        $extraData = omit,
        $objectID = omit,
        $timelineIFrame = omit,
        $timestamp = omit,
        $utk = omit,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse {
        $params = [
            'eventTemplateID' => $eventTemplateID,
            'tokens' => $tokens,
            'id' => $id,
            'domain' => $domain,
            'email' => $email,
            'extraData' => $extraData,
            'objectID' => $objectID,
            'timelineIFrame' => $timelineIFrame,
            'timestamp' => $timestamp,
            'utk' => $utk,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse {
        [$parsed, $options] = EventCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'integrators/timeline/v3/events',
            body: (object) $parsed,
            options: $options,
            convert: TimelineEventResponse::class,
        );
    }

    /**
     * @api
     *
     * Batch create multiple instances of timeline events based on an event template. Once created, these event are immutable on the object timeline and cannot be modified. If the event template was configured to update object properties via `objectPropertyName`, this call will also attempt to updates those properties, or add them if they don't exist.
     *
     * @param list<TimelineEvent> $inputs a collection of timeline events we want to create
     *
     * @throws APIException
     */
    public function batchCreate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->batchCreateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EventBatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'integrators/timeline/v3/events/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve an event instance, specified by template ID and event ID.
     *
     * @param string $eventTemplateID
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        $eventTemplateID,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse {
        $params = ['eventTemplateID' => $eventTemplateID];

        return $this->getRaw($eventID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse {
        [$parsed, $options] = EventGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'integrators/timeline/v3/events/%1$s/%2$s', $eventTemplateID, $eventID,
            ],
            options: $options,
            convert: TimelineEventResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details for a specific event, specified by template ID and event ID.
     *
     * @param string $eventTemplateID
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        $eventTemplateID,
        ?RequestOptions $requestOptions = null
    ): EventDetail {
        $params = ['eventTemplateID' => $eventTemplateID];

        return $this->getDetailRaw($eventID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getDetailRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): EventDetail {
        [$parsed, $options] = EventGetDetailParams::parseRequest(
            $params,
            $requestOptions
        );
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'integrators/timeline/v3/events/%1$s/%2$s/detail',
                $eventTemplateID,
                $eventID,
            ],
            options: $options,
            convert: EventDetail::class,
        );
    }
}
