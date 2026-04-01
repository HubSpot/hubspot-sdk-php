<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Return all the stages associated with the pipeline identified by `{pipelineId}`.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::listStages()
 *
 * @phpstan-type PipelineListStagesParamsShape = array{objectType: string}
 */
final class PipelineListStagesParams implements BaseModel
{
    /** @use SdkModel<PipelineListStagesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new PipelineListStagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineListStagesParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineListStagesParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
