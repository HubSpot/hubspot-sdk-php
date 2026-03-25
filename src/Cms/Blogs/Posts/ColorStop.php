<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RgbaColorShape from \HubspotSDK\Cms\Blogs\Posts\RgbaColor
 *
 * @phpstan-type ColorStopShape = array{color: RgbaColor|RgbaColorShape}
 */
final class ColorStop implements BaseModel
{
    /** @use SdkModel<ColorStopShape> */
    use SdkModel;

    #[Required]
    public RgbaColor $color;

    /**
     * `new ColorStop()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ColorStop::with(color: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ColorStop)->withColor(...)
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
     * @param RgbaColor|RgbaColorShape $color
     */
    public static function with(RgbaColor|array $color): self
    {
        $self = new self;

        $self['color'] = $color;

        return $self;
    }

    /**
     * @param RgbaColor|RgbaColorShape $color
     */
    public function withColor(RgbaColor|array $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }
}
