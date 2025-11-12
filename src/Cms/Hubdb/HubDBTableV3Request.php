<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableV3RequestShape = array{
 *   label: string,
 *   name: string,
 *   allowChildTables?: bool|null,
 *   allowPublicApiAccess?: bool|null,
 *   columns?: list<ColumnRequest>|null,
 *   dynamicMetaTags?: array<string,int>|null,
 *   enableChildTablePages?: bool|null,
 *   useForPages?: bool|null,
 * }
 */
final class HubDBTableV3Request implements BaseModel
{
    /** @use SdkModel<HubDBTableV3RequestShape> */
    use SdkModel;

    /**
     * Label of the table.
     */
    #[Api]
    public string $label;

    /**
     * Name of the table.
     */
    #[Api]
    public string $name;

    /**
     * Specifies whether child tables can be created.
     */
    #[Api(optional: true)]
    public ?bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Api(optional: true)]
    public ?bool $allowPublicApiAccess;

    /**
     * List of columns in the table.
     *
     * @var list<ColumnRequest>|null $columns
     */
    #[Api(list: ColumnRequest::class, optional: true)]
    public ?array $columns;

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @var array<string,int>|null $dynamicMetaTags
     */
    #[Api(map: 'int', optional: true)]
    public ?array $dynamicMetaTags;

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    #[Api(optional: true)]
    public ?bool $enableChildTablePages;

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    #[Api(optional: true)]
    public ?bool $useForPages;

    /**
     * `new HubDBTableV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableV3Request::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableV3Request)->withLabel(...)->withName(...)
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
     * @param list<ColumnRequest> $columns
     * @param array<string,int> $dynamicMetaTags
     */
    public static function with(
        string $label,
        string $name,
        ?bool $allowChildTables = null,
        ?bool $allowPublicApiAccess = null,
        ?array $columns = null,
        ?array $dynamicMetaTags = null,
        ?bool $enableChildTablePages = null,
        ?bool $useForPages = null,
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;

        null !== $allowChildTables && $obj->allowChildTables = $allowChildTables;
        null !== $allowPublicApiAccess && $obj->allowPublicApiAccess = $allowPublicApiAccess;
        null !== $columns && $obj->columns = $columns;
        null !== $dynamicMetaTags && $obj->dynamicMetaTags = $dynamicMetaTags;
        null !== $enableChildTablePages && $obj->enableChildTablePages = $enableChildTablePages;
        null !== $useForPages && $obj->useForPages = $useForPages;

        return $obj;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj->allowChildTables = $allowChildTables;

        return $obj;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj->allowPublicApiAccess = $allowPublicAPIAccess;

        return $obj;
    }

    /**
     * List of columns in the table.
     *
     * @param list<ColumnRequest> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj->columns = $columns;

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
        $obj->dynamicMetaTags = $dynamicMetaTags;

        return $obj;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $obj = clone $this;
        $obj->enableChildTablePages = $enableChildTablePages;

        return $obj;
    }

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj->useForPages = $useForPages;

        return $obj;
    }
}
