<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\AttentionSpanEvent\ExternalPlayContext;
use HubSpotSDK\Cms\MediaBridge\AttentionSpanEvent\MediaType;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttentionSpanEventShape = array{
 *   contactID: int,
 *   mediaBridgeID: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeID: string,
 *   mediaName: string,
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   percentRange: string,
 *   portalID: int,
 *   providerID: int,
 *   sessionID: string,
 *   totalPercentPlayed: float,
 *   externalPlayContext?: null|ExternalPlayContext|value-of<ExternalPlayContext>,
 *   mediaURL?: string|null,
 *   pageID?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageURL?: string|null,
 *   rawData?: string|null,
 *   totalSecondsPlayed?: int|null,
 * }
 */
final class AttentionSpanEvent implements BaseModel
{
    /** @use SdkModel<AttentionSpanEventShape> */
    use SdkModel;

    /**
     * The ID of the contact in HubSpot’s system that consumed the media. This can be fetched using HubSpot's Get contact by usertoken (utk) API. The API also supports supplying a usertoken, and will handle converting this into a contact ID automatically.
     */
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

    /**
     * The timestamp at which this event occurred, in milliseconds since the epoch.
     */
    #[Required]
    public int $occurredTimestamp;

    #[Required]
    public string $percentRange;

    /**
     * The ID of the HubSpot account.
     */
    #[Required('portalId')]
    public int $portalID;

    #[Required('providerId')]
    public int $providerID;

    #[Required('sessionId')]
    public string $sessionID;

    /**
     * The percent of the media that the user consumed. Providers may calculate this differently depending on how they consider repeated views of the same portion of media. For this reason, the API will not attempt to validate totalPercentWatched against the attention span information for the event. If it is missing, HubSpot will calculate this from the attention span map as follows: (number of spans with a value of 1 or more)/(Total number of spans).
     */
    #[Required]
    public float $totalPercentPlayed;

    /** @var value-of<ExternalPlayContext>|null $externalPlayContext */
    #[Optional(enum: ExternalPlayContext::class)]
    public ?string $externalPlayContext;

    #[Optional('mediaUrl')]
    public ?string $mediaURL;

    /**
     * The ID of the page, if hosted on HubSpot. Required for HubSpot pages.
     */
    #[Optional('pageId')]
    public ?int $pageID;

    /**
     * The name of the page. Required if the page is not hosted on HubSpot.
     */
    #[Optional]
    public ?string $pageName;

    #[Optional]
    public ?string $pageObjectCoordinates;

    /**
     * The URL of the page that an event happened on. Required if the page is not hosted on HubSpot.
     */
    #[Optional('pageUrl')]
    public ?string $pageURL;

    /**
     * This is the raw data which provides the most granular data about spans of the media, and how many times each span was consumed by the user. For example, for a 10 second video where each second is a span, if a visitor watches the first 5 seconds of the video, then restarts the video and watches the first 2 seconds again, the resulting `rawDataString` would be `“0=2;1=2;2=1;3=1;4=1;5=0;6=0;7=0;8=0;9=0;”`.
     */
    #[Optional]
    public ?string $rawData;

    /**
     * The seconds that a user spent consuming the media. The media bridge calculates this as `totalPercentPlayed`*`mediaDuration`. If a provider would like this to be calculated differently, they can provide the pre-calculated value when they create the event.
     */
    #[Optional]
    public ?int $totalSecondsPlayed;

