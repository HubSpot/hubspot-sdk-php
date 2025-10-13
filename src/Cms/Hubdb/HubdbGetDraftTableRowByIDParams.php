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
 * $params = (new HubdbGetDraftTableRowByIDParams); // set properties as needed
 * $client->cms.hubdb->getDraftTableRowByID(...$params->toArray());
 * ```
 * Get a row from the draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->getDraftTableRowByID(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->getDraftTableRowByID
 *
 * @phpstan-type hubdb_get_draft_table_row_by_id_params = array{
 *   tableIDOrName: string, archived?: bool
 * }
 */
final class HubdbGetDraftTableRowByIDParams implements BaseModel
{
    /** @use SdkModel<hubdb_get_draft_table_row_by_id_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * `new HubdbGetDraftTableRowByIDParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbGetDraftTableRowByIDParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbGetDraftTableRowByIDParams)->withTableIDOrName(...)
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
        ?bool $archived = null
    ): self {
        $obj = new self;

        $obj->tableIDOrName = $tableIDOrName;

        null !== $archived && $obj->archived = $archived;

        return $obj;
    }

    public function withTableIDOrName(string $tableIDOrName): self
    {
        $obj = clone $this;
        $obj->tableIDOrName = $tableIDOrName;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }
}
