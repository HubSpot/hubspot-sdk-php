<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_flow_batch_input = array{
 *   inputs: list<APIFlowBatchFetchFlowIDCoordinate>
 * }
 */
final class APIFlowBatchInput implements BaseModel
{
    /** @use SdkModel<api_flow_batch_input> */
    use SdkModel;

    /** @var list<APIFlowBatchFetchFlowIDCoordinate> $inputs */
    #[Api(list: APIFlowBatchFetchFlowIDCoordinate::class)]
    public array $inputs;

    /**
     * `new APIFlowBatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFlowBatchInput::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFlowBatchInput)->withInputs(...)
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
