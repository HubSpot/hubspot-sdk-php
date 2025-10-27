<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface EventsContract
{
    /**
     * @api
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
    ): AttentionSpanEvent;

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
    ): AttentionSpanEvent;

    /**
     * @api
     *
     * @param \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType> $mediaType
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
    ): MediaPlayedEvent;

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
    ): MediaPlayedEvent;

    /**
     * @api
     *
     * @param \HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType|value-of<\HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType> $mediaType
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
    ): MediaPlayedPercentageEvent;

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
    ): MediaPlayedPercentageEvent;
}
