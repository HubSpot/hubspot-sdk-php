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
 * Add a new row to a HubDB table. New rows will be added to the draft version of the table. Use the `/publish` endpoint to push these changes to published version.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::create()
 *
 * @phpstan-import-type VariantShape from \HubspotSDK\Cms\Hubdb\Variant
 *
 * @phpstan-type RowCreateParamsShape = array{
 *   childTableID: int,
 *   displayIndex: int,
 *   values: array<string,Variant|VariantShape>,
 *   name?: string|null,
 *   path?: string|null,
 * }
 */
final class RowCreateParams implements BaseModel
{
    /** @use SdkModel<RowCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the value for the column child table id.
     */
    #[Required('childTableId')]
    public int $childTableID;

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
     * `new RowCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowCreateParams::with(childTableID: ..., displayIndex: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowCreateParams)
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
     * @param array<string,Variant|VariantShape> $values
     */
    public static function with(
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $self = new self;

        $self['childTableID'] = $childTableID;
        $self['displayIndex'] = $displayIndex;
        $self['values'] = $values;

        null !== $name && $self['name'] = $name;
        null !== $path && $self['path'] = $path;

        return $self;
    }

    /**
     * Specifies the value for the column child table id.
     */
    public function withChildTableID(int $childTableID): self
    {
        $self = clone $this;
        $self['childTableID'] = $childTableID;

        return $self;
    }

    public function withDisplayIndex(int $displayIndex): self
    {
        $self = clone $this;
        $self['displayIndex'] = $displayIndex;

        return $self;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string,Variant|VariantShape> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }

    /**
     * Specifies the value for `hs_name` column, which will be used as title in the dynamic pages.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Specifies the value for `hs_path` column, which will be used as slug in the dynamic pages.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }
}
