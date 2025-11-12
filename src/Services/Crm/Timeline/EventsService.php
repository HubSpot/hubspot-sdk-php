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
use HubspotSDK\Crm\Timeline\TimelineEventIFrame;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Timeline\EventsContract;

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
     * @param array{
     *   eventTemplateId: string,
     *   tokens: array<string,string>,
     *   id?: string,
     *   domain?: string,
     *   email?: string,
     *   extraData?: mixed,
     *   objectId?: string,
     *   timelineIFrame?: array{
     *     headerLabel: string, height: int, linkLabel: string, url: string, width: int
     *   }|TimelineEventIFrame,
     *   timestamp?: string|\DateTimeInterface,
     *   utk?: string,
     * }|EventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse {
        [$parsed, $options] = EventCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   inputs: list<array{
     *     eventTemplateId: string,
     *     tokens: array<string,string>,
     *     id?: string,
     *     domain?: string,
     *     email?: string,
     *     extraData?: mixed,
     *     objectId?: string,
     *     timelineIFrame?: array<mixed>|TimelineEventIFrame,
     *     timestamp?: string|\DateTimeInterface,
     *     utk?: string,
     *   }>,
     * }|EventBatchCreateParams $params
     *
     * @throws APIException
     */
    public function batchCreate(
        array|EventBatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = EventBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{eventTemplateId: string}|EventGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        array|EventGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse {
        [$parsed, $options] = EventGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventTemplateID = $parsed['eventTemplateId'];
        unset($parsed['eventTemplateId']);

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
     * @param array{eventTemplateId: string}|EventGetDetailParams $params
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        array|EventGetDetailParams $params,
        ?RequestOptions $requestOptions = null,
    ): EventDetail {
        [$parsed, $options] = EventGetDetailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventTemplateID = $parsed['eventTemplateId'];
        unset($parsed['eventTemplateId']);

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
