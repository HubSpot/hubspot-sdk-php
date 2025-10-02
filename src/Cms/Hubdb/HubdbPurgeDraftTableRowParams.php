<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new HubdbPurgeDraftTableRowParams); // set properties as needed
 * $client->cms.hubdb->purgeDraftTableRow(...$params->toArray());
 * ```
 * Permanently deletes a row.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->purgeDraftTableRow(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->purgeDraftTableRow
 *
 * @phpstan-type hubdb_purge_draft_table_row_params = array{tableIDOrName: string}
 */
final class HubdbPurgeDraftTableRowParams implements BaseModel
{
    /** @use SdkModel<hubdb_purge_draft_table_row_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    /**
     * `new HubdbPurgeDraftTableRowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbPurgeDraftTableRowParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbPurgeDraftTableRowParams)->withTableIDOrName(...)
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
