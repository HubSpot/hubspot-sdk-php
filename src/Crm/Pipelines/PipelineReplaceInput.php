<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PipelineStageInputShape from \HubSpotSDK\Crm\Pipelines\PipelineStageInput
 *
 * @phpstan-type PipelineReplaceInputShape = array{
 *   displayOrder: int,
 *   label: string,
 *   stages: list<PipelineStageInput|PipelineStageInputShape>,
 * }
 */
final class PipelineReplaceInput implements BaseModel
{
    /** @use SdkModel<PipelineReplaceInputShape> */
    use SdkModel;

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Required]
    public int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Required]
    public string $label;

    /**
     * The stages associated with the pipeline. They can be retrieved and updated via the pipeline stages endpoints.
     *
     * @var list<PipelineStageInput> $stages
     */
    #[Required(list: PipelineStageInput::class)]
    public array $stages;

    /**
     * `new PipelineReplaceInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineReplaceInput::with(displayOrder: ..., label: ..., stages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineReplaceInput)
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
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages
     */
    public static function with(
        int $displayOrder,
        string $label,
        array $stages
    ): self {
        $self = new self;

        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['stages'] = $stages;

        return $self;
    }

    /**
     * The order for displaying this pipeline stage. If two pipeline stages have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The stages associated with the pipeline. They can be retrieved and updated via the pipeline stages endpoints.
     *
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages
     */
    public function withStages(array $stages): self
    {
        $self = clone $this;
        $self['stages'] = $stages;

        return $self;
    }
}
