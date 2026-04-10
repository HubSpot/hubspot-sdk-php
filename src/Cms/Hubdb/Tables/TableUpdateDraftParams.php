<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb\Tables;

use HubSpotSDK\Cms\Hubdb\ColumnRequest;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
 * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
 *
 * @see HubSpotSDK\Services\Cms\Hubdb\TablesService::updateDraft()
 *
 * @phpstan-import-type ColumnRequestShape from \HubSpotSDK\Cms\Hubdb\ColumnRequest
 *
 * @phpstan-type TableUpdateDraftParamsShape = array{
 *   allowChildTables: bool,
 *   allowPublicAPIAccess: bool,
 *   columns: list<ColumnRequest|ColumnRequestShape>,
 *   dynamicMetaTags: array<string,int>,
 *   enableChildTablePages: bool,
 *   label: string,
 *   name: string,
 *   useForPages: bool,
 *   archived?: bool|null,
 *   includeForeignIDs?: bool|null,
 *   isGetLocalizedSchema?: bool|null,
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
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?bool $includeForeignIDs;

    #[Optional]
    public ?bool $isGetLocalizedSchema;

    /**
     * `new TableUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableUpdateDraftParams::with(
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
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
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

        null !== $archived && $self['archived'] = $archived;
        null !== $includeForeignIDs && $self['includeForeignIDs'] = $includeForeignIDs;
        null !== $isGetLocalizedSchema && $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

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

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $self = clone $this;
        $self['includeForeignIDs'] = $includeForeignIDs;

        return $self;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $self = clone $this;
        $self['isGetLocalizedSchema'] = $isGetLocalizedSchema;

        return $self;
    }
}
