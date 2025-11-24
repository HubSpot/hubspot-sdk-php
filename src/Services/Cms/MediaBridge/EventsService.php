<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\EventsContract;

final class EventsService implements EventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an event containing the viewers attention span details for the media.
     *
     * @param array{
     *   mediaType: "AUDIO"|"DOCUMENT"|"IMAGE"|"OTHER"|"VIDEO",
     *   occurredTimestamp: int,
     *   rawDataMap: array<string,int>,
     *   sessionId: string,
     *   _hsenc?: string,
     *   contactId?: int,
     *   contactUtk?: string,
     *   derivedValues?: array{totalPercentPlayed: float, totalSecondsPlayed: int},
     *   externalId?: string,
     *   mediaBridgeId?: int,
     *   mediaName?: string,
     *   mediaUrl?: string,
     *   pageId?: int,
     *   pageName?: string,
     *   pageUrl?: string,
     *   rawDataString?: string,
     * }|EventCreateAttentionSpanEventParams $params
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        array|EventCreateAttentionSpanEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): AttentionSpanEvent {
        [$parsed, $options] = EventCreateAttentionSpanEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/v1/events/attention-span',
            body: (object) $parsed,
            options: $options,
            convert: AttentionSpanEvent::class,
        );
    }

    /**
     * @api
     *
     * Create an event for when a user begins playing a piece of media.
     *
     * @param array{
     *   mediaType: "AUDIO"|"DOCUMENT"|"IMAGE"|"OTHER"|"VIDEO",
     *   occurredTimestamp: int,
     *   sessionId: string,
     *   state: "STARTED"|"VIEWED",
     *   _hsenc?: string,
     *   contactId?: int,
     *   contactUtk?: string,
     *   externalId?: string,
     *   iframeUrl?: string,
     *   mediaBridgeId?: int,
     *   mediaName?: string,
     *   mediaUrl?: string,
     *   pageId?: int,
     *   pageName?: string,
     *   pageUrl?: string,
     * }|EventCreateMediaPlayedEventParams $params
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        array|EventCreateMediaPlayedEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaPlayedEvent {
        [$parsed, $options] = EventCreateMediaPlayedEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/v1/events/media-played',
            body: (object) $parsed,
            options: $options,
            convert: MediaPlayedEvent::class,
        );
    }

    /**
     * @api
     *
     * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
     *
     * @param array{
     *   mediaType: "AUDIO"|"DOCUMENT"|"IMAGE"|"OTHER"|"VIDEO",
     *   occurredTimestamp: int,
     *   playedPercent: int,
     *   sessionId: string,
     *   _hsenc?: string,
     *   contactId?: int,
     *   contactUtk?: string,
     *   externalId?: string,
     *   mediaBridgeId?: int,
     *   mediaName?: string,
     *   mediaUrl?: string,
     *   pageId?: int,
     *   pageName?: string,
     *   pageUrl?: string,
     * }|EventCreateMediaPlayedPercentEventParams $params
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        array|EventCreateMediaPlayedPercentEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): MediaPlayedPercentageEvent {
        [$parsed, $options] = EventCreateMediaPlayedPercentEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/v1/events/media-played-percent',
            body: (object) $parsed,
            options: $options,
            convert: MediaPlayedPercentageEvent::class,
        );
    }
}
