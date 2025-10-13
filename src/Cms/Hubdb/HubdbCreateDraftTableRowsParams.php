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
 * $params = (new HubdbCreateDraftTableRowsParams); // set properties as needed
 * $client->cms.hubdb->createDraftTableRows(...$params->toArray());
 * ```
 * Creates rows in the draft version of the specified table, given an array of row objects. Maximum of 100 row object per call. See the overview section for more details with an example.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->createDraftTableRows(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->createDraftTableRows
 *
 * @phpstan-type hubdb_create_draft_table_rows_params = array{
 *   inputs: list<HubDBTableRowV3Request>
 * }
 */
final class HubdbCreateDraftTableRowsParams implements BaseModel
{
    /** @use SdkModel<hubdb_create_draft_table_rows_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3Request> $inputs */
    #[Api(list: HubDBTableRowV3Request::class)]
    public array $inputs;

    /**
     * `new HubdbCreateDraftTableRowsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbCreateDraftTableRowsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbCreateDraftTableRowsParams)->withInputs(...)
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
     * @param list<HubDBTableRowV3Request> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowV3Request> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
