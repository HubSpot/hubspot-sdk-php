<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams\Input;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\WorkflowsService::batchGetIDMappings()
 *
 * @phpstan-import-type InputVariants from \HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams\Input
 * @phpstan-import-type InputShape from \HubspotSDK\Automation\Workflows\WorkflowBatchGetIDMappingsParams\Input
 *
 * @phpstan-type WorkflowBatchGetIDMappingsParamsShape = array{
 *   inputs: list<InputShape>
 * }
 */
final class WorkflowBatchGetIDMappingsParams implements BaseModel
{
    /** @use SdkModel<WorkflowBatchGetIDMappingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<InputVariants> $inputs */
    #[Required(list: Input::class)]
    public array $inputs;

    /**
     * `new WorkflowBatchGetIDMappingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WorkflowBatchGetIDMappingsParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WorkflowBatchGetIDMappingsParams)->withInputs(...)
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
     * @param list<InputShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * @param list<InputShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
