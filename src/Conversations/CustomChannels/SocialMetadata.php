<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SocialMetadataShape = array{
 *   mediaType: string,
 *   id?: string|null,
 *   description?: string|null,
 *   mediaTitle?: string|null,
 *   mediaUrl?: string|null,
 *   mediaUrlString?: string|null,
 *   thumbnailUrl?: string|null,
 * }
 */
final class SocialMetadata implements BaseModel
{
    /** @use SdkModel<SocialMetadataShape> */
    use SdkModel;

    #[Api]
    public string $mediaType;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $mediaTitle;

    #[Api(optional: true)]
    public ?string $mediaUrl;

    #[Api(optional: true)]
    public ?string $mediaUrlString;

    #[Api(optional: true)]
    public ?string $thumbnailUrl;

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
        ?string $mediaUrl = null,
        ?string $mediaUrlString = null,
        ?string $thumbnailUrl = null,
    ): self {
        $obj = new self;

        $obj->mediaType = $mediaType;

        null !== $id && $obj->id = $id;
        null !== $description && $obj->description = $description;
        null !== $mediaTitle && $obj->mediaTitle = $mediaTitle;
        null !== $mediaUrl && $obj->mediaUrl = $mediaUrl;
        null !== $mediaUrlString && $obj->mediaUrlString = $mediaUrlString;
        null !== $thumbnailUrl && $obj->thumbnailUrl = $thumbnailUrl;

        return $obj;
    }

    public function withMediaType(string $mediaType): self
    {
        $obj = clone $this;
        $obj->mediaType = $mediaType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withMediaTitle(string $mediaTitle): self
    {
        $obj = clone $this;
        $obj->mediaTitle = $mediaTitle;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaUrl = $mediaURL;

        return $obj;
    }

    public function withMediaURLString(string $mediaURLString): self
    {
        $obj = clone $this;
        $obj->mediaUrlString = $mediaURLString;

        return $obj;
    }

    public function withThumbnailURL(string $thumbnailURL): self
    {
        $obj = clone $this;
        $obj->thumbnailUrl = $thumbnailURL;

        return $obj;
    }
}
