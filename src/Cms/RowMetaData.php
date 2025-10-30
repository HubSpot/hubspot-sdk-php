<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RowMetaDataShape = array{cssClass: string, styles: Styles}
 */
final class RowMetaData implements BaseModel
{
    /** @use SdkModel<RowMetaDataShape> */
    use SdkModel;

    #[Api]
    public string $cssClass;

    #[Api]
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
     */
    public static function with(string $cssClass, Styles $styles): self
    {
        $obj = new self;

        $obj->cssClass = $cssClass;
        $obj->styles = $styles;

        return $obj;
    }

    public function withCssClass(string $cssClass): self
    {
        $obj = clone $this;
        $obj->cssClass = $cssClass;

        return $obj;
    }

    public function withStyles(Styles $styles): self
    {
        $obj = clone $this;
        $obj->styles = $styles;

        return $obj;
    }
}
