<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Cms\Hubdb\Variant;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace a single row in the draft version of a table. All column values must be specified. If a column has a value in the target table and this request doesn't define that value, it will be deleted.
 * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::replaceDraft()
 *
 * @phpstan-type RowReplaceDraftParamsShape = array{
 *   tableIdOrName: string,
 *   childTableId: int,
 *   displayIndex: int,
 *   values: array<string,Variant|array<string,mixed>>,
 *   name?: string,
 *   path?: string,
 * }
 */
final class RowReplaceDraftParams implements BaseModel
{
    /** @use SdkModel<RowReplaceDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIdOrName;

    /**
     * Specifies the value for the column child table id.
     */
    #[Required]
    public int $childTableId;

    #[Required]
    public int $displayIndex;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,Variant> $values
     */
    #[Required(map: Variant::class)]
    public array $values;

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    #[Optional]
    public ?string $name;

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    #[Optional]
    public ?string $path;

    /**
     * `new RowReplaceDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowReplaceDraftParams::with(
     *   tableIdOrName: ..., childTableId: ..., displayIndex: ..., values: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowReplaceDraftParams)
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
