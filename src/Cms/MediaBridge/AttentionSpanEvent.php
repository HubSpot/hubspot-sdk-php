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
 *   contactId: int,
 *   mediaBridgeId: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeId: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   percentRange: string,
 *   portalId: int,
 *   providerId: int,
 *   sessionId: string,
 *   totalPercentPlayed: float,
 *   mediaUrl?: string|null,
 *   pageId?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageUrl?: string|null,
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
    #[Required]
    public int $contactId;

    #[Required]
    public int $mediaBridgeId;

    #[Required]
    public string $mediaBridgeObjectCoordinates;

    #[Required]
    public string $mediaBridgeObjectTypeId;

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
    #[Required]
    public int $portalId;

    #[Required]
    public int $providerId;

    #[Required]
    public string $sessionId;

    /**
     * The percent of the media that the user consumed. Providers may calculate this differently depending on how they consider repeated views of the same portion of media. For this reason, the API will not attempt to validate totalPercentWatched against the attention span information for the event. If it is missing, HubSpot will calculate this from the attention span map as follows: (number of spans with a value of 1 or more)/(Total number of spans).
     */
    #[Required]
    public float $totalPercentPlayed;

    #[Optional]
    public ?string $mediaUrl;

    /**
     * The ID of the page, if hosted on HubSpot. Required for HubSpot pages.
     */
    #[Optional]
    public ?int $pageId;

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
    #[Optional]
    public ?string $pageUrl;

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
     *   contactId: ...,
     *   mediaBridgeId: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeId: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   percentRange: ...,
     *   portalId: ...,
     *   providerId: ...,
     *   sessionId: ...,
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
        int $contactId,
        int $mediaBridgeId,
        string $mediaBridgeObjectCoordinates,
        string $mediaBridgeObjectTypeId,
        string $mediaName,
        MediaType|string $mediaType,
        int $occurredTimestamp,
        string $percentRange,
        int $portalId,
        int $providerId,
        string $sessionId,
        float $totalPercentPlayed,
        ?string $mediaUrl = null,
        ?int $pageId = null,
        ?string $pageName = null,
        ?string $pageObjectCoordinates = null,
        ?string $pageUrl = null,
        ?string $rawData = null,
        ?int $totalSecondsPlayed = null,
    ): self {
        $obj = new self;

        $obj['contactId'] = $contactId;
        $obj['mediaBridgeId'] = $mediaBridgeId;
        $obj['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $obj['mediaBridgeObjectTypeId'] = $mediaBridgeObjectTypeId;
        $obj['mediaName'] = $mediaName;
        $obj['mediaType'] = $mediaType;
        $obj['occurredTimestamp'] = $occurredTimestamp;
        $obj['percentRange'] = $percentRange;
        $obj['portalId'] = $portalId;
        $obj['providerId'] = $providerId;
        $obj['sessionId'] = $sessionId;
        $obj['totalPercentPlayed'] = $totalPercentPlayed;

        null !== $mediaUrl && $obj['mediaUrl'] = $mediaUrl;
        null !== $pageId && $obj['pageId'] = $pageId;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $obj['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageUrl && $obj['pageUrl'] = $pageUrl;
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
        $obj['mediaUrl'] = $mediaURL;

        return $obj;
    }

    /**
     * The ID of the page, if hosted on HubSpot. Required for HubSpot pages.
     */
    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj['pageId'] = $pageID;

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
        $obj['pageUrl'] = $pageURL;

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
