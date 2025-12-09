<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type StylesShape = array{
 *   backgroundColor: RgbaColor,
 *   backgroundGradient: Gradient,
 *   backgroundImage: BackgroundImage,
 *   flexboxPositioning: string,
 *   forceFullWidthSection: bool,
 *   maxWidthSectionCentering: int,
 *   verticalAlignment: string,
 *   breakpointStyles?: array<string,BreakpointStyles>|null,
 * }
 */
final class Styles implements BaseModel
{
    /** @use SdkModel<StylesShape> */
    use SdkModel;

    /**
     * A color defined by RGB values.
     */
    #[Required]
    public RgbaColor $backgroundColor;

    #[Required]
    public Gradient $backgroundGradient;

    #[Required]
    public BackgroundImage $backgroundImage;

    #[Required]
    public string $flexboxPositioning;

    #[Required]
    public bool $forceFullWidthSection;

    #[Required]
    public int $maxWidthSectionCentering;

    #[Required]
    public string $verticalAlignment;

    /** @var array<string,BreakpointStyles>|null $breakpointStyles */
    #[Optional(map: BreakpointStyles::class)]
    public ?array $breakpointStyles;

    /**
     * `new Styles()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Styles::with(
     *   backgroundColor: ...,
     *   backgroundGradient: ...,
     *   backgroundImage: ...,
     *   flexboxPositioning: ...,
     *   forceFullWidthSection: ...,
     *   maxWidthSectionCentering: ...,
     *   verticalAlignment: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Styles)
     *   ->withBackgroundColor(...)
     *   ->withBackgroundGradient(...)
     *   ->withBackgroundImage(...)
     *   ->withFlexboxPositioning(...)
     *   ->withForceFullWidthSection(...)
     *   ->withMaxWidthSectionCentering(...)
     *   ->withVerticalAlignment(...)
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
     * @param RgbaColor|array{a: float, b: int, g: int, r: int} $backgroundColor
     * @param Gradient|array{
     *   angle: Angle, colors: list<ColorStop>, sideOrCorner: SideOrCorner
     * } $backgroundGradient
     * @param BackgroundImage|array{
     *   backgroundPosition: string, backgroundSize: string, imageUrl: string
     * } $backgroundImage
     * @param array<string,BreakpointStyles|array{
     *   hidden: bool, margin: mixed, padding: mixed
     * }> $breakpointStyles
     */
    public static function with(
        RgbaColor|array $backgroundColor,
        Gradient|array $backgroundGradient,
        BackgroundImage|array $backgroundImage,
        string $flexboxPositioning,
        bool $forceFullWidthSection,
        int $maxWidthSectionCentering,
        string $verticalAlignment,
        ?array $breakpointStyles = null,
    ): self {
        $obj = new self;

        $obj['backgroundColor'] = $backgroundColor;
        $obj['backgroundGradient'] = $backgroundGradient;
        $obj['backgroundImage'] = $backgroundImage;
        $obj['flexboxPositioning'] = $flexboxPositioning;
        $obj['forceFullWidthSection'] = $forceFullWidthSection;
        $obj['maxWidthSectionCentering'] = $maxWidthSectionCentering;
        $obj['verticalAlignment'] = $verticalAlignment;

        null !== $breakpointStyles && $obj['breakpointStyles'] = $breakpointStyles;

        return $obj;
    }

    /**
     * A color defined by RGB values.
     *
     * @param RgbaColor|array{a: float, b: int, g: int, r: int} $backgroundColor
     */
    public function withBackgroundColor(RgbaColor|array $backgroundColor): self
    {
        $obj = clone $this;
        $obj['backgroundColor'] = $backgroundColor;

        return $obj;
    }

    /**
     * @param Gradient|array{
     *   angle: Angle, colors: list<ColorStop>, sideOrCorner: SideOrCorner
     * } $backgroundGradient
     */
    public function withBackgroundGradient(
        Gradient|array $backgroundGradient
    ): self {
        $obj = clone $this;
        $obj['backgroundGradient'] = $backgroundGradient;

        return $obj;
    }

    /**
     * @param BackgroundImage|array{
     *   backgroundPosition: string, backgroundSize: string, imageUrl: string
     * } $backgroundImage
     */
    public function withBackgroundImage(
        BackgroundImage|array $backgroundImage
    ): self {
        $obj = clone $this;
        $obj['backgroundImage'] = $backgroundImage;

        return $obj;
    }

    public function withFlexboxPositioning(string $flexboxPositioning): self
    {
        $obj = clone $this;
        $obj['flexboxPositioning'] = $flexboxPositioning;

        return $obj;
    }

    public function withForceFullWidthSection(bool $forceFullWidthSection): self
    {
        $obj = clone $this;
        $obj['forceFullWidthSection'] = $forceFullWidthSection;

        return $obj;
    }

    public function withMaxWidthSectionCentering(
        int $maxWidthSectionCentering
    ): self {
        $obj = clone $this;
        $obj['maxWidthSectionCentering'] = $maxWidthSectionCentering;

        return $obj;
    }

    public function withVerticalAlignment(string $verticalAlignment): self
    {
        $obj = clone $this;
        $obj['verticalAlignment'] = $verticalAlignment;

        return $obj;
    }

    /**
     * @param array<string,BreakpointStyles|array{
     *   hidden: bool, margin: mixed, padding: mixed
     * }> $breakpointStyles
     */
    public function withBreakpointStyles(array $breakpointStyles): self
    {
        $obj = clone $this;
        $obj['breakpointStyles'] = $breakpointStyles;

        return $obj;
    }
}
