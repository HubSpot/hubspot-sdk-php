<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type hub_db_table_v3_request = array{
 *   label: string,
 *   name: string,
 *   allowChildTables?: bool,
 *   allowPublicAPIAccess?: bool,
 *   columns?: list<ColumnRequest>,
 *   dynamicMetaTags?: array<string, int>,
 *   enableChildTablePages?: bool,
 *   useForPages?: bool,
 * }
 */
final class HubDBTableV3Request implements BaseModel
{
    /** @use SdkModel<hub_db_table_v3_request> */
    use SdkModel;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?bool $allowChildTables;

    #[Api('allowPublicApiAccess', optional: true)]
    public ?bool $allowPublicAPIAccess;

    /** @var list<ColumnRequest>|null $columns */
    #[Api(list: ColumnRequest::class, optional: true)]
    public ?array $columns;

    /** @var array<string, int>|null $dynamicMetaTags */
    #[Api(map: 'int', optional: true)]
    public ?array $dynamicMetaTags;

    #[Api(optional: true)]
    public ?bool $enableChildTablePages;

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
     * @param array<string, int> $dynamicMetaTags
     */
    public static function with(
        string $label,
        string $name,
        ?bool $allowChildTables = null,
        ?bool $allowPublicAPIAccess = null,
        ?array $columns = null,
        ?array $dynamicMetaTags = null,
        ?bool $enableChildTablePages = null,
        ?bool $useForPages = null,
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;

        null !== $allowChildTables && $obj->allowChildTables = $allowChildTables;
        null !== $allowPublicAPIAccess && $obj->allowPublicAPIAccess = $allowPublicAPIAccess;
        null !== $columns && $obj->columns = $columns;
        null !== $dynamicMetaTags && $obj->dynamicMetaTags = $dynamicMetaTags;
        null !== $enableChildTablePages && $obj->enableChildTablePages = $enableChildTablePages;
        null !== $useForPages && $obj->useForPages = $useForPages;

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

    public function withAllowChildTables(bool $allowChildTables): self
    {
        $obj = clone $this;
        $obj->allowChildTables = $allowChildTables;

        return $obj;
    }

    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $obj = clone $this;
        $obj->allowPublicAPIAccess = $allowPublicAPIAccess;

        return $obj;
    }

    /**
     * @param list<ColumnRequest> $columns
     */
    public function withColumns(array $columns): self
    {
        $obj = clone $this;
        $obj->columns = $columns;

        return $obj;
    }

    /**
     * @param array<string, int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $obj = clone $this;
        $obj->dynamicMetaTags = $dynamicMetaTags;

        return $obj;
    }

    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $obj = clone $this;
        $obj->enableChildTablePages = $enableChildTablePages;

        return $obj;
    }

    public function withUseForPages(bool $useForPages): self
    {
        $obj = clone $this;
        $obj->useForPages = $useForPages;

        return $obj;
    }
}
