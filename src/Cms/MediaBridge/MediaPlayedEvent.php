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
 *   contactID: int,
 *   mediaBridgeID: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeID: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   portalID: int,
 *   providerID: int,
 *   sessionID: string,
 *   state: value-of<State>,
 *   iframeURL?: string,
 *   mediaURL?: string,
 *   pageID?: int,
 *   pageName?: string,
 *   pageObjectCoordinates?: string,
 *   pageURL?: string,
 * }
 */
final class MediaPlayedEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedEventShape> */
    use SdkModel;

    #[Api('contactId')]
    public int $contactID;

    #[Api('mediaBridgeId')]
    public int $mediaBridgeID;

    #[Api]
    public string $mediaBridgeObjectCoordinates;

    #[Api('mediaBridgeObjectTypeId')]
    public string $mediaBridgeObjectTypeID;

    #[Api]
    public string $mediaName;

    /** @var value-of<MediaType> $mediaType */
    #[Api(enum: MediaType::class)]
    public string $mediaType;

    #[Api]
    public int $occurredTimestamp;

    #[Api('portalId')]
    public int $portalID;

    #[Api('providerId')]
    public int $providerID;

    #[Api('sessionId')]
    public string $sessionID;

    /** @var value-of<State> $state */
    #[Api(enum: State::class)]
    public string $state;

    #[Api('iframeUrl', optional: true)]
    public ?string $iframeURL;

    #[Api('mediaUrl', optional: true)]
    public ?string $mediaURL;

    #[Api('pageId', optional: true)]
    public ?int $pageID;

    #[Api(optional: true)]
    public ?string $pageName;

    #[Api(optional: true)]
    public ?string $pageObjectCoordinates;

    #[Api('pageUrl', optional: true)]
    public ?string $pageURL;

    /**
     * `new MediaPlayedEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaPlayedEvent::with(
     *   contactID: ...,
     *   mediaBridgeID: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeID: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   portalID: ...,
     *   providerID: ...,
     *   sessionID: ...,
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
        int $contactID,
        int $mediaBridgeID,
        string $mediaBridgeObjectCoordinates,
        string $mediaBridgeObjectTypeID,
        string $mediaName,
        MediaType|string $mediaType,
        int $occurredTimestamp,
        int $portalID,
        int $providerID,
        string $sessionID,
        State|string $state,
        ?string $iframeURL = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageURL = null,
    ): self {
        $obj = new self;

        $obj->contactID = $contactID;
        $obj->mediaBridgeID = $mediaBridgeID;
        $obj->mediaBridgeObjectCoordinates = $mediaBridgeObjectCoordinates;
        $obj->mediaBridgeObjectTypeID = $mediaBridgeObjectTypeID;
        $obj->mediaName = $mediaName;
        $obj['mediaType'] = $mediaType;
        $obj->occurredTimestamp = $occurredTimestamp;
        $obj->portalID = $portalID;
        $obj->providerID = $providerID;
        $obj->sessionID = $sessionID;
        $obj['state'] = $state;

        null !== $iframeURL && $obj->iframeURL = $iframeURL;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $pageID && $obj->pageID = $pageID;
        null !== $pageName && $obj->pageName = $pageName;
        null !== $pageObjectCoordinates && $obj->pageObjectCoordinates = $pageObjectCoordinates;
        null !== $pageURL && $obj->pageURL = $pageURL;

        return $obj;
    }

    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj->contactID = $contactID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj->mediaBridgeID = $mediaBridgeID;

        return $obj;
    }

    public function withMediaBridgeObjectCoordinates(
        string $mediaBridgeObjectCoordinates
    ): self {
        $obj = clone $this;
        $obj->mediaBridgeObjectCoordinates = $mediaBridgeObjectCoordinates;

        return $obj;
    }

    public function withMediaBridgeObjectTypeID(
        string $mediaBridgeObjectTypeID
    ): self {
        $obj = clone $this;
        $obj->mediaBridgeObjectTypeID = $mediaBridgeObjectTypeID;

        return $obj;
    }

    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

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

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withProviderID(int $providerID): self
    {
        $obj = clone $this;
        $obj->providerID = $providerID;

        return $obj;
    }

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj->sessionID = $sessionID;

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
        $obj->iframeURL = $iframeURL;

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

    public function withPageObjectCoordinates(
        string $pageObjectCoordinates
    ): self {
        $obj = clone $this;
        $obj->pageObjectCoordinates = $pageObjectCoordinates;

        return $obj;
    }

    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj->pageURL = $pageURL;

        return $obj;
    }
}
