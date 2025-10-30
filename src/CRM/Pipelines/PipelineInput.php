<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An input used to create or replace a pipeline's definition.
 *
 * @phpstan-type PipelineInputShape = array{
 *   displayOrder: int, label: string, stages: list<PipelineStageInput>
 * }
 */
final class PipelineInput implements BaseModel
{
    /** @use SdkModel<PipelineInputShape> */
    use SdkModel;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Api]
    public int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Api]
    public string $label;

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @var list<PipelineStageInput> $stages
     */
    #[Api(list: PipelineStageInput::class)]
    public array $stages;

    /**
     * `new PipelineInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineInput::with(displayOrder: ..., label: ..., stages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineInput)->withDisplayOrder(...)->withLabel(...)->withStages(...)
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
     * @param list<PipelineStageInput> $stages
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

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @param list<PipelineStageInput> $stages
     */
    public function withStages(array $stages): self
    {
        $obj = clone $this;
        $obj->stages = $stages;

        return $obj;
    }
}
