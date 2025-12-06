<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ColorStopShape = array{color: RgbaColor}
 */
final class ColorStop implements BaseModel
{
    /** @use SdkModel<ColorStopShape> */
    use SdkModel;

    /**
     * A color defined by RGB values.
     */
    #[Api]
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
     * @param RgbaColor|array{a: float, b: int, g: int, r: int} $color
     */
    public static function with(RgbaColor|array $color): self
    {
        $obj = new self;

        $obj['color'] = $color;

        return $obj;
    }

    /**
     * A color defined by RGB values.
     *
     * @param RgbaColor|array{a: float, b: int, g: int, r: int} $color
     */
    public function withColor(RgbaColor|array $color): self
    {
        $obj = clone $this;
        $obj['color'] = $color;

        return $obj;
    }
}
