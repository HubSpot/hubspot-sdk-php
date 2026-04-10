<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Return a reverse chronological list of all mutations that have occurred on the pipeline stage identified by `{stageId}`.
 *
 * @see HubSpotSDK\Services\Crm\PipelinesService::listStageAudit()
 *
 * @phpstan-type PipelineListStageAuditParamsShape = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class PipelineListStageAuditParams implements BaseModel
{
    /** @use SdkModel<PipelineListStageAuditParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineID;

    /**
     * `new PipelineListStageAuditParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineListStageAuditParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineListStageAuditParams)->withObjectType(...)->withPipelineID(...)
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
