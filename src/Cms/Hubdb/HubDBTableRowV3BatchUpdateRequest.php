<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type hub_db_table_row_v3_batch_update_request = array{
 *   id: string,
 *   values: array<string, mixed>,
 *   childTableID?: int,
 *   displayIndex?: int,
 *   name?: string,
 *   path?: string,
 * }
 */
final class HubDBTableRowV3BatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<hub_db_table_row_v3_batch_update_request> */
    use SdkModel;

    /**
     * The id of the table row.
     */
    #[Api]
    public string $id;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string, mixed> $values
     */
    #[Api(map: 'mixed')]
    public array $values;

    /**
     * Specifies the value for the column child table id.
     */
    #[Api('childTableId', optional: true)]
    public ?int $childTableID;

    #[Api(optional: true)]
    public ?int $displayIndex;

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    #[Api(optional: true)]
    public ?string $path;

    /**
     * `new HubDBTableRowV3BatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3BatchUpdateRequest::with(id: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowV3BatchUpdateRequest)->withID(...)->withValues(...)
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
     * @param array<string, mixed> $values
     */
    public static function with(
        string $id,
        array $values,
        ?int $childTableID = null,
        ?int $displayIndex = null,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->values = $values;

        null !== $childTableID && $obj->childTableID = $childTableID;
        null !== $displayIndex && $obj->displayIndex = $displayIndex;
        null !== $name && $obj->name = $name;
        null !== $path && $obj->path = $path;

        return $obj;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string, mixed> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(int $childTableID): self
    {
        $obj = clone $this;
        $obj->childTableID = $childTableID;

        return $obj;
    }

    public function withDisplayIndex(int $displayIndex): self
    {
        $obj = clone $this;
        $obj->displayIndex = $displayIndex;

        return $obj;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }
}
