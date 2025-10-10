<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new RowUpdateDraftParams); // set properties as needed
 * $client->cms.hubdb.rows->updateDraft(...$params->toArray());
 * ```
 * Updates an existing row.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows->updateDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows->updateDraft
 *
 * @phpstan-type row_update_draft_params = array{
 *   tableIDOrName: string,
 *   values: array<string, mixed>,
 *   childTableID?: int,
 *   displayIndex?: int,
 *   name?: string,
 *   path?: string,
 * }
 */
final class RowUpdateDraftParams implements BaseModel
{
    /** @use SdkModel<row_update_draft_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

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
     * `new RowUpdateDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowUpdateDraftParams::with(tableIDOrName: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowUpdateDraftParams)->withTableIDOrName(...)->withValues(...)
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
        string $tableIDOrName,
        array $values,
        ?int $childTableID = null,
        ?int $displayIndex = null,
        ?string $name = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj->tableIDOrName = $tableIDOrName;
        $obj->values = $values;

        null !== $childTableID && $obj->childTableID = $childTableID;
        null !== $displayIndex && $obj->displayIndex = $displayIndex;
        null !== $name && $obj->name = $name;
        null !== $path && $obj->path = $path;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIDOrName = $tableIDOrName;

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
