<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required('flowId')]
    public int $flowID;

    #[Required('workflowId')]
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
        $self = new self;

        $self['flowID'] = $flowID;
        $self['workflowID'] = $workflowID;

        return $self;
    }

    public function withFlowID(int $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }

    public function withWorkflowID(int $workflowID): self
    {
        $self = clone $this;
        $self['workflowID'] = $workflowID;

        return $self;
    }
}
