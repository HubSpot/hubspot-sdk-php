<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BackgroundImageShape = array{
 *   backgroundPosition: string, backgroundSize: string, imageURL: string
 * }
 */
final class BackgroundImage implements BaseModel
{
    /** @use SdkModel<BackgroundImageShape> */
    use SdkModel;

    /**
     * Defines the position of the background image.
     */
    #[Required]
    public string $backgroundPosition;

    /**
     * Specifies the size of the background image.
     */
    #[Required]
    public string $backgroundSize;

    /**
     * The URL of the background image.
     */
    #[Required('imageUrl')]
    public string $imageURL;

    /**
     * `new BackgroundImage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BackgroundImage::with(
     *   backgroundPosition: ..., backgroundSize: ..., imageURL: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BackgroundImage)
     *   ->withBackgroundPosition(...)
     *   ->withBackgroundSize(...)
     *   ->withImageURL(...)
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
        string $backgroundPosition,
        string $backgroundSize,
        string $imageURL
    ): self {
        $self = new self;

        $self['backgroundPosition'] = $backgroundPosition;
        $self['backgroundSize'] = $backgroundSize;
        $self['imageURL'] = $imageURL;

        return $self;
    }

    /**
     * Defines the position of the background image.
     */
    public function withBackgroundPosition(string $backgroundPosition): self
    {
        $self = clone $this;
        $self['backgroundPosition'] = $backgroundPosition;

        return $self;
    }

    /**
     * Specifies the size of the background image.
     */
    public function withBackgroundSize(string $backgroundSize): self
    {
        $self = clone $this;
        $self['backgroundSize'] = $backgroundSize;

        return $self;
    }

    /**
     * The URL of the background image.
     */
    public function withImageURL(string $imageURL): self
    {
        $self = clone $this;
        $self['imageURL'] = $imageURL;

        return $self;
    }
}
