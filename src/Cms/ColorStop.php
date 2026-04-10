<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RgbaColorShape from \HubSpotSDK\Cms\RgbaColor
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
