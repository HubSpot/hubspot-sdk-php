<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms;

use HubSpotSDK\Cms\Styles\FlexboxPositioning;
use HubSpotSDK\Cms\Styles\VerticalAlignment;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RgbaColorShape from \HubSpotSDK\Cms\RgbaColor
 * @phpstan-import-type GradientShape from \HubSpotSDK\Cms\Gradient
 * @phpstan-import-type BackgroundImageShape from \HubSpotSDK\Cms\BackgroundImage
 * @phpstan-import-type BreakpointStylesShape from \HubSpotSDK\Cms\BreakpointStyles
 *
 * @phpstan-type StylesShape = array{
 *   backgroundColor: RgbaColor|RgbaColorShape,
 *   backgroundGradient: Gradient|GradientShape,
 *   backgroundImage: BackgroundImage|BackgroundImageShape,
 *   flexboxPositioning: FlexboxPositioning|value-of<FlexboxPositioning>,
 *   forceFullWidthSection: bool,
 *   maxWidthSectionCentering: int,
 *   verticalAlignment: VerticalAlignment|value-of<VerticalAlignment>,
 *   breakpointStyles?: array<string,BreakpointStyles|BreakpointStylesShape>|null,
 * }
 */
final class Styles implements BaseModel
{
    /** @use SdkModel<StylesShape> */
    use SdkModel;

    #[Required]
    public RgbaColor $backgroundColor;

    #[Required]
    public Gradient $backgroundGradient;

    #[Required]
    public BackgroundImage $backgroundImage;

    /**
     * Indicates whether flexbox positioning is enabled for the section.
     *
     * @var value-of<FlexboxPositioning> $flexboxPositioning
     */
    #[Required(enum: FlexboxPositioning::class)]
    public string $flexboxPositioning;

    /**
     * Determines if the section should be forced to full width.
     */
    #[Required]
    public bool $forceFullWidthSection;

    /**
     * Defines the maximum width for centering the section.
     */
    #[Required]
    public int $maxWidthSectionCentering;

    /**
     * Specifies the vertical alignment of elements within the section.
     *
     * @var value-of<VerticalAlignment> $verticalAlignment
     */
    #[Required(enum: VerticalAlignment::class)]
    public string $verticalAlignment;

    /**
     * Breakpoint CSS styles for margin, padding, etc...
     *
     * @var array<string,BreakpointStyles>|null $breakpointStyles
     */
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
     * @param RgbaColor|RgbaColorShape $backgroundColor
     * @param Gradient|GradientShape $backgroundGradient
     * @param BackgroundImage|BackgroundImageShape $backgroundImage
     * @param FlexboxPositioning|value-of<FlexboxPositioning> $flexboxPositioning
     * @param VerticalAlignment|value-of<VerticalAlignment> $verticalAlignment
     * @param array<string,BreakpointStyles|BreakpointStylesShape>|null $breakpointStyles
     */
    public static function with(
        RgbaColor|array $backgroundColor,
        Gradient|array $backgroundGradient,
        BackgroundImage|array $backgroundImage,
        FlexboxPositioning|string $flexboxPositioning,
        bool $forceFullWidthSection,
        int $maxWidthSectionCentering,
        VerticalAlignment|string $verticalAlignment,
        ?array $breakpointStyles = null,
    ): self {
        $self = new self;

        $self['backgroundColor'] = $backgroundColor;
        $self['backgroundGradient'] = $backgroundGradient;
        $self['backgroundImage'] = $backgroundImage;
        $self['flexboxPositioning'] = $flexboxPositioning;
        $self['forceFullWidthSection'] = $forceFullWidthSection;
        $self['maxWidthSectionCentering'] = $maxWidthSectionCentering;
        $self['verticalAlignment'] = $verticalAlignment;

        null !== $breakpointStyles && $self['breakpointStyles'] = $breakpointStyles;

        return $self;
    }

    /**
     * @param RgbaColor|RgbaColorShape $backgroundColor
     */
    public function withBackgroundColor(RgbaColor|array $backgroundColor): self
    {
        $self = clone $this;
        $self['backgroundColor'] = $backgroundColor;

        return $self;
    }

    /**
     * @param Gradient|GradientShape $backgroundGradient
     */
    public function withBackgroundGradient(
        Gradient|array $backgroundGradient
    ): self {
        $self = clone $this;
        $self['backgroundGradient'] = $backgroundGradient;

        return $self;
    }

    /**
     * @param BackgroundImage|BackgroundImageShape $backgroundImage
     */
    public function withBackgroundImage(
        BackgroundImage|array $backgroundImage
    ): self {
        $self = clone $this;
        $self['backgroundImage'] = $backgroundImage;

        return $self;
    }

    /**
     * Indicates whether flexbox positioning is enabled for the section.
     *
     * @param FlexboxPositioning|value-of<FlexboxPositioning> $flexboxPositioning
     */
    public function withFlexboxPositioning(
        FlexboxPositioning|string $flexboxPositioning
    ): self {
        $self = clone $this;
        $self['flexboxPositioning'] = $flexboxPositioning;

        return $self;
    }

    /**
     * Determines if the section should be forced to full width.
     */
    public function withForceFullWidthSection(bool $forceFullWidthSection): self
    {
        $self = clone $this;
        $self['forceFullWidthSection'] = $forceFullWidthSection;

        return $self;
    }

    /**
     * Defines the maximum width for centering the section.
     */
    public function withMaxWidthSectionCentering(
        int $maxWidthSectionCentering
    ): self {
        $self = clone $this;
        $self['maxWidthSectionCentering'] = $maxWidthSectionCentering;

        return $self;
    }

    /**
     * Specifies the vertical alignment of elements within the section.
     *
     * @param VerticalAlignment|value-of<VerticalAlignment> $verticalAlignment
     */
    public function withVerticalAlignment(
        VerticalAlignment|string $verticalAlignment
    ): self {
        $self = clone $this;
        $self['verticalAlignment'] = $verticalAlignment;

        return $self;
    }

    /**
     * Breakpoint CSS styles for margin, padding, etc...
     *
     * @param array<string,BreakpointStyles|BreakpointStylesShape> $breakpointStyles
     */
    public function withBreakpointStyles(array $breakpointStyles): self
    {
        $self = clone $this;
        $self['breakpointStyles'] = $breakpointStyles;

        return $self;
    }
}
