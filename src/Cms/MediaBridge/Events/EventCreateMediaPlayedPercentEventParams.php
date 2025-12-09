<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Events;

use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create an event representing a user reaching quarterly milestones in a piece of media they're viewing.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\EventsService::createMediaPlayedPercentEvent()
 *
 * @phpstan-type EventCreateMediaPlayedPercentEventParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   playedPercent: int,
 *   sessionID: string,
 *   _hsenc?: string,
 *   contactID?: int,
 *   contactUtk?: string,
 *   externalID?: string,
 *   mediaBridgeID?: int,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   pageID?: int,
 *   pageName?: string,
 *   pageURL?: string,
 * }
 */
final class EventCreateMediaPlayedPercentEventParams implements BaseModel
{
    /** @use SdkModel<EventCreateMediaPlayedPercentEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public int $occurredTimestamp;

    #[Required]
    public int $playedPercent;

    #[Required('sessionId')]
    public string $sessionID;

    #[Optional]
    public ?string $_hsenc;

    #[Optional('contactId')]
    public ?int $contactID;

    #[Optional]
    public ?string $contactUtk;

    #[Optional('externalId')]
    public ?string $externalID;

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
     * `new EventCreateMediaPlayedPercentEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateMediaPlayedPercentEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., playedPercent: ..., sessionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreateMediaPlayedPercentEventParams)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withPlayedPercent(...)
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
        MediaType|string $mediaType,
        int $occurredTimestamp,
        int $playedPercent,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        ?string $externalID = null,
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
        $self['playedPercent'] = $playedPercent;
        $self['sessionID'] = $sessionID;

        null !== $_hsenc && $self['_hsenc'] = $_hsenc;
        null !== $contactID && $self['contactID'] = $contactID;
        null !== $contactUtk && $self['contactUtk'] = $contactUtk;
        null !== $externalID && $self['externalID'] = $externalID;
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

    public function withPlayedPercent(int $playedPercent): self
    {
        $self = clone $this;
        $self['playedPercent'] = $playedPercent;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

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
