<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaPlayedEventRequest\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEventRequest\State;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaPlayedEventRequestShape = array{
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   sessionId: string,
 *   state: value-of<State>,
 *   _hsenc?: string|null,
 *   contactId?: int|null,
 *   contactUtk?: string|null,
 *   externalId?: string|null,
 *   iframeUrl?: string|null,
 *   mediaBridgeId?: int|null,
 *   mediaName?: string|null,
 *   mediaUrl?: string|null,
 *   pageId?: int|null,
 *   pageName?: string|null,
 *   pageUrl?: string|null,
 * }
 */
final class MediaPlayedEventRequest implements BaseModel
{
    /** @use SdkModel<MediaPlayedEventRequestShape> */
    use SdkModel;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public int $occurredTimestamp;

    #[Required]
    public string $sessionId;

    /** @var value-of<State> $state */
    #[Required(enum: State::class)]
    public string $state;

    #[Optional]
    public ?string $_hsenc;

    #[Optional]
    public ?int $contactId;

    #[Optional]
    public ?string $contactUtk;

    #[Optional]
    public ?string $externalId;

    #[Optional]
    public ?string $iframeUrl;

    #[Optional]
    public ?int $mediaBridgeId;

    #[Optional]
    public ?string $mediaName;

    #[Optional]
    public ?string $mediaUrl;

    #[Optional]
    public ?int $pageId;

    #[Optional]
    public ?string $pageName;

    #[Optional]
    public ?string $pageUrl;

    /**
     * `new MediaPlayedEventRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaPlayedEventRequest::with(
     *   mediaType: ..., occurredTimestamp: ..., sessionId: ..., state: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaPlayedEventRequest)
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
        $obj['occurredTimestamp'] = $occurredTimestamp;
        $obj['sessionId'] = $sessionId;
        $obj['state'] = $state;

        null !== $_hsenc && $obj['_hsenc'] = $_hsenc;
        null !== $contactId && $obj['contactId'] = $contactId;
        null !== $contactUtk && $obj['contactUtk'] = $contactUtk;
        null !== $externalId && $obj['externalId'] = $externalId;
        null !== $iframeUrl && $obj['iframeUrl'] = $iframeUrl;
        null !== $mediaBridgeId && $obj['mediaBridgeId'] = $mediaBridgeId;
        null !== $mediaName && $obj['mediaName'] = $mediaName;
        null !== $mediaUrl && $obj['mediaUrl'] = $mediaUrl;
        null !== $pageId && $obj['pageId'] = $pageId;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageUrl && $obj['pageUrl'] = $pageUrl;

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
        $obj['occurredTimestamp'] = $occurredTimestamp;

        return $obj;
    }

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionId'] = $sessionID;

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
        $obj['_hsenc'] = $_hsenc;

        return $obj;
    }

    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj['contactId'] = $contactID;

        return $obj;
    }

    public function withContactUtk(string $contactUtk): self
    {
        $obj = clone $this;
        $obj['contactUtk'] = $contactUtk;

        return $obj;
    }

    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj['externalId'] = $externalID;

        return $obj;
    }

    public function withIframeURL(string $iframeURL): self
    {
        $obj = clone $this;
        $obj['iframeUrl'] = $iframeURL;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj['mediaBridgeId'] = $mediaBridgeID;

        return $obj;
    }

    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['mediaName'] = $mediaName;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaUrl'] = $mediaURL;

        return $obj;
    }

    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj['pageId'] = $pageID;

        return $obj;
    }

    public function withPageName(string $pageName): self
    {
        $obj = clone $this;
        $obj['pageName'] = $pageName;

        return $obj;
    }

    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj['pageUrl'] = $pageURL;

        return $obj;
    }
}
