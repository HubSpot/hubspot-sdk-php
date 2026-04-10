<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ColumnRequestShape from \HubSpotSDK\Cms\Hubdb\ColumnRequest
 *
 * @phpstan-type HubDBTableV3RequestShape = array{
 *   allowChildTables: bool,
 *   allowPublicAPIAccess: bool,
 *   columns: list<ColumnRequest|ColumnRequestShape>,
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
    #[Required('allowPublicApiAccess')]
    public bool $allowPublicAPIAccess;

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
     *   allowPublicAPIAccess: ...,
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
     * @param list<ColumnRequest|ColumnRequestShape> $columns
     * @param array<string,int> $dynamicMetaTags
     */
    public static function with(
        bool $allowChildTables,
        bool $allowPublicAPIAccess,
        array $columns,
        array $dynamicMetaTags,
        bool $enableChildTablePages,
        string $label,
        string $name,
        bool $useForPages,
    ): self {
        $self = new self;

        $self['allowChildTables'] = $allowChildTables;
        $self['allowPublicAPIAccess'] = $allowPublicAPIAccess;
        $self['columns'] = $columns;
        $self['dynamicMetaTags'] = $dynamicMetaTags;
        $self['enableChildTablePages'] = $enableChildTablePages;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['useForPages'] = $useForPages;

        return $self;
    }

    /**
     * Specifies whether child tables can be created.
     */
    public function withAllowChildTables(bool $allowChildTables): self
    {
        $self = clone $this;
        $self['allowChildTables'] = $allowChildTables;

        return $self;
    }

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    public function withAllowPublicAPIAccess(bool $allowPublicAPIAccess): self
    {
        $self = clone $this;
        $self['allowPublicAPIAccess'] = $allowPublicAPIAccess;

        return $self;
    }

    /**
     * List of columns in the table.
     *
     * @param list<ColumnRequest|ColumnRequestShape> $columns
     */
    public function withColumns(array $columns): self
    {
        $self = clone $this;
        $self['columns'] = $columns;

        return $self;
    }

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @param array<string,int> $dynamicMetaTags
     */
    public function withDynamicMetaTags(array $dynamicMetaTags): self
    {
        $self = clone $this;
        $self['dynamicMetaTags'] = $dynamicMetaTags;

        return $self;
    }

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    public function withEnableChildTablePages(bool $enableChildTablePages): self
    {
        $self = clone $this;
        $self['enableChildTablePages'] = $enableChildTablePages;

        return $self;
    }

    /**
     * Label of the table.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Name of the table.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    public function withUseForPages(bool $useForPages): self
    {
        $self = clone $this;
        $self['useForPages'] = $useForPages;

        return $self;
    }
}
