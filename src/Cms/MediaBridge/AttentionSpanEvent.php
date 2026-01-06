<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttentionSpanEventShape = array{
 *   contactID: int,
 *   mediaBridgeID: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeID: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   percentRange: string,
 *   portalID: int,
 *   providerID: int,
 *   sessionID: string,
 *   totalPercentPlayed: float,
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
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageURL = null,
        ?string $rawData = null,
        ?int $totalSecondsPlayed = null,
    ): self {
        $obj = new self;

        $obj['contactID'] = $contactID;
        $obj['mediaBridgeID'] = $mediaBridgeID;
        $obj['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $obj['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;
        $obj['mediaName'] = $mediaName;
        $obj['mediaType'] = $mediaType;
        $obj['occurredTimestamp'] = $occurredTimestamp;
        $obj['percentRange'] = $percentRange;
        $obj['portalID'] = $portalID;
        $obj['providerID'] = $providerID;
        $obj['sessionID'] = $sessionID;
        $obj['totalPercentPlayed'] = $totalPercentPlayed;

        null !== $mediaURL && $obj['mediaURL'] = $mediaURL;
        null !== $pageID && $obj['pageID'] = $pageID;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $obj['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageURL && $obj['pageURL'] = $pageURL;
        null !== $rawData && $obj['rawData'] = $rawData;
        null !== $totalSecondsPlayed && $obj['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $obj;
    }

    /**
     * The ID of the contact in HubSpot’s system that consumed the media. This can be fetched using HubSpot's Get contact by usertoken (utk) API. The API also supports supplying a usertoken, and will handle converting this into a contact ID automatically.
     */
    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj['contactID'] = $contactID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj['mediaBridgeID'] = $mediaBridgeID;

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
        $obj['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;

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

    /**
     * The timestamp at which this event occurred, in milliseconds since the epoch.
     */
    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $obj = clone $this;
        $obj['occurredTimestamp'] = $occurredTimestamp;

        return $obj;
    }

    public function withPercentRange(string $percentRange): self
    {
        $obj = clone $this;
        $obj['percentRange'] = $percentRange;

        return $obj;
    }

    /**
     * The ID of the HubSpot account.
     */
    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalID'] = $portalID;

        return $obj;
    }

    public function withProviderID(int $providerID): self
    {
        $obj = clone $this;
        $obj['providerID'] = $providerID;

        return $obj;
    }

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    /**
     * The percent of the media that the user consumed. Providers may calculate this differently depending on how they consider repeated views of the same portion of media. For this reason, the API will not attempt to validate totalPercentWatched against the attention span information for the event. If it is missing, HubSpot will calculate this from the attention span map as follows: (number of spans with a value of 1 or more)/(Total number of spans).
     */
    public function withTotalPercentPlayed(float $totalPercentPlayed): self
    {
        $obj = clone $this;
        $obj['totalPercentPlayed'] = $totalPercentPlayed;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaURL'] = $mediaURL;

        return $obj;
    }

    /**
     * The ID of the page, if hosted on HubSpot. Required for HubSpot pages.
     */
    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj['pageID'] = $pageID;

        return $obj;
    }

    /**
     * The name of the page. Required if the page is not hosted on HubSpot.
     */
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

    /**
     * The URL of the page that an event happened on. Required if the page is not hosted on HubSpot.
     */
    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj['pageURL'] = $pageURL;

        return $obj;
    }

    /**
     * This is the raw data which provides the most granular data about spans of the media, and how many times each span was consumed by the user. For example, for a 10 second video where each second is a span, if a visitor watches the first 5 seconds of the video, then restarts the video and watches the first 2 seconds again, the resulting `rawDataString` would be `“0=2;1=2;2=1;3=1;4=1;5=0;6=0;7=0;8=0;9=0;”`.
     */
    public function withRawData(string $rawData): self
    {
        $obj = clone $this;
        $obj['rawData'] = $rawData;

        return $obj;
    }

    /**
     * The seconds that a user spent consuming the media. The media bridge calculates this as `totalPercentPlayed`*`mediaDuration`. If a provider would like this to be calculated differently, they can provide the pre-calculated value when they create the event.
     */
    public function withTotalSecondsPlayed(int $totalSecondsPlayed): self
    {
        $obj = clone $this;
        $obj['totalSecondsPlayed'] = $totalSecondsPlayed;

        return $obj;
    }
}
