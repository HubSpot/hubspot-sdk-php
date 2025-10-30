<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a specific version of a table.
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->deleteVersion
 *
 * @phpstan-type TableDeleteVersionParamsShape = array{tableIDOrName: string}
 */
final class TableDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<TableDeleteVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    /**
     * `new TableDeleteVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableDeleteVersionParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TableDeleteVersionParams)->withTableIDOrName(...)
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
     */
    public static function with(string $tableIDOrName): self
    {
        $obj = new self;

        $obj->tableIDOrName = $tableIDOrName;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIDOrName = $tableIDOrName;

        return $obj;
    }
}
