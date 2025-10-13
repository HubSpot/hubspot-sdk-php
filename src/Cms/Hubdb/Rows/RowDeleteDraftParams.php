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
 * $params = (new RowDeleteDraftParams); // set properties as needed
 * $client->cms.hubdb.rows->deleteDraft(...$params->toArray());
 * ```
 * Permanently deletes a row from a table's draft version.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows->deleteDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows->deleteDraft
 *
 * @phpstan-type row_delete_draft_params = array{tableIDOrName: string}
 */
final class RowDeleteDraftParams implements BaseModel
{
    /** @use SdkModel<row_delete_draft_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    /**
     * `new RowDeleteDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RowDeleteDraftParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RowDeleteDraftParams)->withTableIDOrName(...)
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
