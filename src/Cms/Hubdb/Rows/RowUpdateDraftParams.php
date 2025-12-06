<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\Variant;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Sparse updates a single row in the table's draft version.
 * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
 * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::updateDraft()
 *
 * @phpstan-type RowUpdateDraftParamsShape = array{
 *   tableIdOrName: string,
 *   childTableId: int,
 *   displayIndex: int,
 *   values: array<string,Variant|array<string,mixed>>,
 *   name?: string,
 *   path?: string,
 * }
 */
final class RowUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<RowUpdateDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIdOrName;

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
     * `new RowUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowUpdateDraftParams::with(
     *   tableIdOrName: ..., childTableId: ..., displayIndex: ..., values: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowUpdateDraftParams)
     *   ->withTableIDOrName(...)
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
        string $tableIdOrName,
        int $childTableId,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj['tableIdOrName'] = $tableIdOrName;
        $obj['childTableId'] = $childTableId;
        $obj['displayIndex'] = $displayIndex;
        $obj['values'] = $values;

        null !== $name && $obj['name'] = $name;
        null !== $path && $obj['path'] = $path;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj['tableIdOrName'] = $tableIDOrName;

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
