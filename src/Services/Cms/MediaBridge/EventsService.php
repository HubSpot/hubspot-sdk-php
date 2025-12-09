<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\EventsContract;

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
     * @param 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|MediaType $mediaType
     * @param array<string,int> $rawDataMap
     * @param array{totalPercentPlayed: float, totalSecondsPlayed: int} $derivedValues
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        string|MediaType $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?array $derivedValues = null,
        ?string $externalID = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createAttentionSpanEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event for when a user begins playing a piece of media.
     *
     * @param 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType $mediaType
     * @param 'STARTED'|'VIEWED'|State $state
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        string|\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType $mediaType,
        int $occurredTimestamp,
        string $sessionID,
        string|State $state,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
     *
     * @param 'AUDIO'|'DOCUMENT'|'IMAGE'|'OTHER'|'VIDEO'|\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType $mediaType
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        string|\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType $mediaType,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createMediaPlayedPercentEvent(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
