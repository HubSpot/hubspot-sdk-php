<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Clones rows in the draft version of the specified table, given a set of row ids. Maximum of 100 row ids per call.
 *
 * @see HubspotSDK\Services\Cms\Hubdb\Rows\BatchService::cloneBatch()
 *
 * @phpstan-type BatchCloneBatchParamsShape = array{
 *   inputs: list<HubDBTableRowBatchCloneRequest|array{
 *     id: string, name?: string|null
 *   }>,
 * }
 */
final class BatchCloneBatchParams implements BaseModel
{
    /** @use SdkModel<BatchCloneBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowBatchCloneRequest> $inputs */
    #[Required(list: HubDBTableRowBatchCloneRequest::class)]
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
     * @param list<HubDBTableRowBatchCloneRequest|array{
     *   id: string, name?: string|null
     * }> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj['inputs'] = $inputs;

        return $obj;
    }

    /**
     * @param list<HubDBTableRowBatchCloneRequest|array{
     *   id: string, name?: string|null
     * }> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj['inputs'] = $inputs;

        return $obj;
    }
}
