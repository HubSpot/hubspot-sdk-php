<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlowIDWorkflowIDMappingResponseShape = array{
 *   flowID: int, workflowID: int
 * }
 */
final class FlowIDWorkflowIDMappingResponse implements BaseModel
{
    /** @use SdkModel<FlowIDWorkflowIDMappingResponseShape> */
    use SdkModel;

    #[Api('flowId')]
    public int $flowID;

    #[Api('workflowId')]
    public int $workflowID;

    /**
     * `new FlowIDWorkflowIDMappingResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlowIDWorkflowIDMappingResponse::with(flowID: ..., workflowID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlowIDWorkflowIDMappingResponse)->withFlowID(...)->withWorkflowID(...)
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
    public static function with(int $flowID, int $workflowID): self
    {
        $obj = new self;

        $obj->flowID = $flowID;
        $obj->workflowID = $workflowID;

        return $obj;
    }

    public function withFlowID(int $flowID): self
    {
        $obj = clone $this;
        $obj->flowID = $flowID;

        return $obj;
    }

    public function withWorkflowID(int $workflowID): self
    {
        $obj = clone $this;
        $obj->workflowID = $workflowID;

        return $obj;
    }
}
