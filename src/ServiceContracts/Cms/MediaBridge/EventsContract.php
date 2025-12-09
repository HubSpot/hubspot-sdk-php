<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface EventsContract
{
    /**
     * @api
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
    ): AttentionSpanEvent;

    /**
     * @api
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
    ): MediaPlayedEvent;

    /**
     * @api
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
    ): MediaPlayedPercentageEvent;
}
