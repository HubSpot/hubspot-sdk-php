<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb\Rows\Batch;

use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Updates multiple rows as a batch in the draft version of the table, with a maximum of 100 rows per call. See the endpoint `PATCH /tables/{tableIdOrName}/rows/{rowId}/draft` for details on updating a single row.
 *
 * @see HubspotSDK\Cms\Hubdb\Rows\Batch->updateBatch
 *
 * @phpstan-type BatchUpdateBatchParamsShape = array{
 *   inputs: list<HubDBTableRowV3BatchUpdateRequest>
 * }
 */
final class BatchUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<BatchUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<HubDBTableRowV3BatchUpdateRequest> $inputs */
    #[Api(list: HubDBTableRowV3BatchUpdateRequest::class)]
    public array $inputs;

    /**
     * `new BatchUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpdateBatchParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpdateBatchParams)->withInputs(...)
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
