<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-type LayoutSectionShape = array{
 *   cells: list<mixed>,
 *   cssClass: string,
 *   cssId: string,
 *   cssStyle: string,
 *   label: string,
 *   name: string,
 *   params: array<string,mixed>,
 *   rowMetaData: list<RowMetaData>,
 *   rows: list<mixed>,
 *   styles: Styles,
 *   type: string,
 *   w: int,
 *   x: int,
 * }
 */
final class LayoutSection implements BaseModel
{
    /** @use SdkModel<LayoutSectionShape> */
    use SdkModel;

    /** @var list<mixed> $cells */
    #[Required(list: LayoutSection::class)]
    public array $cells;

    #[Required]
    public string $cssClass;

    #[Required]
    public string $cssId;

    #[Required]
    public string $cssStyle;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    /**
     * null.
     *
     * @var array<string,mixed> $params
     */
    #[Required(map: 'mixed')]
    public array $params;

    /** @var list<RowMetaData> $rowMetaData */
    #[Required(list: RowMetaData::class)]
    public array $rowMetaData;

    /** @var list<mixed> $rows */
    #[Required(list: new MapOf(LayoutSection::class))]
    public array $rows;

    #[Required]
    public Styles $styles;

    #[Required]
    public string $type;

    #[Required]
    public int $w;

    #[Required]
    public int $x;

    /**
     * `new LayoutSection()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LayoutSection::with(
     *   cells: ...,
     *   cssClass: ...,
     *   cssId: ...,
     *   cssStyle: ...,
     *   label: ...,
     *   name: ...,
     *   params: ...,
     *   rowMetaData: ...,
     *   rows: ...,
     *   styles: ...,
     *   type: ...,
     *   w: ...,
     *   x: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LayoutSection)
     *   ->withCells(...)
     *   ->withCssClass(...)
     *   ->withCssID(...)
     *   ->withCssStyle(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withParams(...)
     *   ->withRowMetaData(...)
     *   ->withRows(...)
     *   ->withStyles(...)
     *   ->withType(...)
     *   ->withW(...)
     *   ->withX(...)
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
     * @param list<mixed> $cells
     * @param array<string,mixed> $params
     * @param list<RowMetaData|array{cssClass: string, styles: Styles}> $rowMetaData
     * @param list<mixed> $rows
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
    public static function with(
        array $cells,
        string $cssClass,
        string $cssId,
        string $cssStyle,
        string $label,
        string $name,
        array $params,
        array $rowMetaData,
        array $rows,
        Styles|array $styles,
        string $type,
        int $w,
        int $x,
    ): self {
        $obj = new self;

        $obj['cells'] = $cells;
        $obj['cssClass'] = $cssClass;
        $obj['cssId'] = $cssId;
        $obj['cssStyle'] = $cssStyle;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['params'] = $params;
        $obj['rowMetaData'] = $rowMetaData;
        $obj['rows'] = $rows;
        $obj['styles'] = $styles;
        $obj['type'] = $type;
        $obj['w'] = $w;
        $obj['x'] = $x;

        return $obj;
    }

    /**
     * @param list<mixed> $cells
     */
    public function withCells(array $cells): self
    {
        $obj = clone $this;
        $obj['cells'] = $cells;

        return $obj;
    }

    public function withCssClass(string $cssClass): self
    {
        $obj = clone $this;
        $obj['cssClass'] = $cssClass;

        return $obj;
    }

    public function withCssID(string $cssID): self
    {
        $obj = clone $this;
        $obj['cssId'] = $cssID;

        return $obj;
    }

    public function withCssStyle(string $cssStyle): self
    {
        $obj = clone $this;
        $obj['cssStyle'] = $cssStyle;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * null.
     *
     * @param array<string,mixed> $params
     */
    public function withParams(array $params): self
    {
        $obj = clone $this;
        $obj['params'] = $params;

        return $obj;
    }

    /**
     * @param list<RowMetaData|array{cssClass: string, styles: Styles}> $rowMetaData
     */
    public function withRowMetaData(array $rowMetaData): self
    {
        $obj = clone $this;
        $obj['rowMetaData'] = $rowMetaData;

        return $obj;
    }

    /**
     * @param list<mixed> $rows
     */
    public function withRows(array $rows): self
    {
        $obj = clone $this;
        $obj['rows'] = $rows;

        return $obj;
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
        $obj = clone $this;
        $obj['styles'] = $styles;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withW(int $w): self
    {
        $obj = clone $this;
        $obj['w'] = $w;

        return $obj;
    }

    public function withX(int $x): self
    {
        $obj = clone $this;
        $obj['x'] = $x;

        return $obj;
    }
}
