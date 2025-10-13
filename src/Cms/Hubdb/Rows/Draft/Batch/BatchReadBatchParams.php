<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Draft\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchReadBatchParams); // set properties as needed
 * $client->cms.hubdb.rows.draft.batch->readBatch(...$params->toArray());
 * ```
 * Returns rows in the published version of the specified table, given a set of row IDs.
 * **Note:** This endpoint can be accessed without any authentication if the table is set to be allowed for public access.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows.draft.batch->readBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows\Draft\Batch->readBatch
 *
 * @phpstan-type batch_read_batch_params = array{inputs: list<string>}
 */
final class BatchReadBatchParams implements BaseModel
{
    /** @use SdkModel<batch_read_batch_params> */
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
     * `new BatchReadBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchReadBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchReadBatchParams)->withInputs(...)
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
