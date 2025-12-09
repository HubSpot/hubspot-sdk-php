<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3RequestShape = array{
 *   childTableId: int,
 *   displayIndex: int,
 *   values: array<string,Variant>,
 *   name?: string|null,
 *   path?: string|null,
 * }
 */
final class HubDBTableRowV3Request implements BaseModel
{
    /** @use SdkModel<HubDBTableRowV3RequestShape> */
    use SdkModel;

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
     * `new HubDBTableRowV3Request()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3Request::with(childTableId: ..., displayIndex: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubDBTableRowV3Request)
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
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj['childTableId'] = $childTableId;
        $obj['displayIndex'] = $displayIndex;
        $obj['values'] = $values;

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
