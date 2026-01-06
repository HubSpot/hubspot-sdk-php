<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\EventsRawContract;

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
     * Create an event containing the viewers attention span details for the media.
     *
     * @param array{
     *   mediaType: 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|MediaType,
     *   occurredTimestamp: int,
     *   rawDataMap: array<string,int>,
     *   sessionID: string,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   derivedValues?: array{totalPercentPlayed: float, totalSecondsPlayed: int},
     *   externalID?: string,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     *   rawDataString?: string,
     * }|EventCreateAttentionSpanEventParams $params
     *
     * @return BaseResponse<AttentionSpanEvent>
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        array|EventCreateAttentionSpanEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreateAttentionSpanEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   mediaType: 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|EventCreateMediaPlayedEventParams\MediaType,
     *   occurredTimestamp: int,
     *   sessionID: string,
     *   state: 'STARTED'|'VIEWED'|State,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   externalID?: string,
     *   iframeURL?: string,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     * }|EventCreateMediaPlayedEventParams $params
     *
     * @return BaseResponse<MediaPlayedEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        array|EventCreateMediaPlayedEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreateMediaPlayedEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   mediaType: 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|EventCreateMediaPlayedPercentEventParams\MediaType,
     *   occurredTimestamp: int,
     *   playedPercent: int,
     *   sessionID: string,
     *   _hsenc?: string,
     *   contactID?: int,
     *   contactUtk?: string,
     *   externalID?: string,
     *   mediaBridgeID?: int,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   pageID?: int,
     *   pageName?: string,
     *   pageURL?: string,
     * }|EventCreateMediaPlayedPercentEventParams $params
     *
     * @return BaseResponse<MediaPlayedPercentageEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        array|EventCreateMediaPlayedPercentEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreateMediaPlayedPercentEventParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'media-bridge/v1/events/media-played-percent',
            body: (object) $parsed,
            options: $options,
            convert: MediaPlayedPercentageEvent::class,
        );
    }
}
