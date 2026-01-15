<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\EventsContract;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
    }

    /**
     * @api
     *
     * Create an event containing the viewers attention span details for the media.
     *
     * @param MediaType|value-of<MediaType> $mediaType
     * @param array<string,int> $rawDataMap
     * @param AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape $derivedValues
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        AttentionSpanCalculatedValues|array|null $derivedValues = null,
        ?string $externalID = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
        RequestOptions|array|null $requestOptions = null,
    ): AttentionSpanEvent {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAttentionSpanEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event for when a user begins playing a piece of media.
     *
     * @param \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType> $mediaType
     * @param State|value-of<State> $state
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        string $sessionID,
        State|string $state,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        ?string $iframeURL = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaPlayedEvent {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
     *
     * @param \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType> $mediaType
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaPlayedPercentageEvent {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedPercentEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
