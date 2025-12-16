<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An input used to create or replace a pipeline's definition.
 *
 * @phpstan-import-type PipelineStageInputShape from \HubspotSDK\Crm\Pipelines\PipelineStageInput
 *
 * @phpstan-type PipelineInputShape = array{
 *   displayOrder: int, label: string, stages: list<PipelineStageInputShape>
 * }
 */
final class PipelineInput implements BaseModel
{
    /** @use SdkModel<PipelineInputShape> */
    use SdkModel;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Required]
    public int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Required]
    public string $label;

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @var list<PipelineStageInput> $stages
     */
    #[Required(list: PipelineStageInput::class)]
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
     * @param list<PipelineStageInputShape> $stages
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
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Pipeline stage inputs used to create the new or replacement pipeline.
     *
     * @param list<PipelineStageInputShape> $stages
     */
    public function withStages(array $stages): self
    {
        $self = clone $this;
        $self['stages'] = $stages;

        return $self;
    }
}
