<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent\ExternalPlayContext;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent\MediaType;
use HubSpotSDK\Cms\MediaBridge\MediaPlayedEvent\State;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaPlayedEventShape = array{
 *   contactID: int,
 *   mediaBridgeID: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeID: string,
 *   mediaName: string,
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   portalID: int,
 *   providerID: int,
 *   sessionID: string,
 *   state: State|value-of<State>,
 *   externalPlayContext?: null|ExternalPlayContext|value-of<ExternalPlayContext>,
 *   iframeURL?: string|null,
 *   mediaURL?: string|null,
 *   pageID?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageURL?: string|null,
 * }
 */
final class MediaPlayedEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedEventShape> */
    use SdkModel;

    #[Required('contactId')]
    public int $contactID;

    #[Required('mediaBridgeId')]
    public int $mediaBridgeID;

    #[Required]
    public string $mediaBridgeObjectCoordinates;

    #[Required('mediaBridgeObjectTypeId')]
    public string $mediaBridgeObjectTypeID;

    #[Required]
    public string $mediaName;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public int $occurredTimestamp;

    #[Required('portalId')]
    public int $portalID;

    #[Required('providerId')]
    public int $providerID;

    #[Required('sessionId')]
    public string $sessionID;

    /** @var value-of<State> $state */
    #[Required(enum: State::class)]
    public string $state;

    /** @var value-of<ExternalPlayContext>|null $externalPlayContext */
    #[Optional(enum: ExternalPlayContext::class)]
    public ?string $externalPlayContext;

    #[Optional('iframeUrl')]
    public ?string $iframeURL;

    #[Optional('mediaUrl')]
    public ?string $mediaURL;

    #[Optional('pageId')]
    public ?int $pageID;

    #[Optional]
    public ?string $pageName;

    #[Optional]
    public ?string $pageObjectCoordinates;

    #[Optional('pageUrl')]
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
     * @param ExternalPlayContext|value-of<ExternalPlayContext>|null $externalPlayContext
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
        ExternalPlayContext|string|null $externalPlayContext = null,
        ?string $iframeURL = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageURL = null,
    ): self {
        $self = new self;

        $self['contactID'] = $contactID;
        $self['mediaBridgeID'] = $mediaBridgeID;
        $self['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $self['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;
        $self['mediaName'] = $mediaName;
        $self['mediaType'] = $mediaType;
        $self['occurredTimestamp'] = $occurredTimestamp;
        $self['portalID'] = $portalID;
        $self['providerID'] = $providerID;
        $self['sessionID'] = $sessionID;
        $self['state'] = $state;

        null !== $externalPlayContext && $self['externalPlayContext'] = $externalPlayContext;
        null !== $iframeURL && $self['iframeURL'] = $iframeURL;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $pageID && $self['pageID'] = $pageID;
        null !== $pageName && $self['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $self['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageURL && $self['pageURL'] = $pageURL;

        return $self;
    }

    public function withContactID(int $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $self = clone $this;
        $self['mediaBridgeID'] = $mediaBridgeID;

        return $self;
    }

    public function withMediaBridgeObjectCoordinates(
        string $mediaBridgeObjectCoordinates
    ): self {
        $self = clone $this;
        $self['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;

        return $self;
    }

    public function withMediaBridgeObjectTypeID(
        string $mediaBridgeObjectTypeID
    ): self {
        $self = clone $this;
        $self['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;

        return $self;
    }

    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * @param MediaType|value-of<MediaType> $mediaType
     */
    public function withMediaType(MediaType|string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }

    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $self = clone $this;
        $self['occurredTimestamp'] = $occurredTimestamp;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withProviderID(int $providerID): self
    {
        $self = clone $this;
        $self['providerID'] = $providerID;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * @param State|value-of<State> $state
     */
    public function withState(State|string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * @param ExternalPlayContext|value-of<ExternalPlayContext> $externalPlayContext
     */
    public function withExternalPlayContext(
        ExternalPlayContext|string $externalPlayContext
    ): self {
        $self = clone $this;
        $self['externalPlayContext'] = $externalPlayContext;

        return $self;
    }

    public function withIframeURL(string $iframeURL): self
    {
        $self = clone $this;
        $self['iframeURL'] = $iframeURL;

        return $self;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    public function withPageID(int $pageID): self
    {
        $self = clone $this;
        $self['pageID'] = $pageID;

        return $self;
    }

    public function withPageName(string $pageName): self
    {
        $self = clone $this;
        $self['pageName'] = $pageName;

        return $self;
    }

    public function withPageObjectCoordinates(
        string $pageObjectCoordinates
    ): self {
        $self = clone $this;
        $self['pageObjectCoordinates'] = $pageObjectCoordinates;

        return $self;
    }

    public function withPageURL(string $pageURL): self
    {
        $self = clone $this;
        $self['pageURL'] = $pageURL;

        return $self;
    }
}
