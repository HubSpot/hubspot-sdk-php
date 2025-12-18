<?php

declare(strict_types=1);

namespace HubspotSDK\Cms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\MapOf;

/**
 * @phpstan-import-type RowMetaDataShape from \HubspotSDK\Cms\RowMetaData
 * @phpstan-import-type StylesShape from \HubspotSDK\Cms\Styles
 *
 * @phpstan-type LayoutSectionShape = array{
 *   cells: list<mixed>,
 *   cssClass: string,
 *   cssID: string,
 *   cssStyle: string,
 *   label: string,
 *   name: string,
 *   params: array<string,mixed>,
 *   rowMetaData: list<RowMetaDataShape>,
 *   rows: list<mixed>,
 *   styles: Styles|StylesShape,
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

    #[Required('cssId')]
    public string $cssID;

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
     *   cssID: ...,
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
     * @param list<RowMetaDataShape> $rowMetaData
     * @param list<mixed> $rows
     * @param Styles|StylesShape $styles
     */
    public static function with(
        array $cells,
        string $cssClass,
        string $cssID,
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
        $self = new self;

        $self['cells'] = $cells;
        $self['cssClass'] = $cssClass;
        $self['cssID'] = $cssID;
        $self['cssStyle'] = $cssStyle;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['params'] = $params;
        $self['rowMetaData'] = $rowMetaData;
        $self['rows'] = $rows;
        $self['styles'] = $styles;
        $self['type'] = $type;
        $self['w'] = $w;
        $self['x'] = $x;

        return $self;
    }

    /**
     * @param list<mixed> $cells
     */
    public function withCells(array $cells): self
    {
        $self = clone $this;
        $self['cells'] = $cells;

        return $self;
    }

    public function withCssClass(string $cssClass): self
    {
        $self = clone $this;
        $self['cssClass'] = $cssClass;

        return $self;
    }

    public function withCssID(string $cssID): self
    {
        $self = clone $this;
        $self['cssID'] = $cssID;

        return $self;
    }

    public function withCssStyle(string $cssStyle): self
    {
        $self = clone $this;
        $self['cssStyle'] = $cssStyle;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * null.
     *
     * @param array<string,mixed> $params
     */
    public function withParams(array $params): self
    {
        $self = clone $this;
        $self['params'] = $params;

        return $self;
    }

    /**
     * @param list<RowMetaDataShape> $rowMetaData
     */
    public function withRowMetaData(array $rowMetaData): self
    {
        $self = clone $this;
        $self['rowMetaData'] = $rowMetaData;

        return $self;
    }

    /**
     * @param list<mixed> $rows
     */
    public function withRows(array $rows): self
    {
        $self = clone $this;
        $self['rows'] = $rows;

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

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withW(int $w): self
    {
        $self = clone $this;
        $self['w'] = $w;

        return $self;
    }

    public function withX(int $x): self
    {
        $self = clone $this;
        $self['x'] = $x;

        return $self;
    }
}
