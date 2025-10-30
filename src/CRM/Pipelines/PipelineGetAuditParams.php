<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Return a reverse chronological list of all mutations that have occurred on the pipeline identified by `{pipelineId}`.
 *
 * @see HubspotSDK\CRM\Pipelines->getAudit
 *
 * @phpstan-type PipelineGetAuditParamsShape = array{objectType: string}
 */
final class PipelineGetAuditParams implements BaseModel
{
    /** @use SdkModel<PipelineGetAuditParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new PipelineGetAuditParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineGetAuditParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineGetAuditParams)->withObjectType(...)
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
        $obj = new self;

        $obj->objectType = $objectType;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
