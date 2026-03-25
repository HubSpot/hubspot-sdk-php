<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaBridgeObject\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type VideoObjectShape from \HubspotSDK\Cms\MediaBridge\VideoObject
 *
 * @phpstan-type MediaBridgeObjectShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   mediaType: MediaType|value-of<MediaType>,
 *   title: string,
 *   updatedAt: \DateTimeInterface,
 *   detailsPageLink?: string|null,
 *   duration?: int|null,
 *   externalID?: string|null,
 *   fileURL?: string|null,
 *   oembedURL?: string|null,
 *   posterURL?: string|null,
 *   thumbnailURL?: string|null,
 *   video?: null|VideoObject|VideoObjectShape,
 * }
 */
final class MediaBridgeObject implements BaseModel
{
    /** @use SdkModel<MediaBridgeObjectShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

    #[Required]
    public string $title;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $detailsPageLink;

    #[Optional]
    public ?int $duration;

    #[Optional('externalId')]
    public ?string $externalID;

    #[Optional('fileUrl')]
    public ?string $fileURL;

    #[Optional('oembedUrl')]
    public ?string $oembedURL;

    #[Optional('posterUrl')]
    public ?string $posterURL;

    #[Optional('thumbnailUrl')]
    public ?string $thumbnailURL;

    #[Optional]
    public ?VideoObject $video;

    /**
     * `new MediaBridgeObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeObject::with(
     *   id: ..., createdAt: ..., mediaType: ..., title: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeObject)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withMediaType(...)
     *   ->withTitle(...)
     *   ->withUpdatedAt(...)
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
     * @param VideoObject|VideoObjectShape|null $video
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        MediaType|string $mediaType,
        string $title,
        \DateTimeInterface $updatedAt,
        ?string $detailsPageLink = null,
        ?int $duration = null,
        ?string $externalID = null,
        ?string $fileURL = null,
        ?string $oembedURL = null,
        ?string $posterURL = null,
        ?string $thumbnailURL = null,
        VideoObject|array|null $video = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['mediaType'] = $mediaType;
        $self['title'] = $title;
        $self['updatedAt'] = $updatedAt;

        null !== $detailsPageLink && $self['detailsPageLink'] = $detailsPageLink;
        null !== $duration && $self['duration'] = $duration;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $fileURL && $self['fileURL'] = $fileURL;
        null !== $oembedURL && $self['oembedURL'] = $oembedURL;
        null !== $posterURL && $self['posterURL'] = $posterURL;
        null !== $thumbnailURL && $self['thumbnailURL'] = $thumbnailURL;
        null !== $video && $self['video'] = $video;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withDetailsPageLink(string $detailsPageLink): self
    {
        $self = clone $this;
        $self['detailsPageLink'] = $detailsPageLink;

        return $self;
    }

    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    public function withExternalID(string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }

    public function withFileURL(string $fileURL): self
    {
        $self = clone $this;
        $self['fileURL'] = $fileURL;

        return $self;
    }

    public function withOembedURL(string $oembedURL): self
    {
        $self = clone $this;
        $self['oembedURL'] = $oembedURL;

        return $self;
    }

    public function withPosterURL(string $posterURL): self
    {
        $self = clone $this;
        $self['posterURL'] = $posterURL;

        return $self;
    }

    public function withThumbnailURL(string $thumbnailURL): self
    {
        $self = clone $this;
        $self['thumbnailURL'] = $thumbnailURL;

        return $self;
    }

    /**
     * @param VideoObject|VideoObjectShape $video
     */
    public function withVideo(VideoObject|array $video): self
    {
        $self = clone $this;
        $self['video'] = $video;

        return $self;
    }
}
