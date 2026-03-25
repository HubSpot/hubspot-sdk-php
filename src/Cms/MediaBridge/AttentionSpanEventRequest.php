<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AttentionSpanEventRequest\ExternalPlayContext;
use HubspotSDK\Cms\MediaBridge\AttentionSpanEventRequest\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttentionSpanCalculatedValuesShape from \HubspotSDK\Cms\MediaBridge\AttentionSpanCalculatedValues
 *
 * @phpstan-type AttentionSpanEventRequestShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   occurredTimestamp: int,
 *   rawDataMap: array<string,int>,
 *   sessionID: string,
 *   _hsenc?: string|null,
 *   contactID?: int|null,
 *   contactUtk?: string|null,
 *   derivedValues?: null|AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape,
 *   externalID?: string|null,
 *   externalPlayContext?: null|ExternalPlayContext|value-of<ExternalPlayContext>,
 *   mediaBridgeID?: int|null,
 *   mediaName?: string|null,
 *   mediaURL?: string|null,
 *   pageID?: int|null,
 *   pageName?: string|null,
 *   pageURL?: string|null,
 *   rawDataString?: string|null,
 * }
 */
final class AttentionSpanEventRequest implements BaseModel
{
    /** @use SdkModel<AttentionSpanEventRequestShape> */
    use SdkModel;

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

    /** @var value-of<ExternalPlayContext>|null $externalPlayContext */
    #[Optional(enum: ExternalPlayContext::class)]
    public ?string $externalPlayContext;

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
     * `new AttentionSpanEventRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AttentionSpanEventRequest::with(
     *   mediaType: ..., occurredTimestamp: ..., rawDataMap: ..., sessionID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AttentionSpanEventRequest)
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
     * @param AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape|null $derivedValues
     * @param ExternalPlayContext|value-of<ExternalPlayContext>|null $externalPlayContext
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
        ExternalPlayContext|string|null $externalPlayContext = null,
        ?int $mediaBridgeID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?int $pageID = null,
        ?string $pageName = null,
        ?string $pageURL = null,
        ?string $rawDataString = null,
    ): self {
        $self = new self;

        $self['mediaType'] = $mediaType;
        $self['occurredTimestamp'] = $occurredTimestamp;
        $self['rawDataMap'] = $rawDataMap;
        $self['sessionID'] = $sessionID;

        null !== $_hsenc && $self['_hsenc'] = $_hsenc;
        null !== $contactID && $self['contactID'] = $contactID;
        null !== $contactUtk && $self['contactUtk'] = $contactUtk;
        null !== $derivedValues && $self['derivedValues'] = $derivedValues;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $externalPlayContext && $self['externalPlayContext'] = $externalPlayContext;
        null !== $mediaBridgeID && $self['mediaBridgeID'] = $mediaBridgeID;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $pageID && $self['pageID'] = $pageID;
        null !== $pageName && $self['pageName'] = $pageName;
        null !== $pageURL && $self['pageURL'] = $pageURL;
        null !== $rawDataString && $self['rawDataString'] = $rawDataString;

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

    /**
     * @param array<string,int> $rawDataMap
     */
    public function withRawDataMap(array $rawDataMap): self
    {
        $self = clone $this;
        $self['rawDataMap'] = $rawDataMap;

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

    /**
     * @param AttentionSpanCalculatedValues|AttentionSpanCalculatedValuesShape $derivedValues
     */
    public function withDerivedValues(
        AttentionSpanCalculatedValues|array $derivedValues
    ): self {
        $self = clone $this;
        $self['derivedValues'] = $derivedValues;

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

    public function withRawDataString(string $rawDataString): self
    {
        $self = clone $this;
        $self['rawDataString'] = $rawDataString;

        return $self;
    }
}
