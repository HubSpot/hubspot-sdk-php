<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type StylesShape from \HubspotSDK\Cms\Blogs\Posts\Styles
 *
 * @phpstan-type RowMetaDataShape = array{
 *   cssClass: string, styles: Styles|StylesShape
 * }
 */
final class RowMetaData implements BaseModel
{
    /** @use SdkModel<RowMetaDataShape> */
    use SdkModel;

    /**
     * The CSS class applied to the row.
     */
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
     * @param Styles|StylesShape $styles
     */
    public static function with(string $cssClass, Styles|array $styles): self
    {
        $self = new self;

        $self['cssClass'] = $cssClass;
        $self['styles'] = $styles;

        return $self;
    }

    /**
     * The CSS class applied to the row.
     */
    public function withCssClass(string $cssClass): self
    {
        $self = clone $this;
        $self['cssClass'] = $cssClass;

        return $self;
    }

    /**
     * @param Styles|StylesShape $styles
     */
    public function withStyles(Styles|array $styles): self
    {
        $self = clone $this;
        $self['styles'] = $styles;

        return $self;
    }
}
