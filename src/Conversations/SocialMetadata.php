<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SocialMetadataShape = array{
 *   mediaType: string,
 *   id?: string|null,
 *   description?: string|null,
 *   mediaTitle?: string|null,
 *   mediaURL?: string|null,
 *   mediaURLString?: string|null,
 *   thumbnailURL?: string|null,
 * }
 */
final class SocialMetadata implements BaseModel
{
    /** @use SdkModel<SocialMetadataShape> */
    use SdkModel;

    #[Required]
    public string $mediaType;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $mediaTitle;

    #[Optional('mediaUrl')]
    public ?string $mediaURL;

    #[Optional('mediaUrlString')]
    public ?string $mediaURLString;

    #[Optional('thumbnailUrl')]
    public ?string $thumbnailURL;

    /**
     * `new SocialMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMetadata::with(mediaType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMetadata)->withMediaType(...)
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
     */
    public static function with(
        string $mediaType,
        ?string $id = null,
        ?string $description = null,
        ?string $mediaTitle = null,
        ?string $mediaURL = null,
        ?string $mediaURLString = null,
        ?string $thumbnailURL = null,
    ): self {
        $self = new self;

        $self['mediaType'] = $mediaType;

        null !== $id && $self['id'] = $id;
        null !== $description && $self['description'] = $description;
        null !== $mediaTitle && $self['mediaTitle'] = $mediaTitle;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $mediaURLString && $self['mediaURLString'] = $mediaURLString;
        null !== $thumbnailURL && $self['thumbnailURL'] = $thumbnailURL;

        return $self;
    }

    public function withMediaType(string $mediaType): self
    {
        $self = clone $this;
        $self['mediaType'] = $mediaType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withMediaTitle(string $mediaTitle): self
    {
        $self = clone $this;
        $self['mediaTitle'] = $mediaTitle;

        return $self;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    public function withMediaURLString(string $mediaURLString): self
    {
        $self = clone $this;
        $self['mediaURLString'] = $mediaURLString;

        return $self;
    }

    public function withThumbnailURL(string $thumbnailURL): self
    {
        $self = clone $this;
        $self['thumbnailURL'] = $thumbnailURL;

        return $self;
    }
}
