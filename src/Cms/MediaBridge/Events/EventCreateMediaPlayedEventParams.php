<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Events;

use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\MediaType;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams\State;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create an event for when a user begins playing a piece of media.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\EventsService::createMediaPlayedEvent()
 *
 * @phpstan-type EventCreateMediaPlayedEventParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   sessionId: string,
 *   state: State|value-of<State>,
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
 * }
 */
final class EventCreateMediaPlayedEventParams implements BaseModel
{
    /** @use SdkModel<EventCreateMediaPlayedEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Api(enum: MediaType::class)]
    public string $mediaType;

    #[Api]
    public int $occurredTimestamp;

    #[Api]
    public string $sessionId;

    /** @var value-of<State> $state */
    #[Api(enum: State::class)]
    public string $state;

    #[Api(optional: true)]
    public ?string $_hsenc;

    #[Api(optional: true)]
    public ?int $contactId;

    #[Api(optional: true)]
    public ?string $contactUtk;

    #[Api(optional: true)]
    public ?string $externalId;

    #[Api(optional: true)]
    public ?string $iframeUrl;

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

    /**
     * `new EventCreateMediaPlayedEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateMediaPlayedEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., sessionId: ..., state: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreateMediaPlayedEventParams)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withSessionID(...)
     *   ->withState(...)
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
     * @param State|value-of<State> $state
     */
    public static function with(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        string $sessionId,
        State|string $state,
        ?string $_hsenc = null,
        ?int $contactId = null,
        ?string $contactUtk = null,
        ?string $externalId = null,
        ?string $iframeUrl = null,
        ?int $mediaBridgeId = null,
        ?string $mediaName = null,
        ?string $mediaUrl = null,
        ?int $pageId = null,
        ?string $pageName = null,
        ?string $pageUrl = null,
    ): self {
        $obj = new self;

        $obj['mediaType'] = $mediaType;
        $obj->occurredTimestamp = $occurredTimestamp;
        $obj->sessionId = $sessionId;
        $obj['state'] = $state;

        null !== $_hsenc && $obj->_hsenc = $_hsenc;
        null !== $contactId && $obj->contactId = $contactId;
        null !== $contactUtk && $obj->contactUtk = $contactUtk;
        null !== $externalId && $obj->externalId = $externalId;
        null !== $iframeUrl && $obj->iframeUrl = $iframeUrl;
        null !== $mediaBridgeId && $obj->mediaBridgeId = $mediaBridgeId;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaUrl && $obj->mediaUrl = $mediaUrl;
        null !== $pageId && $obj->pageId = $pageId;
        null !== $pageName && $obj->pageName = $pageName;
        null !== $pageUrl && $obj->pageUrl = $pageUrl;

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

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionId = $sessionID;

        return $obj;
    }

    /**
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

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

    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj->externalId = $externalID;

        return $obj;
    }

    public function withIframeURL(string $iframeURL): self
    {
        $obj = clone $this;
        $obj->iframeUrl = $iframeURL;

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
}
