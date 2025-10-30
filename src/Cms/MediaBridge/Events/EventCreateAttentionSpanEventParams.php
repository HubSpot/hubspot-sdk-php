<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Events;

use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create an event containing the viewers attention span details for the media.
 *
 * @see HubspotSDK\Cms\MediaBridge\Events->createAttentionSpanEvent
 *
 * @phpstan-type EventCreateAttentionSpanEventParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   rawDataMap: array<string, int>,
 *   sessionID: string,
 *   _hsenc?: string,
 *   contactID?: int,
 *   contactUtk?: string,
 *   derivedValues?: AttentionSpanCalculatedValues,
 *   externalID?: string,
 *   mediaBridgeID?: int,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   pageID?: int,
 *   pageName?: string,
 *   pageURL?: string,
 *   rawDataString?: string,
 * }
 */
final class EventCreateAttentionSpanEventParams implements BaseModel
{
    /** @use SdkModel<EventCreateAttentionSpanEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Api(enum: MediaType::class)]
    public string $mediaType;

    #[Api]
    public int $occurredTimestamp;

    /** @var array<string, int> $rawDataMap */
    #[Api(map: 'int')]
    public array $rawDataMap;

    #[Api('sessionId')]
    public string $sessionID;

    #[Api(optional: true)]
    public ?string $_hsenc;

    #[Api('contactId', optional: true)]
    public ?int $contactID;

    #[Api(optional: true)]
    public ?string $contactUtk;

    #[Api(optional: true)]
    public ?AttentionSpanCalculatedValues $derivedValues;

    #[Api('externalId', optional: true)]
    public ?string $externalID;

    #[Api('mediaBridgeId', optional: true)]
    public ?int $mediaBridgeID;

    #[Api(optional: true)]
    public ?string $mediaName;

    #[Api('mediaUrl', optional: true)]
    public ?string $mediaURL;

    #[Api('pageId', optional: true)]
    public ?int $pageID;

    #[Api(optional: true)]
    public ?string $pageName;

    #[Api('pageUrl', optional: true)]
    public ?string $pageURL;

    #[Api(optional: true)]
    public ?string $rawDataString;

    /**
     * `new EventCreateAttentionSpanEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateAttentionSpanEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., rawDataMap: ..., sessionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreateAttentionSpanEventParams)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withRawDataMap(...)
     *   ->withSessionID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MediaType|value-of<MediaType> $mediaType
     * @param array<string, int> $rawDataMap
     */
    public static function with(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?AttentionSpanCalculatedValues $derivedValues = null,
        ?string $externalID = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
    ): self {
        $obj = new self;

        $obj['mediaType'] = $mediaType;
        $obj->occurredTimestamp = $occurredTimestamp;
        $obj->rawDataMap = $rawDataMap;
        $obj->sessionID = $sessionID;

        null !== $_hsenc && $obj->_hsenc = $_hsenc;
        null !== $contactID && $obj->contactID = $contactID;
        null !== $contactUtk && $obj->contactUtk = $contactUtk;
        null !== $derivedValues && $obj->derivedValues = $derivedValues;
        null !== $externalID && $obj->externalID = $externalID;
        null !== $mediaBridgeID && $obj->mediaBridgeID = $mediaBridgeID;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $pageID && $obj->pageID = $pageID;
        null !== $pageName && $obj->pageName = $pageName;
        null !== $pageURL && $obj->pageURL = $pageURL;
        null !== $rawDataString && $obj->rawDataString = $rawDataString;

        return $obj;
    }

    /**
     * @param MediaType|value-of<MediaType> $mediaType
     */
    public function withMediaType(MediaType|string $mediaType): self
    {
        $obj = clone $this;
        $obj['mediaType'] = $mediaType;

        return $obj;
    }

    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $obj = clone $this;
        $obj->occurredTimestamp = $occurredTimestamp;

        return $obj;
    }

    /**
     * @param array<string, int> $rawDataMap
     */
    public function withRawDataMap(array $rawDataMap): self
    {
        $obj = clone $this;
        $obj->rawDataMap = $rawDataMap;

        return $obj;
    }

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

        return $obj;
    }

    public function withHsenc(string $_hsenc): self
    {
        $obj = clone $this;
        $obj->_hsenc = $_hsenc;

        return $obj;
    }

    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj->contactID = $contactID;

        return $obj;
    }

    public function withContactUtk(string $contactUtk): self
    {
        $obj = clone $this;
        $obj->contactUtk = $contactUtk;

        return $obj;
    }

    public function withDerivedValues(
        AttentionSpanCalculatedValues $derivedValues
    ): self {
        $obj = clone $this;
        $obj->derivedValues = $derivedValues;

        return $obj;
    }

    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj->externalID = $externalID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj->mediaBridgeID = $mediaBridgeID;

        return $obj;
    }

    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

        return $obj;
    }

    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj->pageID = $pageID;

        return $obj;
    }

    public function withPageName(string $pageName): self
    {
        $obj = clone $this;
        $obj->pageName = $pageName;

        return $obj;
    }

    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj->pageURL = $pageURL;

        return $obj;
    }

    public function withRawDataString(string $rawDataString): self
    {
        $obj = clone $this;
        $obj->rawDataString = $rawDataString;

        return $obj;
    }
}
