<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RgbaColorShape from \HubspotSDK\Cms\RgbaColor
 * @phpstan-import-type GradientShape from \HubspotSDK\Cms\Gradient
 * @phpstan-import-type BackgroundImageShape from \HubspotSDK\Cms\BackgroundImage
 * @phpstan-import-type BreakpointStylesShape from \HubspotSDK\Cms\BreakpointStyles
 *
 * @phpstan-type StylesShape = array{
 *   backgroundColor: RgbaColor|RgbaColorShape,
 *   backgroundGradient: Gradient|GradientShape,
 *   backgroundImage: BackgroundImage|BackgroundImageShape,
 *   flexboxPositioning: string,
 *   forceFullWidthSection: bool,
 *   maxWidthSectionCentering: int,
 *   verticalAlignment: string,
 *   breakpointStyles?: array<string,BreakpointStylesShape>|null,
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
     * @param RgbaColor|RgbaColorShape $backgroundColor
     * @param Gradient|GradientShape $backgroundGradient
     * @param BackgroundImage|BackgroundImageShape $backgroundImage
     * @param array<string,BreakpointStylesShape>|null $breakpointStyles
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
     * A color defined by RGB values.
     *
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

    public function withFlexboxPositioning(string $flexboxPositioning): self
    {
        $self = clone $this;
        $self['flexboxPositioning'] = $flexboxPositioning;

        return $self;
    }

    public function withForceFullWidthSection(bool $forceFullWidthSection): self
    {
        $self = clone $this;
        $self['forceFullWidthSection'] = $forceFullWidthSection;

        return $self;
    }

    public function withMaxWidthSectionCentering(
        int $maxWidthSectionCentering
    ): self {
        $self = clone $this;
        $self['maxWidthSectionCentering'] = $maxWidthSectionCentering;

        return $self;
    }

    public function withVerticalAlignment(string $verticalAlignment): self
    {
        $self = clone $this;
        $self['verticalAlignment'] = $verticalAlignment;

        return $self;
    }

    /**
     * @param array<string,BreakpointStylesShape> $breakpointStyles
     */
    public function withBreakpointStyles(array $breakpointStyles): self
    {
        $self = clone $this;
        $self['breakpointStyles'] = $breakpointStyles;

        return $self;
    }
}
