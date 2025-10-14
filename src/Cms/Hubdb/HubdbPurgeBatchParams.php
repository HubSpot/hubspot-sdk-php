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
 * $params = (new HubdbPurgeBatchParams); // set properties as needed
 * $client->cms.hubdb->purgeBatch(...$params->toArray());
 * ```
 * Permanently deletes rows from the draft version of the table, given a set of row IDs. Maximum of 100 row IDs per call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb->purgeBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb->purgeBatch
 *
 * @phpstan-type hubdb_purge_batch_params = array{inputs: list<string>}
 */
final class HubdbPurgeBatchParams implements BaseModel
{
    /** @use SdkModel<hubdb_purge_batch_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Api(list: 'string')]
    public array $inputs;

    /**
     * `new HubdbPurgeBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HubdbPurgeBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HubdbPurgeBatchParams)->withInputs(...)
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
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
