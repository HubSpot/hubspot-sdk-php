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
 *   mediaURL?: string|null,
 *   pageID?: int|null,
 *   pageName?: string|null,
 *   pageObjectCoordinates?: string|null,
 *   pageURL?: string|null,
 * }
 */
final class MediaPlayedPercentageEvent implements BaseModel
{
    /** @use SdkModel<MediaPlayedPercentageEventShape> */
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

    #[Required]
    public int $occurredTimestamp;

    #[Required]
    public int $playedPercent;

    /**
     * The ID of the HubSpot account.
     */
    #[Required('portalId')]
    public int $portalID;

    #[Required('providerId')]
    public int $providerID;

    #[Required('sessionId')]
    public string $sessionID;

    #[Optional('mediaUrl')]
    public ?string $mediaURL;

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    #[Optional('pageId')]
    public ?int $pageID;

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
    #[Optional('pageUrl')]
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
        $self = new self;

        $self['contactID'] = $contactID;
        $self['mediaBridgeID'] = $mediaBridgeID;
        $self['mediaBridgeObjectCoordinates'] = $mediaBridgeObjectCoordinates;
        $self['mediaBridgeObjectTypeID'] = $mediaBridgeObjectTypeID;
        $self['mediaName'] = $mediaName;
        $self['mediaType'] = $mediaType;
        $self['occurredTimestamp'] = $occurredTimestamp;
        $self['playedPercent'] = $playedPercent;
        $self['portalID'] = $portalID;
        $self['providerID'] = $providerID;
        $self['sessionID'] = $sessionID;

        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $pageID && $self['pageID'] = $pageID;
        null !== $pageName && $self['pageName'] = $pageName;
        null !== $pageObjectCoordinates && $self['pageObjectCoordinates'] = $pageObjectCoordinates;
        null !== $pageURL && $self['pageURL'] = $pageURL;

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

    public function withOccurredTimestamp(int $occurredTimestamp): self
    {
        $self = clone $this;
        $self['occurredTimestamp'] = $occurredTimestamp;

        return $self;
    }

    public function withPlayedPercent(int $playedPercent): self
    {
        $self = clone $this;
        $self['playedPercent'] = $playedPercent;

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

    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * The content ID of the page that an event happened on, for HubSpot pages. Required if the page is a HubSpot page.
     */
    public function withPageID(int $pageID): self
    {
        $self = clone $this;
        $self['pageID'] = $pageID;

        return $self;
    }

    /**
     * The name or title of the page that an event happened on. Required for non-HubSpot pages.
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
     * The URL of the page that an event happened on. Required for non-HubSpot pages.
     */
    public function withPageURL(string $pageURL): self
    {
        $self = clone $this;
        $self['pageURL'] = $pageURL;

        return $self;
    }
}
