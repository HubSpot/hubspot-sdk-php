<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent\MediaType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaPlayedPercentageEventShape = array{
 *   contactID: int,
 *   mediaBridgeID: int,
 *   mediaBridgeObjectCoordinates: string,
 *   mediaBridgeObjectTypeID: string,
 *   mediaName: string,
 *   mediaType: value-of<MediaType>,
 *   occurredTimestamp: int,
 *   playedPercent: int,
 *   portalID: int,
 *   providerID: int,
 *   sessionID: string,
 *   mediaURL?: string,
 *   pageID?: int,
 *   pageName?: string,
 *   pageObjectCoordinates?: string,
 *   pageURL?: string,
 * }
 */
final class MediaPlayedPercentageEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedPercentageEventShape> */
    use SdkModel;

    /**
     * The ID of the contact in HubSpot’s system that consumed the media. This can be fetched using HubSpot's Get contact by usertoken (utk) API. The API also supports supplying a usertoken, and will handle converting this into a contact ID automatically.
     */
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

    #[Api]
    public int $playedPercent;

    /**
     * The ID of the HubSpot account.
     */
    #[Api('portalId')]
    public int $portalID;

    #[Api('providerId')]
    public int $providerID;

    #[Api('sessionId')]
    public string $sessionID;

    #[Api('mediaUrl', optional: true)]
    public ?string $mediaURL;

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    #[Api('pageId', optional: true)]
    public ?int $pageID;

    /**
     * The name or title of the page that an event happened on. Required for non-HubSpot pages.
     */
    #[Api(optional: true)]
    public ?string $pageName;

    #[Api(optional: true)]
    public ?string $pageObjectCoordinates;

    /**
     * The URL of the page that an event happened on. Required for non-HubSpot pages.
     */
    #[Api('pageUrl', optional: true)]
    public ?string $pageURL;

    /**
     * `new MediaPlayedPercentageEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaPlayedPercentageEvent::with(
     *   contactID: ...,
     *   mediaBridgeID: ...,
     *   mediaBridgeObjectCoordinates: ...,
     *   mediaBridgeObjectTypeID: ...,
     *   mediaName: ...,
     *   mediaType: ...,
     *   occurredTimestamp: ...,
     *   playedPercent: ...,
     *   portalID: ...,
     *   providerID: ...,
     *   sessionID: ...,
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
        int $contactID,
        int $mediaBridgeID,
        string $mediaBridgeObjectCoordinates,
        string $mediaBridgeObjectTypeID,
        string $mediaName,
        MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        int $portalID,
        int $providerID,
        string $sessionID,
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
        $obj->playedPercent = $playedPercent;
        $obj->portalID = $portalID;
        $obj->providerID = $providerID;
        $obj->sessionID = $sessionID;

        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $pageID && $obj->pageID = $pageID;
        null !== $pageName && $obj->pageName = $pageName;
        null !== $pageObjectCoordinates && $obj->pageObjectCoordinates = $pageObjectCoordinates;
        null !== $pageURL && $obj->pageURL = $pageURL;

        return $obj;
    }

    /**
     * The ID of the contact in HubSpot’s system that consumed the media. This can be fetched using HubSpot's Get contact by usertoken (utk) API. The API also supports supplying a usertoken, and will handle converting this into a contact ID automatically.
     */
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

    public function withPlayedPercent(int $playedPercent): self
    {
        $obj = clone $this;
        $obj->playedPercent = $playedPercent;

        return $obj;
    }

    /**
     * The ID of the HubSpot account.
     */
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

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

        return $obj;
    }

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj->pageID = $pageID;

        return $obj;
    }

    /**
     * The name or title of the page that an event happened on. Required for non-HubSpot pages.
     */
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

    /**
     * The URL of the page that an event happened on. Required for non-HubSpot pages.
     */
    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj->pageURL = $pageURL;

        return $obj;
    }
}
