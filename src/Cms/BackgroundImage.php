<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BackgroundImageShape = array{
 *   backgroundPosition: string, backgroundSize: string, imageUrl: string
 * }
 */
final class BackgroundImage implements BaseModel
{
    /** @use SdkModel<BackgroundImageShape> */
    use SdkModel;

    #[Required]
    public string $backgroundPosition;

    #[Required]
    public string $backgroundSize;

    #[Required]
    public string $imageUrl;

    /**
     * `new BackgroundImage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BackgroundImage::with(
     *   backgroundPosition: ..., backgroundSize: ..., imageUrl: ...
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
        string $imageUrl
    ): self {
        $obj = new self;

        $obj['backgroundPosition'] = $backgroundPosition;
        $obj['backgroundSize'] = $backgroundSize;
        $obj['imageUrl'] = $imageUrl;

        return $obj;
    }

    public function withBackgroundPosition(string $backgroundPosition): self
    {
        $obj = clone $this;
        $obj['backgroundPosition'] = $backgroundPosition;

        return $obj;
    }

    public function withBackgroundSize(string $backgroundSize): self
    {
        $obj = clone $this;
        $obj['backgroundSize'] = $backgroundSize;

        return $obj;
    }

    public function withImageURL(string $imageURL): self
    {
        $obj = clone $this;
        $obj['imageUrl'] = $imageURL;

        return $obj;
    }
}
