<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Cms\Hubdb\ColumnRequest;
use HubspotSDK\Cms\Hubdb\ColumnRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Option;

/**
 * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
 * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::updateDraft()
 *
 * @phpstan-type TableUpdateDraftParamsShape = array{
 *   allowChildTables: bool,
 *   allowPublicApiAccess: bool,
 *   columns: list<ColumnRequest|array{
 *     id: int,
 *     label: string,
 *     name: string,
 *     options: list<Option>,
 *     type: value-of<Type>,
 *     foreignColumnId?: int|null,
 *     foreignTableId?: int|null,
 *     maxNumberOfCharacters?: int|null,
 *     maxNumberOfOptions?: int|null,
 *   }>,
 *   dynamicMetaTags: array<string,int>,
 *   enableChildTablePages: bool,
 *   label: string,
 *   name: string,
 *   useForPages: bool,
 *   archived?: bool,
 *   includeForeignIds?: bool,
 *   isGetLocalizedSchema?: bool,
 * }
 */
final class TableUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<TableUpdateDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether child tables can be created.
     */
    #[Api]
    public bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Api]
    public bool $allowPublicApiAccess;

    /**
     * List of columns in the table.
     *
     * @var list<ColumnRequest> $columns
     */
    #[Api(list: ColumnRequest::class)]
    public array $columns;

    /**
     * Specifies the key value pairs of the [metadata fields](https://developers.hubspot.com/docs/cms/guides/dynamic-pages/hubdb#dynamic-pages) with the associated column IDs.
     *
     * @var array<string,int> $dynamicMetaTags
     */
    #[Api(map: 'int')]
    public array $dynamicMetaTags;

    /**
     * Specifies creation of multi-level dynamic pages using child tables.
     */
    #[Api]
    public bool $enableChildTablePages;

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
     * Specifies whether the table can be used for creation of dynamic pages.
     */
    #[Api]
    public bool $useForPages;

    /**
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Api(optional: true)]
    public ?bool $includeForeignIds;

    /**
     * Indicates whether to retrieve the localized schema for the table.
     */
    #[Api(optional: true)]
    public ?bool $isGetLocalizedSchema;

    /**
     * `new TableUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableUpdateDraftParams::with(
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
     * (new TableUpdateDraftParams)
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
        ?bool $archived = null,
        ?bool $includeForeignIds = null,
        ?bool $isGetLocalizedSchema = null,
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

        null !== $archived && $obj['archived'] = $archived;
        null !== $includeForeignIds && $obj['includeForeignIds'] = $includeForeignIds;
        null !== $isGetLocalizedSchema && $obj['isGetLocalizedSchema'] = $isGetLocalizedSchema;

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

    /**
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj['includeForeignIds'] = $includeForeignIDs;

        return $obj;
    }

    /**
     * Indicates whether to retrieve the localized schema for the table.
     */
    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $obj = clone $this;
        $obj['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $obj;
    }
}
