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
 *   rawDataMap: array<string,int>,
 *   sessionId: string,
 *   _hsenc?: string,
 *   contactId?: int,
 *   contactUtk?: string,
 *   derivedValues?: AttentionSpanCalculatedValues,
 *   externalId?: string,
 *   mediaBridgeId?: int,
 *   mediaName?: string,
 *   mediaUrl?: string,
 *   pageId?: int,
 *   pageName?: string,
 *   pageUrl?: string,
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

    /** @var array<string,int> $rawDataMap */
    #[Api(map: 'int')]
    public array $rawDataMap;

    #[Api]
    public string $sessionId;

    #[Api(optional: true)]
    public ?string $_hsenc;

    #[Api(optional: true)]
    public ?int $contactId;

    #[Api(optional: true)]
    public ?string $contactUtk;

    #[Api(optional: true)]
    public ?AttentionSpanCalculatedValues $derivedValues;

    #[Api(optional: true)]
    public ?string $externalId;

    #[Api(optional: true)]
    public ?int $mediaBridgeId;

    #[Api(optional: true)]
    public ?string $mediaName;

    #[Api(optional: true)]
    public ?string $mediaUrl;

    #[Api(optional: true)]
    public ?int $pageId;

    #[Api(optional: true)]
    public ?string $pageName;

    #[Api(optional: true)]
    public ?string $pageUrl;

    #[Api(optional: true)]
    public ?string $rawDataString;

    /**
     * `new EventCreateAttentionSpanEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateAttentionSpanEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., rawDataMap: ..., sessionId: ...
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
     * @param array<string,int> $rawDataMap
     */
    public static function with(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionId,
        ?string $_hsenc = null,
        ?int $contactId = null,
        ?string $contactUtk = null,
        ?AttentionSpanCalculatedValues $derivedValues = null,
        ?string $externalId = null,
        ?int $mediaBridgeId = null,
        ?string $mediaName = null,
        ?string $mediaUrl = null,
        ?int $pageId = null,
        ?string $pageName = null,
        ?string $pageUrl = null,
        ?string $rawDataString = null,
    ): self {
        $obj = new self;

        $obj['mediaType'] = $mediaType;
        $obj->occurredTimestamp = $occurredTimestamp;
        $obj->rawDataMap = $rawDataMap;
        $obj->sessionId = $sessionId;

        null !== $_hsenc && $obj->_hsenc = $_hsenc;
        null !== $contactId && $obj->contactId = $contactId;
        null !== $contactUtk && $obj->contactUtk = $contactUtk;
        null !== $derivedValues && $obj->derivedValues = $derivedValues;
        null !== $externalId && $obj->externalId = $externalId;
        null !== $mediaBridgeId && $obj->mediaBridgeId = $mediaBridgeId;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaUrl && $obj->mediaUrl = $mediaUrl;
        null !== $pageId && $obj->pageId = $pageId;
        null !== $pageName && $obj->pageName = $pageName;
        null !== $pageUrl && $obj->pageUrl = $pageUrl;
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
     * @param array<string,int> $rawDataMap
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
        $obj->sessionId = $sessionID;

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
        $obj->contactId = $contactID;

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
        $obj->externalId = $externalID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj->mediaBridgeId = $mediaBridgeID;

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
        $obj->mediaUrl = $mediaURL;

        return $obj;
    }

    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj->pageId = $pageID;

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
        $obj->pageUrl = $pageURL;

        return $obj;
    }

    public function withRawDataString(string $rawDataString): self
    {
        $obj = clone $this;
        $obj->rawDataString = $rawDataString;

        return $obj;
    }
}
