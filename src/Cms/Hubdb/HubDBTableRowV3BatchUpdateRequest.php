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

    #[Api]
    public string $id;

    /** @var array<string, mixed> $values */
    #[Api(map: 'mixed')]
    public array $values;

    #[Api('childTableId', optional: true)]
    public ?int $childTableID;

    #[Api(optional: true)]
    public ?int $displayIndex;

    #[Api(optional: true)]
    public ?string $name;

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

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param array<string, mixed> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj->values = $values;

        return $obj;
    }

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }
}
