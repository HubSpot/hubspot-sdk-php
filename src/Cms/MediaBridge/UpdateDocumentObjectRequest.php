<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\UpdateDocumentObjectRequest\MediaType;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdateDocumentObjectRequestShape = array{
 *   mediaType: MediaType|value-of<MediaType>,
 *   detailsPageLink?: string|null,
 *   duration?: int|null,
 *   externalID?: string|null,
 *   fileURL?: string|null,
 *   oembedURL?: string|null,
 *   posterURL?: string|null,
 *   thumbnailURL?: string|null,
 *   title?: string|null,
 * }
 */
final class UpdateDocumentObjectRequest implements BaseModel
{
    /** @use SdkModel<UpdateDocumentObjectRequestShape> */
    use SdkModel;

    /** @var value-of<MediaType> $mediaType */
    #[Required(enum: MediaType::class)]
    public string $mediaType;

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
    public ?string $title;

    /**
     * `new UpdateDocumentObjectRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdateDocumentObjectRequest::with(mediaType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdateDocumentObjectRequest)->withMediaType(...)
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
        MediaType|string $mediaType = 'DOCUMENT',
        ?string $detailsPageLink = null,
        ?int $duration = null,
        ?string $externalID = null,
        ?string $fileURL = null,
        ?string $oembedURL = null,
        ?string $posterURL = null,
        ?string $thumbnailURL = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['mediaType'] = $mediaType;

        null !== $detailsPageLink && $self['detailsPageLink'] = $detailsPageLink;
        null !== $duration && $self['duration'] = $duration;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $fileURL && $self['fileURL'] = $fileURL;
        null !== $oembedURL && $self['oembedURL'] = $oembedURL;
        null !== $posterURL && $self['posterURL'] = $posterURL;
        null !== $thumbnailURL && $self['thumbnailURL'] = $thumbnailURL;
        null !== $title && $self['title'] = $title;

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

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
