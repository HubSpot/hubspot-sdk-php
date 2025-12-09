<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RowMetaDataShape = array{cssClass: string, styles: Styles}
 */
final class RowMetaData implements BaseModel
{
    /** @use SdkModel<RowMetaDataShape> */
    use SdkModel;

    #[Required]
    public string $cssClass;

    #[Required]
    public Styles $styles;

    /**
     * `new RowMetaData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowMetaData::with(cssClass: ..., styles: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowMetaData)->withCssClass(...)->withStyles(...)
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
     * @param Styles|array{
     *   backgroundColor: RgbaColor,
     *   backgroundGradient: Gradient,
     *   backgroundImage: BackgroundImage,
     *   flexboxPositioning: string,
     *   forceFullWidthSection: bool,
     *   maxWidthSectionCentering: int,
     *   verticalAlignment: string,
     *   breakpointStyles?: array<string,BreakpointStyles>|null,
     * } $styles
     */
    public static function with(string $cssClass, Styles|array $styles): self
    {
        $self = new self;

        $self['cssClass'] = $cssClass;
        $self['styles'] = $styles;

        return $self;
    }

    public function withCssClass(string $cssClass): self
    {
        $self = clone $this;
        $self['cssClass'] = $cssClass;

        return $self;
    }

    /**
     * @param Styles|array{
     *   backgroundColor: RgbaColor,
     *   backgroundGradient: Gradient,
     *   backgroundImage: BackgroundImage,
     *   flexboxPositioning: string,
     *   forceFullWidthSection: bool,
     *   maxWidthSectionCentering: int,
     *   verticalAlignment: string,
     *   breakpointStyles?: array<string,BreakpointStyles>|null,
     * } $styles
     */
    public function withStyles(Styles|array $styles): self
    {
        $self = clone $this;
        $self['styles'] = $styles;

        return $self;
    }
}
