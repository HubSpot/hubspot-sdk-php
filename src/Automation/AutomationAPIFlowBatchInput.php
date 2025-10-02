<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_flow_batch_input = array{
 *   inputs: list<AutomationAPIFlowBatchFetchFlowIDCoordinate>
 * }
 */
final class AutomationAPIFlowBatchInput implements BaseModel
{
    /** @use SdkModel<automation_api_flow_batch_input> */
    use SdkModel;

    /** @var list<AutomationAPIFlowBatchFetchFlowIDCoordinate> $inputs */
    #[Api(list: AutomationAPIFlowBatchFetchFlowIDCoordinate::class)]
    public array $inputs;

    /**
     * `new AutomationAPIFlowBatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIFlowBatchInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIFlowBatchInput)->withInputs(...)
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
     * @param list<AutomationAPIFlowBatchFetchFlowIDCoordinate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<AutomationAPIFlowBatchFetchFlowIDCoordinate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
