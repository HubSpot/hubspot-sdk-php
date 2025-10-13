<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type styles_alias = array{
 *   backgroundColor: RgbaColor,
 *   backgroundGradient: Gradient,
 *   backgroundImage: BackgroundImage,
 *   flexboxPositioning: string,
 *   forceFullWidthSection: bool,
 *   maxWidthSectionCentering: int,
 *   verticalAlignment: string,
 *   breakpointStyles?: array<string, BreakpointStyles>,
 * }
 */
final class Styles implements BaseModel
{
    /** @use SdkModel<styles_alias> */
    use SdkModel;

    /**
     * A color defined by RGB values.
     */
    #[Api]
    public RgbaColor $backgroundColor;

    #[Api]
    public Gradient $backgroundGradient;

    #[Api]
    public BackgroundImage $backgroundImage;

    #[Api]
    public string $flexboxPositioning;

    #[Api]
    public bool $forceFullWidthSection;

    #[Api]
    public int $maxWidthSectionCentering;

    #[Api]
    public string $verticalAlignment;

    /** @var array<string, BreakpointStyles>|null $breakpointStyles */
    #[Api(map: BreakpointStyles::class, optional: true)]
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
     * @param array<string, BreakpointStyles> $breakpointStyles
     */
    public static function with(
        RgbaColor $backgroundColor,
        Gradient $backgroundGradient,
        BackgroundImage $backgroundImage,
        string $flexboxPositioning,
        bool $forceFullWidthSection,
        int $maxWidthSectionCentering,
        string $verticalAlignment,
        ?array $breakpointStyles = null,
    ): self {
        $obj = new self;

        $obj->backgroundColor = $backgroundColor;
        $obj->backgroundGradient = $backgroundGradient;
        $obj->backgroundImage = $backgroundImage;
        $obj->flexboxPositioning = $flexboxPositioning;
        $obj->forceFullWidthSection = $forceFullWidthSection;
        $obj->maxWidthSectionCentering = $maxWidthSectionCentering;
        $obj->verticalAlignment = $verticalAlignment;

        null !== $breakpointStyles && $obj->breakpointStyles = $breakpointStyles;

        return $obj;
    }

    /**
     * A color defined by RGB values.
     */
    public function withBackgroundColor(RgbaColor $backgroundColor): self
    {
        $obj = clone $this;
        $obj->backgroundColor = $backgroundColor;

        return $obj;
    }

    public function withBackgroundGradient(Gradient $backgroundGradient): self
    {
        $obj = clone $this;
        $obj->backgroundGradient = $backgroundGradient;

        return $obj;
    }

    public function withBackgroundImage(BackgroundImage $backgroundImage): self
    {
        $obj = clone $this;
        $obj->backgroundImage = $backgroundImage;

        return $obj;
    }

    public function withFlexboxPositioning(string $flexboxPositioning): self
    {
        $obj = clone $this;
        $obj->flexboxPositioning = $flexboxPositioning;

        return $obj;
    }

    public function withForceFullWidthSection(bool $forceFullWidthSection): self
    {
        $obj = clone $this;
        $obj->forceFullWidthSection = $forceFullWidthSection;

        return $obj;
    }

    public function withMaxWidthSectionCentering(
        int $maxWidthSectionCentering
    ): self {
        $obj = clone $this;
        $obj->maxWidthSectionCentering = $maxWidthSectionCentering;

        return $obj;
    }

    public function withVerticalAlignment(string $verticalAlignment): self
    {
        $obj = clone $this;
        $obj->verticalAlignment = $verticalAlignment;

        return $obj;
    }

    /**
     * @param array<string, BreakpointStyles> $breakpointStyles
     */
    public function withBreakpointStyles(array $breakpointStyles): self
    {
        $obj = clone $this;
        $obj->breakpointStyles = $breakpointStyles;

        return $obj;
    }
}