    /**
     * `new AttentionSpanEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttentionSpanEvent::with(
     *   contactID: ...,
     *   mediaBridgeID: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeID: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   percentRange: ...,
     *   portalID: ...,
     *   providerID: ...,
     *   sessionID: ...,
     *   totalPercentPlayed: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttentionSpanEvent)
     *   ->withContactID(...)
     *   ->withMediaBridgeID(...)
     *   ->withMediaBridgeObjectCoordinates(...)
     *   ->withMediaBridgeObjectTypeID(...)
     *   ->withMediaName(...)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withPercentRange(...)
     *   ->withPortalID(...)
     *   ->withProviderID(...)
     *   ->withSessionID(...)
     *   ->withTotalPercentPlayed(...)
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
        string $percentRange,
        int $portalID,
        int $providerID,
        string $sessionID,
        float $totalPercentPlayed,
        ExternalPlayContext|string|null $externalPlayContext = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageURL = null,
        ?string $rawData = null,
        ?int $totalSecondsPlayed = null,
    ): self {
        $self = new self;

        $self['contactID'] = $contactID;
        $self['mediaBridgeID'] = $mediaBridgeID;
        $self['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $self['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;
        $self['mediaName'] = $mediaName;
        $self['mediaType'] = $mediaType;
        $self['occurredTimestamp'] = $occurredTimestamp;
        $self['percentRange'] = $percentRange;
        $self['portalID'] = $portalID;
        $self['providerID'] = $providerID;
        $self['sessionID'] = $sessionID;
        $self['totalPercentPlayed'] = $totalPercentPlayed;

        null !== $externalPlayContext && $self['externalPlayContext'] = $externalPlayContext;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $pageID && $self['pageID'] = $pageID;
        null !== $pageName && $self['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $self['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageURL && $self['pageURL'] = $pageURL;
        null !== $rawData && $self['rawData'] = $rawData;
        null !== $totalSecondsPlayed && $self['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $self;
    }

    /**
     * The ID of the contact in HubSpot’s system that consumed the media. This can be fetched using HubSpot's Get contact by usertoken (utk) API. The API also supports supplying a usertoken, and will handle converting this into a contact ID automatically.
     */
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

    /**
     * The timestamp at which this event occurred, in milliseconds since the epoch.
     */
    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $self = clone $this;
        $self['occurredTimestamp'] = $occurredTimestamp;

        return $self;
    }

    public function withPercentRange(string $percentRange): self
    {
        $self = clone $this;
        $self['percentRange'] = $percentRange;

        return $self;
    }

    /**
     * The ID of the HubSpot account.
     */
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
     * The percent of the media that the user consumed. Providers may calculate this differently depending on how they consider repeated views of the same portion of media. For this reason, the API will not attempt to validate totalPercentWatched against the attention span information for the event. If it is missing, HubSpot will calculate this from the attention span map as follows: (number of spans with a value of 1 or more)/(Total number of spans).
     */
    public function withTotalPercentPlayed(float $totalPercentPlayed): self
    {
        $self = clone $this;
        $self['totalPercentPlayed'] = $totalPercentPlayed;

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

    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * The ID of the page, if hosted on HubSpot. Required for HubSpot pages.
     */
    public function withPageID(int $pageID): self
    {
        $self = clone $this;
        $self['pageID'] = $pageID;

        return $self;
    }

    /**
     * The name of the page. Required if the page is not hosted on HubSpot.
     */
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

    /**
     * The URL of the page that an event happened on. Required if the page is not hosted on HubSpot.
     */
    public function withPageURL(string $pageURL): self
    {
        $self = clone $this;
        $self['pageURL'] = $pageURL;

        return $self;
    }

    /**
     * This is the raw data which provides the most granular data about spans of the media, and how many times each span was consumed by the user. For example, for a 10 second video where each second is a span, if a visitor watches the first 5 seconds of the video, then restarts the video and watches the first 2 seconds again, the resulting `rawDataString` would be `“0=2;1=2;2=1;3=1;4=1;5=0;6=0;7=0;8=0;9=0;”`.
     */
    public function withRawData(string $rawData): self
    {
        $self = clone $this;
        $self['rawData'] = $rawData;

        return $self;
    }

    /**
     * The seconds that a user spent consuming the media. The media bridge calculates this as `totalPercentPlayed`*`mediaDuration`. If a provider would like this to be calculated differently, they can provide the pre-calculated value when they create the event.
     */
    public function withTotalSecondsPlayed(int $totalSecondsPlayed): self
    {
        $self = clone $this;
        $self['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $self;
    }
}
