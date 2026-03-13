<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Timeline;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
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
use HubspotSDK\ServiceContracts\Crm\Timeline\EventsRawContract;

/**
 * @phpstan-import-type TimelineEventIFrameShape from \HubspotSDK\Crm\Timeline\TimelineEventIFrame
 * @phpstan-import-type TimelineEventShape from \HubspotSDK\Crm\Timeline\TimelineEvent
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
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
     *   eventTemplateID: string,
     *   tokens: array<string,string>,
     *   id?: string,
     *   domain?: string,
     *   email?: string,
     *   extraData?: mixed,
     *   objectID?: string,
     *   timelineIFrame?: TimelineEventIFrame|TimelineEventIFrameShape,
     *   timestamp?: \DateTimeInterface,
     *   utk?: string,
     * }|EventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   inputs: list<TimelineEvent|TimelineEventShape>
     * }|EventBatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function batchCreate(
        array|EventBatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventID the event ID
     * @param array{eventTemplateID: string}|EventGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventResponse>
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        array|EventGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $eventID the event ID
     * @param array{eventTemplateID: string}|EventGetDetailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetail>
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        array|EventGetDetailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventGetDetailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $eventTemplateID = $parsed['eventTemplateID'];
        unset($parsed['eventTemplateID']);

        // @phpstan-ignore-next-line return.type
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
