<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent\MediaType;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent\State;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaPlayedEventShape = array{
 *   contactId: int,
 *   mediaBridgeId: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeId: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   portalId: int,
 *   providerId: int,
 *   sessionId: string,
 *   state: value-of<State>,
 *   iframeUrl?: string|null,
 *   mediaUrl?: string|null,
 *   pageId?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageUrl?: string|null,
 * }
 */
final class MediaPlayedEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedEventShape> */
    use SdkModel;

    #[Api]
    public int $contactId;

    #[Api]
    public int $mediaBridgeId;

    #[Api]
    public string $mediaBridgeObjectCoordinates;

    #[Api]
    public string $mediaBridgeObjectTypeId;

    #[Api]
    public string $mediaName;

    /** @var value-of<MediaType> $mediaType */
    #[Api(enum: MediaType::class)]
    public string $mediaType;

    #[Api]
    public int $occurredTimestamp;

    #[Api]
    public int $portalId;

    #[Api]
    public int $providerId;

    #[Api]
    public string $sessionId;

    /** @var value-of<State> $state */
    #[Api(enum: State::class)]
    public string $state;

    #[Api(optional: true)]
    public ?string $iframeUrl;

    #[Api(optional: true)]
    public ?string $mediaUrl;

    #[Api(optional: true)]
    public ?int $pageId;

    #[Api(optional: true)]
    public ?string $pageName;

    #[Api(optional: true)]
    public ?string $pageObjectCoordinates;

    #[Api(optional: true)]
    public ?string $pageUrl;

    /**
     * `new MediaPlayedEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaPlayedEvent::with(
     *   contactId: ...,
     *   mediaBridgeId: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeId: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   portalId: ...,
     *   providerId: ...,
     *   sessionId: ...,
     *   state: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaPlayedEvent)
     *   ->withContactID(...)
     *   ->withMediaBridgeID(...)
     *   ->withMediaBridgeObjectCoordinates(...)
     *   ->withMediaBridgeObjectTypeID(...)
     *   ->withMediaName(...)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withPortalID(...)
     *   ->withProviderID(...)
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
        int $contactId,
        int $mediaBridgeId,
        string $mediaBridgeObjectCoordinates,
        string $mediaBridgeObjectTypeId,
        string $mediaName,
        MediaType|string $mediaType,
        int $occurredTimestamp,
        int $portalId,
        int $providerId,
        string $sessionId,
        State|string $state,
        ?string $iframeUrl = null,
        ?string $mediaUrl = null,
        ?int $pageId = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageUrl = null,
    ): self {
        $obj = new self;

        $obj['contactId'] = $contactId;
        $obj['mediaBridgeId'] = $mediaBridgeId;
        $obj['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $obj['mediaBridgeObjectTypeId'] = $mediaBridgeObjectTypeId;
        $obj['mediaName'] = $mediaName;
        $obj['mediaType'] = $mediaType;
        $obj['occurredTimestamp'] = $occurredTimestamp;
        $obj['portalId'] = $portalId;
        $obj['providerId'] = $providerId;
        $obj['sessionId'] = $sessionId;
        $obj['state'] = $state;

        null !== $iframeUrl && $obj['iframeUrl'] = $iframeUrl;
        null !== $mediaUrl && $obj['mediaUrl'] = $mediaUrl;
        null !== $pageId && $obj['pageId'] = $pageId;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $obj['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageUrl && $obj['pageUrl'] = $pageUrl;

        return $obj;
    }

    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj['contactId'] = $contactID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj['mediaBridgeId'] = $mediaBridgeID;

        return $obj;
    }

    public function withMediaBridgeObjectCoordinates(
        string $mediaBridgeObjectCoordinates
    ): self {
        $obj = clone $this;
        $obj['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;

        return $obj;
    }

    public function withMediaBridgeObjectTypeID(
        string $mediaBridgeObjectTypeID
    ): self {
        $obj = clone $this;
        $obj['mediaBridgeObjectTypeId'] = $mediaBridgeObjectTypeID;

        return $obj;
    }

    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['mediaName'] = $mediaName;

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

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalId'] = $portalID;

        return $obj;
    }

    public function withProviderID(int $providerID): self
    {
        $obj = clone $this;
        $obj['providerId'] = $providerID;

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

    public function withIframeURL(string $iframeURL): self
    {
        $obj = clone $this;
        $obj['iframeUrl'] = $iframeURL;

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

    public function withPageObjectCoordinates(
        string $pageObjectCoordinates
    ): self {
        $obj = clone $this;
        $obj['pageObjectCoordinates'] = $pageObjectCoordinates;

        return $obj;
    }

    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj['pageUrl'] = $pageURL;

        return $obj;
    }
}
