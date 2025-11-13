<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\WorkflowsService::batchGet()
 *
 * @phpstan-type WorkflowBatchGetParamsShape = array{
 *   inputs: list<APIFlowBatchFetchFlowIDCoordinate>
 * }
 */
final class WorkflowBatchGetParams implements BaseModel
{
    /** @use SdkModel<WorkflowBatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<APIFlowBatchFetchFlowIDCoordinate> $inputs */
    #[Api(list: APIFlowBatchFetchFlowIDCoordinate::class)]
    public array $inputs;

    /**
     * `new WorkflowBatchGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WorkflowBatchGetParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WorkflowBatchGetParams)->withInputs(...)
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
     * @param list<APIFlowBatchFetchFlowIDCoordinate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<APIFlowBatchFetchFlowIDCoordinate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
