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
 * $params = (new HubdbReadTableRowsParams); // set properties as needed
 * $client->cms.hubdb->readTableRows(...$params->toArray());
 * ```
 * Get a set of rows.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->readTableRows(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->readTableRows
 *
 * @phpstan-type hubdb_read_table_rows_params = array{inputs: list<string>}
 */
final class HubdbReadTableRowsParams implements BaseModel
{
    /** @use SdkModel<hubdb_read_table_rows_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $inputs */
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * `new HubdbReadTableRowsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbReadTableRowsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbReadTableRowsParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
