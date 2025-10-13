<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Draft\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchCloneBatchParams); // set properties as needed
 * $client->cms.hubdb.rows.draft.batch->cloneBatch(...$params->toArray());
 * ```
 * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.hubdb.rows.draft.batch->cloneBatch(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Hubdb\Rows\Draft\Batch->cloneBatch
 *
 * @phpstan-type batch_clone_batch_params = array{
 *   inputs: list<HubDBTableRowBatchCloneRequest>
 * }
 */
final class BatchCloneBatchParams implements BaseModel
{
    /** @use SdkModel<batch_clone_batch_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowBatchCloneRequest> $inputs */
    #[Api(list: HubDBTableRowBatchCloneRequest::class)]
    public array $inputs;

    /**
     * `new BatchCloneBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCloneBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCloneBatchParams)->withInputs(...)
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
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowBatchCloneRequest> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
