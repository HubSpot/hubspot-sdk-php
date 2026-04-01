<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a pipeline stage.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::deleteStage()
 *
 * @phpstan-type PipelineDeleteStageParamsShape = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class PipelineDeleteStageParams implements BaseModel
{
    /** @use SdkModel<PipelineDeleteStageParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineID;

    /**
     * `new PipelineDeleteStageParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineDeleteStageParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineDeleteStageParams)->withObjectType(...)->withPipelineID(...)
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
     */
    public static function with(string $objectType, string $pipelineID): self
    {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['pipelineID'] = $pipelineID;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $self = clone $this;
        $self['pipelineID'] = $pipelineID;

        return $self;
    }
}
