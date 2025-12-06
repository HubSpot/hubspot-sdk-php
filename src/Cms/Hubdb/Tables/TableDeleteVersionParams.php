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
 * @see HubspotSDK\Services\Cms\Hubdb\TablesService::deleteVersion()
 *
 * @phpstan-type TableDeleteVersionParamsShape = array{tableIdOrName: string}
 */
final class TableDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<TableDeleteVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIdOrName;

    /**
     * `new TableDeleteVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TableDeleteVersionParams::with(tableIdOrName: ...)
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
    public static function with(string $tableIdOrName): self
    {
        $obj = new self;

        $obj['tableIdOrName'] = $tableIdOrName;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj['tableIdOrName'] = $tableIDOrName;

        return $obj;
    }
}
