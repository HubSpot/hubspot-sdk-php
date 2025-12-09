<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Events;

use HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Create an event containing the viewers attention span details for the media.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\EventsService::createAttentionSpanEvent()
 *
 * @phpstan-type EventCreateAttentionSpanEventParamsShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   rawDataMap: array<string,int>,
 *   sessionID: string,
 *   _hsenc?: string,
 *   contactID?: int,
 *   contactUtk?: string,
 *   derivedValues?: AttentionSpanCalculatedValues|array{
 *     totalPercentPlayed: float, totalSecondsPlayed: int
 *   },
 *   externalID?: string,
 *   mediaBridgeID?: int,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   pageID?: int,
 *   pageName?: string,
 *   pageURL?: string,
 *   rawDataString?: string,
 * }
 */
final class EventCreateAttentionSpanEventParams implements BaseModel
{
    /** @use SdkModel<EventCreateAttentionSpanEventParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public int $occurredTimestamp;

    /** @var array<string,int> $rawDataMap */
    #[Required(map: 'int')]
    public array $rawDataMap;

    #[Required('sessionId')]
    public string $sessionID;

    #[Optional]
    public ?string $_hsenc;

    #[Optional('contactId')]
    public ?int $contactID;

    #[Optional]
    public ?string $contactUtk;

    #[Optional]
    public ?AttentionSpanCalculatedValues $derivedValues;

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

    #[Optional]
    public ?string $rawDataString;

    /**
     * `new EventCreateAttentionSpanEventParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventCreateAttentionSpanEventParams::with(
     *   mediaType: ..., occurredTimestamp: ..., rawDataMap: ..., sessionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventCreateAttentionSpanEventParams)
     *   ->withMediaType(...)
     *   ->withOccurredTimestamp(...)
     *   ->withRawDataMap(...)
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
     * @param array<string,int> $rawDataMap
     * @param AttentionSpanCalculatedValues|array{
     *   totalPercentPlayed: float, totalSecondsPlayed: int
     * } $derivedValues
     */
    public static function with(
        MediaType|string $mediaType,
        int $occurredTimestamp,
        array $rawDataMap,
        string $sessionID,
        ?string $_hsenc = null,
        ?int $contactID = null,
        ?string $contactUtk = null,
        AttentionSpanCalculatedValues|array|null $derivedValues = null,
        ?string $externalID = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
    ): self {
        $obj = new self;

        $obj['mediaType'] = $mediaType;
        $obj['occurredTimestamp'] = $occurredTimestamp;
        $obj['rawDataMap'] = $rawDataMap;
        $obj['sessionID'] = $sessionID;

        null !== $_hsenc && $obj['_hsenc'] = $_hsenc;
        null !== $contactID && $obj['contactID'] = $contactID;
        null !== $contactUtk && $obj['contactUtk'] = $contactUtk;
        null !== $derivedValues && $obj['derivedValues'] = $derivedValues;
        null !== $externalID && $obj['externalID'] = $externalID;
        null !== $mediaBridgeID && $obj['mediaBridgeID'] = $mediaBridgeID;
        null !== $mediaName && $obj['mediaName'] = $mediaName;
        null !== $mediaURL && $obj['mediaURL'] = $mediaURL;
        null !== $pageID && $obj['pageID'] = $pageID;
        null !== $pageName && $obj['pageName'] = $pageName;
        null !== $pageURL && $obj['pageURL'] = $pageURL;
        null !== $rawDataString && $obj['rawDataString'] = $rawDataString;

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

    /**
     * @param array<string,int> $rawDataMap
     */
    public function withRawDataMap(array $rawDataMap): self
    {
        $obj = clone $this;
        $obj['rawDataMap'] = $rawDataMap;

        return $obj;
    }

    public function withSessionID(string $sessionID): self
    {
        $obj = clone $this;
        $obj['sessionID'] = $sessionID;

        return $obj;
    }

    public function withHsenc(string $_hsenc): self
    {
        $obj = clone $this;
        $obj['_hsenc'] = $_hsenc;

        return $obj;
    }

    public function withContactID(int $contactID): self
    {
        $obj = clone $this;
        $obj['contactID'] = $contactID;

        return $obj;
    }

    public function withContactUtk(string $contactUtk): self
    {
        $obj = clone $this;
        $obj['contactUtk'] = $contactUtk;

        return $obj;
    }

    /**
     * @param AttentionSpanCalculatedValues|array{
     *   totalPercentPlayed: float, totalSecondsPlayed: int
     * } $derivedValues
     */
    public function withDerivedValues(
        AttentionSpanCalculatedValues|array $derivedValues
    ): self {
        $obj = clone $this;
        $obj['derivedValues'] = $derivedValues;

        return $obj;
    }

    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj['externalID'] = $externalID;

        return $obj;
    }

    public function withMediaBridgeID(int $mediaBridgeID): self
    {
        $obj = clone $this;
        $obj['mediaBridgeID'] = $mediaBridgeID;

        return $obj;
    }

    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['mediaName'] = $mediaName;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaURL'] = $mediaURL;

        return $obj;
    }

    public function withPageID(int $pageID): self
    {
        $obj = clone $this;
        $obj['pageID'] = $pageID;

        return $obj;
    }

    public function withPageName(string $pageName): self
    {
        $obj = clone $this;
        $obj['pageName'] = $pageName;

        return $obj;
    }

    public function withPageURL(string $pageURL): self
    {
        $obj = clone $this;
        $obj['pageURL'] = $pageURL;

        return $obj;
    }

    public function withRawDataString(string $rawDataString): self
    {
        $obj = clone $this;
        $obj['rawDataString'] = $rawDataString;

        return $obj;
    }
}
