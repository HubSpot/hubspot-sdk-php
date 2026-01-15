<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\WorkflowsService::batchGet()
 *
 * @phpstan-import-type APIFlowBatchFetchFlowIDCoordinateShape from \HubspotSDK\Automation\Workflows\APIFlowBatchFetchFlowIDCoordinate
 *
 * @phpstan-type WorkflowBatchGetParamsShape = array{
 *   inputs: list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape>,
 * }
 */
final class WorkflowBatchGetParams implements BaseModel
{
    /** @use SdkModel<WorkflowBatchGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<APIFlowBatchFetchFlowIDCoordinate> $inputs */
    #[Required(list: APIFlowBatchFetchFlowIDCoordinate::class)]
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
     * @param list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<APIFlowBatchFetchFlowIDCoordinate|APIFlowBatchFetchFlowIDCoordinateShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
