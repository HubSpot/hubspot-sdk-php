<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Partially update a single row in the table's draft version.
 * All the column values need not be specified. Only the columns or fields that needs to be modified can be specified.
 * See the "Create a row" endpoint for instructions on how to format the JSON row definitions.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\RowsService::updateDraft()
 *
 * @phpstan-type RowUpdateDraftParamsShape = array{
 *   tableIDOrName: string,
 *   childTableID: int,
 *   displayIndex: int,
 *   values: array<string,mixed>,
 *   name?: string|null,
 *   path?: string|null,
 * }
 */
final class RowUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<RowUpdateDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $tableIDOrName;

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
     * `new RowUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowUpdateDraftParams::with(
     *   tableIDOrName: ..., childTableID: ..., displayIndex: ..., values: ...
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
     * @param array<string,mixed> $values
     */
    public static function with(
        string $tableIDOrName,
        int $childTableID,
        int $displayIndex,
        array $values,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $self = new self;

        $self['tableIDOrName'] = $tableIDOrName;
        $self['childTableID'] = $childTableID;
        $self['displayIndex'] = $displayIndex;
        $self['values'] = $values;

        null !== $name && $self['name'] = $name;
        null !== $path && $self['path'] = $path;

        return $self;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $self = clone $this;
        $self['tableIDOrName'] = $tableIDOrName;

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
