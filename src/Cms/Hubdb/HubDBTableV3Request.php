<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\ColumnRequest\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * @phpstan-type HubDBTableV3RequestShape = array{
 *   allowChildTables: bool,
 *   allowPublicApiAccess: bool,
 *   columns: list<ColumnRequest>,
 *   dynamicMetaTags: array<string,int>,
 *   enableChildTablePages: bool,
 *   label: string,
 *   name: string,
 *   useForPages: bool,
 * }
 */
final class HubDBTableV3Request implements BaseModel
{
    /** @use SdkModel<HubDBTableV3RequestShape> */
    use SdkModel;

    /**
     * Specifies whether child tables can be created.
     */
    #[Required]
    public bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Required]
    public bool $allowPublicApiAccess;

    /**
     * List of columns in the table.
     *
     * @var list<ColumnRequest> $columns
     */
    #[Required(list: ColumnRequest::class)]
    public array $columns;

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @var array<string,int> $dynamicMetaTags
     */
    #[Required(map: 'int')]
    public array $dynamicMetaTags;

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    #[Required]
    public bool $enableChildTablePages;

    /**
     * Label of the table.
     */
    #[Required]
    public string $label;

    /**
     * Name of the table.
     */
    #[Required]
    public string $name;

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    #[Required]
    public bool $useForPages;

    /**
     * `new HubDBTableV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableV3Request::with(
     *   allowChildTables: ...,
     *   allowPublicApiAccess: ...,
     *   columns: ...,
     *   dynamicMetaTags: ...,
     *   enableChildTablePages: ...,
     *   label: ...,
     *   name: ...,
     *   useForPages: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableV3Request)
     *   ->withAllowChildTables(...)
     *   ->withAllowPublicAPIAccess(...)
     *   ->withColumns(...)
     *   ->withDynamicMetaTags(...)
     *   ->withEnableChildTablePages(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withUseForPages(...)
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
     * @param list<ColumnRequest|array{
     *   id: int,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: value-of<Type>,
     *   foreignColumnId?: int|null,
     *   foreignTableId?: int|null,
     *   maxNumberOfCharacters?: int|null,
     *   maxNumberOfOptions?: int|null,
     * }> $columns
     * @param array<string,int> $dynamicMetaTags
     */
    public static function with(
        bool $allowChildTables,
        bool $allowPublicApiAccess,
        array $columns,
        array $dynamicMetaTags,
        bool $enableChildTablePages,
        string $label,
        string $name,
        bool $useForPages,
    ): self {
        $obj = new self;

        $obj['allowChildTables'] = $allowChildTables;
        $obj['allowPublicApiAccess'] = $allowPublicApiAccess;
        $obj['columns'] = $columns;
        $obj['dynamicMetaTags'] = $dynamicMetaTags;
        $obj['enableChildTablePages'] = $enableChildTablePages;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['useForPages'] = $useForPages;

        return $obj;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj['allowChildTables'] = $allowChildTables;

        return $obj;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj['allowPublicApiAccess'] = $allowPublicAPIAccess;

        return $obj;
    }

    /**
     * List of columns in the table.
     *
     * @param list<ColumnRequest|array{
     *   id: int,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: value-of<Type>,
     *   foreignColumnId?: int|null,
     *   foreignTableId?: int|null,
     *   maxNumberOfCharacters?: int|null,
     *   maxNumberOfOptions?: int|null,
     * }> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj['columns'] = $columns;

        return $obj;
    }

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @param array<string,int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $obj = clone $this;
        $obj['dynamicMetaTags'] = $dynamicMetaTags;

        return $obj;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $obj = clone $this;
        $obj['enableChildTablePages'] = $enableChildTablePages;

        return $obj;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj['useForPages'] = $useForPages;

        return $obj;
    }
}
