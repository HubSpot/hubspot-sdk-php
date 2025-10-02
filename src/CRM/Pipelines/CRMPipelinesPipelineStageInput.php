<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type crm_pipelines_pipeline_stage_input = array{
 *   displayOrder: int, label: string, metadata?: array<string, string>
 * }
 */
final class CRMPipelinesPipelineStageInput implements BaseModel
{
    /** @use SdkModel<crm_pipelines_pipeline_stage_input> */
    use SdkModel;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    /** @var array<string, string>|null $metadata */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    /**
     * `new CRMPipelinesPipelineStageInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPipelinesPipelineStageInput::with(displayOrder: ..., label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPipelinesPipelineStageInput)->withDisplayOrder(...)->withLabel(...)
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
     * @param array<string, string> $metadata
     */
    public static function with(
        int $displayOrder,
        string $label,
        ?array $metadata = null
    ): self {
        $obj = new self;

        $obj->displayOrder = $displayOrder;
        $obj->label = $label;

        null !== $metadata && $obj->metadata = $metadata;

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
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
