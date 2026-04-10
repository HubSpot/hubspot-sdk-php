<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\ExternalPlayContext;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\MediaType;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeCreateMediaPlayedEventParams\State;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create an event for when a user begins playing a piece of media.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::createMediaPlayedEvent()
 *
 * @phpstan-type MediaBridgeCreateMediaPlayedEventParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   sessionID: string,
 *   state: State|value-of<State>,
 *   _hsenc?: string|null,
 *   contactID?: int|null,
 *   contactUtk?: string|null,
 *   externalID?: string|null,
 *   externalPlayContext?: null|ExternalPlayContext|value-of<ExternalPlayContext>,
 *   iframeURL?: string|null,
 *   mediaBridgeID?: int|null,
 *   mediaName?: string|null,
 *   mediaURL?: string|null,
 *   pageID?: int|null,
 *   pageName?: string|null,
 *   pageURL?: string|null,
 * }
 */
final class MediaBridgeCreateMediaPlayedEventParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeCreateMediaPlayedEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public int $occurredTimestamp;

    #[Required('sessionId')]
    public string $sessionID;

    /** @var value-of<State> $state */
    #[Required(enum: State::class)]
    public string $state;

    #[Optional]
    public ?string $_hsenc;

    #[Optional('contactId')]
    public ?int $contactID;

    #[Optional]
    public ?string $contactUtk;

    #[Optional('externalId')]
    public ?string $externalID;

    /** @var value-of<ExternalPlayContext>|null $externalPlayContext */
    #[Optional(enum: ExternalPlayContext::class)]
    public ?string $externalPlayContext;

    #[Optional('iframeUrl')]
    public ?string $iframeURL;

    #[Optional('mediaBridgeId')]
    public ?int $mediaBridgeID;

    #[Optional]
    public ?string $mediaName;

    #[Optional('mediaUrl')]
    public ?string $mediaURL;

    #[Optional('pageId')]
    public ?int $pageID;

    #[Optional]
    public ?string $pageName;

    #[Optional('pageUrl')]
    public ?string $pageURL;

    /**
     * `new MediaBridgeCreateMediaPlayedEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeCreateMediaPlayedEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., sessionID: ..., state: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeCreateMediaPlayedEventParams)
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
     * @param ExternalPlayContext|value-of<ExternalPlayContext>|null $externalPlayContext
     */
    public static function with(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        string $sessionID,
        State|string $state,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
        ExternalPlayContext|string|null $externalPlayContext = null,
        ?string $iframeURL = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
    ): self {
        $self = new self;

        $self['mediaType'] = $mediaType;
        $self['occurredTimestamp'] = $occurredTimestamp;
        $self['sessionID'] = $sessionID;
        $self['state'] = $state;

        null !== $_hsenc && $self['_hsenc'] = $_hsenc;
        null !== $contactID && $self['contactID'] = $contactID;
        null !== $contactUtk && $self['contactUtk'] = $contactUtk;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $externalPlayContext && $self['externalPlayContext'] = $externalPlayContext;
        null !== $iframeURL && $self['iframeURL'] = $iframeURL;
        null !== $mediaBridgeID && $self['mediaBridgeID'] = $mediaBridgeID;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $pageID && $self['pageID'] = $pageID;
        null !== $pageName && $self['pageName'] = $pageName;
        null !== $pageURL && $self['pageURL'] = $pageURL;

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

    public function withHsenc(string $_hsenc): self
    {
        $self = clone $this;
        $self['_hsenc'] = $_hsenc;

        return $self;
    }

    public function withContactID(int $contactID): self
    {
        $self = clone $this;
        $self['contactID'] = $contactID;

        return $self;
    }

    public function withContactUtk(string $contactUtk): self
    {
        $self = clone $this;
        $self['contactUtk'] = $contactUtk;

        return $self;
    }

    public function withExternalID(string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

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

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $self = clone $this;
        $self['mediaBridgeID'] = $mediaBridgeID;

        return $self;
    }

    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

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

    public function withPageURL(string $pageURL): self
    {
        $self = clone $this;
        $self['pageURL'] = $pageURL;

        return $self;
    }
}
