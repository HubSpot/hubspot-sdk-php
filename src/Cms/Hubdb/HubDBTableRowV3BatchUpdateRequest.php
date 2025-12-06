<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3BatchUpdateRequestShape = array{
 *   childTableId: int,
 *   displayIndex: int,
 *   values: array<string,Variant>,
 *   id?: string|null,
 *   name?: string|null,
 *   path?: string|null,
 * }
 */
final class HubDBTableRowV3BatchUpdateRequest implements BaseModel
{
    /** @use SdkModel<HubDBTableRowV3BatchUpdateRequestShape> */
    use SdkModel;

    /**
     * Specifies the value for the column child table id.
     */
    #[Api]
    public int $childTableId;

    #[Api]
    public int $displayIndex;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,Variant> $values
     */
    #[Api(map: Variant::class)]
    public array $values;

    /**
     * The id of the table row.
     */
    #[Api(optional: true)]
    public ?string $id;

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
     * HubDBTableRowV3BatchUpdateRequest::with(
     *   childTableId: ..., displayIndex: ..., values: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowV3BatchUpdateRequest)
     *   ->withChildTableID(...)
     *   ->withDisplayIndex(...)
     *   ->withValues(...)
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
     * @param array<string,Variant|array<string,mixed>> $values
     */
    public static function with(
        int $childTableId,
        int $displayIndex,
        array $values,
        ?string $id = null,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj['childTableId'] = $childTableId;
        $obj['displayIndex'] = $displayIndex;
        $obj['values'] = $values;

        null !== $id && $obj['id'] = $id;
        null !== $name && $obj['name'] = $name;
        null !== $path && $obj['path'] = $path;

        return $obj;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(int $childTableID): self
    {
        $obj = clone $this;
        $obj['childTableId'] = $childTableID;

        return $obj;
    }

    public function withDisplayIndex(int $displayIndex): self
    {
        $obj = clone $this;
        $obj['displayIndex'] = $displayIndex;

        return $obj;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string,Variant|array<string,mixed>> $values
     */
    public function withValues(array $values): self
    {
        $obj = clone $this;
        $obj['values'] = $values;

        return $obj;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj['path'] = $path;

        return $obj;
    }
}
