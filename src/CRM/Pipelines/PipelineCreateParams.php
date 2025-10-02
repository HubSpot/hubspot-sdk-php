<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PipelineCreateParams); // set properties as needed
 * $client->crm.pipelines->create(...$params->toArray());
 * ```
 * Create a pipeline.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->create(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->create
 *
 * @phpstan-type pipeline_create_params = array{
 *   displayOrder: int, label: string, stages: list<CRMPipelinesPipelineStageInput>
 * }
 */
final class PipelineCreateParams implements BaseModel
{
    /** @use SdkModel<pipeline_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    /** @var list<CRMPipelinesPipelineStageInput> $stages */
    #[Api(list: CRMPipelinesPipelineStageInput::class)]
    public array $stages;

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
