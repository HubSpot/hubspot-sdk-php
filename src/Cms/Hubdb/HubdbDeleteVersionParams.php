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
 * $params = (new HubdbDeleteVersionParams); // set properties as needed
 * $client->cms.hubdb->deleteVersion(...$params->toArray());
 * ```
 * Delete a specific version of a table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->deleteVersion(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->deleteVersion
 *
 * @phpstan-type hubdb_delete_version_params = array{tableIDOrName: string}
 */
final class HubdbDeleteVersionParams implements BaseModel
{
    /** @use SdkModel<hubdb_delete_version_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $tableIDOrName;

    /**
     * `new HubdbDeleteVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbDeleteVersionParams::with(tableIDOrName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbDeleteVersionParams)->withTableIDOrName(...)
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
