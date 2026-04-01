<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
 *
 * @see HubspotSDK\Services\Crm\PipelinesService::listAudit()
 *
 * @phpstan-type PipelineListAuditParamsShape = array{objectType: string}
 */
final class PipelineListAuditParams implements BaseModel
{
    /** @use SdkModel<PipelineListAuditParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new PipelineListAuditParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineListAuditParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineListAuditParams)->withObjectType(...)
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
