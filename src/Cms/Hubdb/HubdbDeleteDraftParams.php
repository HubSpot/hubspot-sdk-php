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
 * $params = (new HubdbDeleteDraftParams); // set properties as needed
 * $client->cms.hubdb->deleteDraft(...$params->toArray());
 * ```
 * Permanently deletes a row from a table's draft version.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->deleteDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->deleteDraft
 *
 * @phpstan-type hubdb_delete_draft_params = array{tableIDOrName: string}
 */
final class HubdbDeleteDraftParams implements BaseModel
{
    /** @use SdkModel<hubdb_delete_draft_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    /**
     * `new HubdbDeleteDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbDeleteDraftParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbDeleteDraftParams)->withTableIDOrName(...)
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
