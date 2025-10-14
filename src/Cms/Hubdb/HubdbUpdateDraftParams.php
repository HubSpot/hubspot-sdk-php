<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbUpdateDraftParams); // set properties as needed
 * $client->cms.hubdb->updateDraft(...$params->toArray());
 * ```
 * Update an existing HubDB table. You can use this endpoint to add or remove columns to the table as well as restore an archived table. Tables updated using the endpoint will only modify the draft verion of the table. Use the `/publish` endpoint to push all the changes to the published version. To restore a table, include the query parameter `archived=true` and `"archived": false` in the json body.
 * **Note:** You need to include all the columns in the input when you are adding/removing/updating a column. If you do not include an already existing column in the request, it will be deleted.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->updateDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->updateDraft
 *
 * @phpstan-type hubdb_update_draft_params = array{
 *   label: string,
 *   name: string,
 *   archived?: bool,
 *   includeForeignIDs?: bool,
 *   isGetLocalizedSchema?: bool,
 *   allowChildTables?: bool,
 *   allowPublicAPIAccess?: bool,
 *   columns?: list<ColumnRequest>,
 *   dynamicMetaTags?: array<string, int>,
 *   enableChildTablePages?: bool,
 *   useForPages?: bool,
 * }
 */
final class HubdbUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<hubdb_update_draft_params> */
    use SdkModel;
    use SdkParams;

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
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    #[Api(optional: true)]
    public ?bool $includeForeignIDs;

    #[Api(optional: true)]
    public ?bool $isGetLocalizedSchema;

    /**
     * Specifies whether child tables can be created.
     */
    #[Api(optional: true)]
    public ?bool $allowChildTables;

    /**
     * Specifies whether the table can be read by public without authorization.
     */
    #[Api('allowPublicApiAccess', optional: true)]
    public ?bool $allowPublicAPIAccess;

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
     * @var array<string, int>|null $dynamicMetaTags
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
     * `new HubdbUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbUpdateDraftParams::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbUpdateDraftParams)->withLabel(...)->withName(...)
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
        ?bool $archived = null,
        ?bool $includeForeignIDs = null,
        ?bool $isGetLocalizedSchema = null,
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

        null !== $archived && $obj->archived = $archived;
        null !== $includeForeignIDs && $obj->includeForeignIDs = $includeForeignIDs;
        null !== $isGetLocalizedSchema && $obj->isGetLocalizedSchema = $isGetLocalizedSchema;
        null !== $allowChildTables && $obj->allowChildTables = $allowChildTables;
        null !== $allowPublicAPIAccess && $obj->allowPublicAPIAccess = $allowPublicAPIAccess;
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
     * Specifies whether to return archived tables. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Set this to `true` to populate foreign ID values in the result.
     */
    public function withIncludeForeignIDs(bool $includeForeignIDs): self
    {
        $obj = clone $this;
        $obj->includeForeignIDs = $includeForeignIDs;

        return $obj;
    }

    public function withIsGetLocalizedSchema(bool $isGetLocalizedSchema): self
    {
        $obj = clone $this;
        $obj->isGetLocalizedSchema = $isGetLocalizedSchema;

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
        $obj->allowPublicAPIAccess = $allowPublicAPIAccess;

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
     * @param array<string, int> $dynamicMetaTags
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
