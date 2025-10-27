<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\EventsContract;

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
     * Create an event containing the viewers attention span details for the media.
     *
     * @param MediaType|value-of<MediaType> $mediaType
     * @param int $occurredTimestamp
     * @param array<string, int> $rawDataMap
     * @param string $sessionID
     * @param string $_hsenc
     * @param int $contactID
     * @param string $contactUtk
     * @param AttentionSpanCalculatedValues $derivedValues
     * @param string $externalID
     * @param int $mediaBridgeID
     * @param string $mediaName
     * @param string $mediaURL
     * @param int $pageID
     * @param string $pageName
     * @param string $pageURL
     * @param string $rawDataString
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        $mediaType,
        $occurredTimestamp,
        $rawDataMap,
        $sessionID,
        $_hsenc = omit,
        $contactID = omit,
        $contactUtk = omit,
        $derivedValues = omit,
        $externalID = omit,
        $mediaBridgeID = omit,
        $mediaName = omit,
        $mediaURL = omit,
        $pageID = omit,
        $pageName = omit,
        $pageURL = omit,
        $rawDataString = omit,
        ?RequestOptions $requestOptions = null,
    ): AttentionSpanEvent {
        $params = [
            'mediaType' => $mediaType,
            'occurredTimestamp' => $occurredTimestamp,
            'rawDataMap' => $rawDataMap,
            'sessionID' => $sessionID,
            '_hsenc' => $_hsenc,
            'contactID' => $contactID,
            'contactUtk' => $contactUtk,
            'derivedValues' => $derivedValues,
            'externalID' => $externalID,
            'mediaBridgeID' => $mediaBridgeID,
            'mediaName' => $mediaName,
            'mediaURL' => $mediaURL,
            'pageID' => $pageID,
            'pageName' => $pageName,
            'pageURL' => $pageURL,
            'rawDataString' => $rawDataString,
        ];

        return $this->createAttentionSpanEventRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createAttentionSpanEventRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AttentionSpanEvent {
        [$parsed, $options] = EventCreateAttentionSpanEventParams::parseRequest(
            $params,
            $requestOptions
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
     * @param EventCreateMediaPlayedEventParams\MediaType|value-of<EventCreateMediaPlayedEventParams\MediaType> $mediaType
     * @param int $occurredTimestamp
     * @param string $sessionID
     * @param State|value-of<State> $state
     * @param string $_hsenc
     * @param int $contactID
     * @param string $contactUtk
     * @param string $externalID
     * @param string $iframeURL
     * @param int $mediaBridgeID
     * @param string $mediaName
     * @param string $mediaURL
     * @param int $pageID
     * @param string $pageName
     * @param string $pageURL
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        $mediaType,
        $occurredTimestamp,
        $sessionID,
        $state,
        $_hsenc = omit,
        $contactID = omit,
        $contactUtk = omit,
        $externalID = omit,
        $iframeURL = omit,
        $mediaBridgeID = omit,
        $mediaName = omit,
        $mediaURL = omit,
        $pageID = omit,
        $pageName = omit,
        $pageURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaPlayedEvent {
        $params = [
            'mediaType' => $mediaType,
            'occurredTimestamp' => $occurredTimestamp,
            'sessionID' => $sessionID,
            'state' => $state,
            '_hsenc' => $_hsenc,
            'contactID' => $contactID,
            'contactUtk' => $contactUtk,
            'externalID' => $externalID,
            'iframeURL' => $iframeURL,
            'mediaBridgeID' => $mediaBridgeID,
            'mediaName' => $mediaName,
            'mediaURL' => $mediaURL,
            'pageID' => $pageID,
            'pageName' => $pageName,
            'pageURL' => $pageURL,
        ];

        return $this->createMediaPlayedEventRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createMediaPlayedEventRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaPlayedEvent {
        [$parsed, $options] = EventCreateMediaPlayedEventParams::parseRequest(
            $params,
            $requestOptions
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
     * @param EventCreateMediaPlayedPercentEventParams\MediaType|value-of<EventCreateMediaPlayedPercentEventParams\MediaType> $mediaType
     * @param int $occurredTimestamp
     * @param int $playedPercent
     * @param string $sessionID
     * @param string $_hsenc
     * @param int $contactID
     * @param string $contactUtk
     * @param string $externalID
     * @param int $mediaBridgeID
     * @param string $mediaName
     * @param string $mediaURL
     * @param int $pageID
     * @param string $pageName
     * @param string $pageURL
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        $mediaType,
        $occurredTimestamp,
        $playedPercent,
        $sessionID,
        $_hsenc = omit,
        $contactID = omit,
        $contactUtk = omit,
        $externalID = omit,
        $mediaBridgeID = omit,
        $mediaName = omit,
        $mediaURL = omit,
        $pageID = omit,
        $pageName = omit,
        $pageURL = omit,
        ?RequestOptions $requestOptions = null,
    ): MediaPlayedPercentageEvent {
        $params = [
            'mediaType' => $mediaType,
            'occurredTimestamp' => $occurredTimestamp,
            'playedPercent' => $playedPercent,
            'sessionID' => $sessionID,
            '_hsenc' => $_hsenc,
            'contactID' => $contactID,
            'contactUtk' => $contactUtk,
            'externalID' => $externalID,
            'mediaBridgeID' => $mediaBridgeID,
            'mediaName' => $mediaName,
            'mediaURL' => $mediaURL,
            'pageID' => $pageID,
            'pageName' => $pageName,
            'pageURL' => $pageURL,
        ];

        return $this->createMediaPlayedPercentEventRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEventRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MediaPlayedPercentageEvent {
        [
            $parsed, $options,
        ] = EventCreateMediaPlayedPercentEventParams::parseRequest(
            $params,
            $requestOptions
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
