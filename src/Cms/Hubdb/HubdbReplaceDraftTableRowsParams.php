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
 * $params = (new HubdbReplaceDraftTableRowsParams); // set properties as needed
 * $client->cms.hubdb->replaceDraftTableRows(...$params->toArray());
 * ```
 * Replace rows in batch in draft table.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->replaceDraftTableRows(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->replaceDraftTableRows
 *
 * @phpstan-type hubdb_replace_draft_table_rows_params = array{
 *   inputs: list<HubDBTableRowV3BatchUpdateRequest>
 * }
 */
final class HubdbReplaceDraftTableRowsParams implements BaseModel
{
    /** @use SdkModel<hubdb_replace_draft_table_rows_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Api(list: HubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new HubdbReplaceDraftTableRowsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbReplaceDraftTableRowsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbReplaceDraftTableRowsParams)->withInputs(...)
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
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3BatchUpdateRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
