<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: LayoutSection::class)]
    public array $cells;

    #[Api]
    public string $cssClass;

    #[Api]
    public string $cssId;

    #[Api]
    public string $cssStyle;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /**
     * null.
     *
     * @var array<string,mixed> $params
     */
    #[Api(map: 'mixed')]
    public array $params;

    /** @var list<RowMetaData> $rowMetaData */
    #[Api(list: RowMetaData::class)]
    public array $rowMetaData;

    /** @var list<mixed> $rows */
    #[Api(list: new MapOf(LayoutSection::class))]
    public array $rows;

    #[Api]
    public Styles $styles;

    #[Api]
    public string $type;

    #[Api]
    public int $w;

    #[Api]
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
     * @param list<RowMetaData> $rowMetaData
     * @param list<mixed> $rows
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
        Styles $styles,
        string $type,
        int $w,
        int $x,
    ): self {
        $obj = new self;

        $obj->cells = $cells;
        $obj->cssClass = $cssClass;
        $obj->cssId = $cssId;
        $obj->cssStyle = $cssStyle;
        $obj->label = $label;
        $obj->name = $name;
        $obj->params = $params;
        $obj->rowMetaData = $rowMetaData;
        $obj->rows = $rows;
        $obj->styles = $styles;
        $obj->type = $type;
        $obj->w = $w;
        $obj->x = $x;

        return $obj;
    }

    /**
     * @param list<mixed> $cells
     */
    public function withCells(array $cells): self
    {
        $obj = clone $this;
        $obj->cells = $cells;

        return $obj;
    }

    public function withCssClass(string $cssClass): self
    {
        $obj = clone $this;
        $obj->cssClass = $cssClass;

        return $obj;
    }

    public function withCssID(string $cssID): self
    {
        $obj = clone $this;
        $obj->cssId = $cssID;

        return $obj;
    }

    public function withCssStyle(string $cssStyle): self
    {
        $obj = clone $this;
        $obj->cssStyle = $cssStyle;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
        $obj->params = $params;

        return $obj;
    }

    /**
     * @param list<RowMetaData> $rowMetaData
     */
    public function withRowMetaData(array $rowMetaData): self
    {
        $obj = clone $this;
        $obj->rowMetaData = $rowMetaData;

        return $obj;
    }

    /**
     * @param list<mixed> $rows
     */
    public function withRows(array $rows): self
    {
        $obj = clone $this;
        $obj->rows = $rows;

        return $obj;
    }

    public function withStyles(Styles $styles): self
    {
        $obj = clone $this;
        $obj->styles = $styles;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withW(int $w): self
    {
        $obj = clone $this;
        $obj->w = $w;

        return $obj;
    }

    public function withX(int $x): self
    {
        $obj = clone $this;
        $obj->x = $x;

        return $obj;
    }
}
