<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_pipelines_pipeline_input = array{
 *   displayOrder: int, label: string, stages: list<CRMPipelinesPipelineStageInput>
 * }
 */
final class CRMPipelinesPipelineInput implements BaseModel
{
    /** @use SdkModel<crm_pipelines_pipeline_input> */
    use SdkModel;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    /** @var list<CRMPipelinesPipelineStageInput> $stages */
    #[Api(list: CRMPipelinesPipelineStageInput::class)]
    public array $stages;

    /**
     * `new CRMPipelinesPipelineInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesPipelineInput::with(displayOrder: ..., label: ..., stages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesPipelineInput)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withStages(...)
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
     * @param list<CRMPipelinesPipelineStageInput> $stages
     */
    public static function with(
        int $displayOrder,
        string $label,
        array $stages
    ): self {
        $obj = new self;

        $obj->displayOrder = $displayOrder;
        $obj->label = $label;
        $obj->stages = $stages;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * @param list<CRMPipelinesPipelineStageInput> $stages
     */
    public function withStages(array $stages): self
    {
        $obj = clone $this;
        $obj->stages = $stages;

        return $obj;
    }
}
