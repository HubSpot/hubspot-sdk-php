<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type HubDBTableRowV3BatchUpdateRequestShape = array{
 *   childTableID: int,
 *   displayIndex: int,
 *   values: array<string,mixed>,
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
    #[Required('childTableId')]
    public int $childTableID;

    /**
     * The index position for displaying the row within the table.
     */
    #[Required]
    public int $displayIndex;

    /**
     * List of key value pairs with the column name and column value.
     *
     * @var array<string,mixed> $values
     */
    #[Required(map: 'mixed')]
    public array $values;

    /**
     * The id of the table row.
     */
    #[Optional]
    public ?string $id;

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
     * `new HubDBTableRowV3BatchUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubDBTableRowV3BatchUpdateRequest::with(
     *   childTableID: ..., displayIndex: ..., values: ...
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
     * @param array<string,mixed> $values
     */
    public static function with(
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $id = null,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $self = new self;

        $self['childTableID'] = $childTableID;
        $self['displayIndex'] = $displayIndex;
        $self['values'] = $values;

        null !== $id && $self['id'] = $id;
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

    /**
     * The index position for displaying the row within the table.
     */
    public function withDisplayIndex(int $displayIndex): self
    {
        $self = clone $this;
        $self['displayIndex'] = $displayIndex;

        return $self;
    }

    /**
     * List of key value pairs with the column name and column value.
     *
     * @param array<string,mixed> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }

    /**
     * The id of the table row.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
