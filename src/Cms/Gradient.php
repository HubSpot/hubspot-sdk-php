<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type GradientShape = array{
 *   angle: Angle, colors: list<ColorStop>, sideOrCorner: SideOrCorner
 * }
 */
final class Gradient implements BaseModel
{
    /** @use SdkModel<GradientShape> */
    use SdkModel;

    #[Api]
    public Angle $angle;

    /** @var list<ColorStop> $colors */
    #[Api(list: ColorStop::class)]
    public array $colors;

    #[Api]
    public SideOrCorner $sideOrCorner;

    /**
     * `new Gradient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Gradient::with(angle: ..., colors: ..., sideOrCorner: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Gradient)->withAngle(...)->withColors(...)->withSideOrCorner(...)
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
     * @param list<ColorStop> $colors
     */
    public static function with(
        Angle $angle,
        array $colors,
        SideOrCorner $sideOrCorner
    ): self {
        $obj = new self;

        $obj->angle = $angle;
        $obj->colors = $colors;
        $obj->sideOrCorner = $sideOrCorner;

        return $obj;
    }

    public function withAngle(Angle $angle): self
    {
        $obj = clone $this;
        $obj->angle = $angle;

        return $obj;
    }

    /**
     * @param list<ColorStop> $colors
     */
    public function withColors(array $colors): self
    {
        $obj = clone $this;
        $obj->colors = $colors;

        return $obj;
    }

    public function withSideOrCorner(SideOrCorner $sideOrCorner): self
    {
        $obj = clone $this;
        $obj->sideOrCorner = $sideOrCorner;

        return $obj;
    }
}
