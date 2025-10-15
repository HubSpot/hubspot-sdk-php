<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Tables;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TableDeleteVersionParams); // set properties as needed
 * $client->cms.hubdb.tables->deleteVersion(...$params->toArray());
 * ```
 * Delete a specific version of a table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.tables->deleteVersion(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Tables->deleteVersion
 *
 * @phpstan-type table_delete_version_params = array{tableIDOrName: string}
 */
final class TableDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<table_delete_version_params> */
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
