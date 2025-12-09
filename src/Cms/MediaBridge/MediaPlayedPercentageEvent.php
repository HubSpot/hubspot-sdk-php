<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaPlayedPercentageEventShape = array{
 *   contactId: int,
 *   mediaBridgeId: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeId: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   playedPercent: int,
 *   portalId: int,
 *   providerId: int,
 *   sessionId: string,
 *   mediaUrl?: string|null,
 *   pageId?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageUrl?: string|null,
 * }
 */
final class MediaPlayedPercentageEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedPercentageEventShape> */
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

    #[Required]
    public int $occurredTimestamp;

    #[Required]
    public int $playedPercent;

    /**
     * The ID of the HubSpot account.
     */
    #[Required]
    public int $portalId;

    #[Required]
    public int $providerId;

    #[Required]
    public string $sessionId;

    #[Optional]
    public ?string $mediaUrl;

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    #[Optional]
    public ?int $pageId;

    /**
     * The name or title of the page that an event happened on. Required for non-HubSpot pages.
     */
    #[Optional]
    public ?string $pageName;

    #[Optional]
    public ?string $pageObjectCoordinates;

    /**
     * The URL of the page that an event happened on. Required for non-HubSpot pages.
     */
    #[Optional]
    public ?string $pageUrl;

    /**
     * `new MediaPlayedPercentageEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaPlayedPercentageEvent::with(
     *   contactId: ...,
     *   mediaBridgeId: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeId: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   playedPercent: ...,
     *   portalId: ...,
     *   providerId: ...,
     *   sessionId: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaPlayedPercentageEvent)
     *   ->withContactID(...)
     *   ->withMediaBridgeID(...)
     *   ->withMediaBridgeObjectCoordinates(...)
     *   ->withMediaBridgeObjectTypeID(...)
     *   ->withMediaName(...)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withPlayedPercent(...)
     *   ->withPortalID(...)
     *   ->withProviderID(...)
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
     */
    public static function with(
        int $contactId,
        int $mediaBridgeId,
        string $mediaBridgeObjectCoordinates,
        string $mediaBridgeObjectTypeId,
        string $mediaName,
        MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        int $portalId,
        int $providerId,
        string $sessionId,
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
        $obj['playedPercent'] = $playedPercent;
        $obj['portalId'] = $portalId;
        $obj['providerId'] = $providerId;
        $obj['sessionId'] = $sessionId;

        null !== $mediaUrl && $obj['mediaUrl'] = $mediaUrl;
        null !== $pageId && $obj['pageId'] = $pageId;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $obj['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageUrl && $obj['pageUrl'] = $pageUrl;

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

    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $obj = clone $this;
        $obj['occurredTimestamp'] = $occurredTimestamp;

        return $obj;
    }

    public function withPlayedPercent(int $playedPercent): self
    {
        $obj = clone $this;
        $obj['playedPercent'] = $playedPercent;

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

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaUrl'] = $mediaURL;

        return $obj;
    }

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj['pageId'] = $pageID;

        return $obj;
    }

    /**
     * The name or title of the page that an event happened on. Required for non-HubSpot pages.
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
     * The URL of the page that an event happened on. Required for non-HubSpot pages.
     */
    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj['pageUrl'] = $pageURL;

        return $obj;
    }
}
