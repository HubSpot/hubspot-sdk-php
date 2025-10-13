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
 * $params = (new HubdbCloneDraftTableRowParams); // set properties as needed
 * $client->cms.hubdb->cloneDraftTableRow(...$params->toArray());
 * ```
 * Clones a single row in the draft version of a table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->cloneDraftTableRow(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->cloneDraftTableRow
 *
 * @phpstan-type hubdb_clone_draft_table_row_params = array{
 *   tableIDOrName: string, name?: string
 * }
 */
final class HubdbCloneDraftTableRowParams implements BaseModel
{
    /** @use SdkModel<hubdb_clone_draft_table_row_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new HubdbCloneDraftTableRowParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbCloneDraftTableRowParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbCloneDraftTableRowParams)->withTableIDOrName(...)
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
    public static function with(
        string $tableIDOrName,
        ?string $name = null
    ): self {
        $obj = new self;

        $obj->tableIDOrName = $tableIDOrName;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIDOrName = $tableIDOrName;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
