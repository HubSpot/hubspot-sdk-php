<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new pipeline with the provided property values. The entire pipeline object, including its unique ID, will be returned in the response.
 *
 * @see HubSpotSDK\Services\Crm\PipelinesService::create()
 *
 * @phpstan-import-type PipelineStageInputShape from \HubSpotSDK\Crm\Pipelines\PipelineStageInput
 *
 * @phpstan-type PipelineCreateParamsShape = array{
 *   displayOrder: int,
 *   label: string,
 *   stages: list<PipelineStageInput|PipelineStageInputShape>,
 *   pipelineID?: string|null,
 * }
 */
final class PipelineCreateParams implements BaseModel
{
    /** @use SdkModel<PipelineCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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

    #[Optional('pipelineId')]
    public ?string $pipelineID;

    /**
     * `new PipelineCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineCreateParams::with(displayOrder: ..., label: ..., stages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineCreateParams)
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
        array $stages,
        ?string $pipelineID = null
    ): self {
        $self = new self;

        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['stages'] = $stages;

        null !== $pipelineID && $self['pipelineID'] = $pipelineID;

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
     * @param list<PipelineStageInput|PipelineStageInputShape> $stages
     */
    public function withStages(array $stages): self
    {
        $self = clone $this;
        $self['stages'] = $stages;

        return $self;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $self = clone $this;
        $self['pipelineID'] = $pipelineID;

        return $self;
    }
}
