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
     * @param Angle|array{units: string, value: float} $angle
     * @param list<ColorStop|array{color: RgbaColor}> $colors
     * @param SideOrCorner|array{
     *   horizontalSide: string, verticalSide: string
     * } $sideOrCorner
     */
    public static function with(
        Angle|array $angle,
        array $colors,
        SideOrCorner|array $sideOrCorner
    ): self {
        $obj = new self;

        $obj['angle'] = $angle;
        $obj['colors'] = $colors;
        $obj['sideOrCorner'] = $sideOrCorner;

        return $obj;
    }

    /**
     * @param Angle|array{units: string, value: float} $angle
     */
    public function withAngle(Angle|array $angle): self
    {
        $obj = clone $this;
        $obj['angle'] = $angle;

        return $obj;
    }

    /**
     * @param list<ColorStop|array{color: RgbaColor}> $colors
     */
    public function withColors(array $colors): self
    {
        $obj = clone $this;
        $obj['colors'] = $colors;

        return $obj;
    }

    /**
     * @param SideOrCorner|array{
     *   horizontalSide: string, verticalSide: string
     * } $sideOrCorner
     */
    public function withSideOrCorner(SideOrCorner|array $sideOrCorner): self
    {
        $obj = clone $this;
        $obj['sideOrCorner'] = $sideOrCorner;

        return $obj;
    }
}
