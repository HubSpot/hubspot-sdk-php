<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AngleShape from \HubspotSDK\Cms\Blogs\Posts\Angle
 * @phpstan-import-type ColorStopShape from \HubspotSDK\Cms\Blogs\Posts\ColorStop
 * @phpstan-import-type SideOrCornerShape from \HubspotSDK\Cms\Blogs\Posts\SideOrCorner
 *
 * @phpstan-type GradientShape = array{
 *   angle: Angle|AngleShape,
 *   colors: list<ColorStop|ColorStopShape>,
 *   sideOrCorner: SideOrCorner|SideOrCornerShape,
 * }
 */
final class Gradient implements BaseModel
{
    /** @use SdkModel<GradientShape> */
    use SdkModel;

    #[Required]
    public Angle $angle;

    /** @var list<ColorStop> $colors */
    #[Required(list: ColorStop::class)]
    public array $colors;

    #[Required]
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
     * @param Angle|AngleShape $angle
     * @param list<ColorStop|ColorStopShape> $colors
     * @param SideOrCorner|SideOrCornerShape $sideOrCorner
     */
    public static function with(
        Angle|array $angle,
        array $colors,
        SideOrCorner|array $sideOrCorner
    ): self {
        $self = new self;

        $self['angle'] = $angle;
        $self['colors'] = $colors;
        $self['sideOrCorner'] = $sideOrCorner;

        return $self;
    }

    /**
     * @param Angle|AngleShape $angle
     */
    public function withAngle(Angle|array $angle): self
    {
        $self = clone $this;
        $self['angle'] = $angle;

        return $self;
    }

    /**
     * @param list<ColorStop|ColorStopShape> $colors
     */
    public function withColors(array $colors): self
    {
        $self = clone $this;
        $self['colors'] = $colors;

        return $self;
    }

    /**
     * @param SideOrCorner|SideOrCornerShape $sideOrCorner
     */
    public function withSideOrCorner(SideOrCorner|array $sideOrCorner): self
    {
        $self = clone $this;
        $self['sideOrCorner'] = $sideOrCorner;

        return $self;
    }
}
