<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete the pipeline stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.
 *
 * @see HubspotSDK\CRM\Pipelines\Stages->delete
 *
 * @phpstan-type stage_delete_params = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class StageDeleteParams implements BaseModel
{
    /** @use SdkModel<stage_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineID;

    /**
     * `new StageDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageDeleteParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageDeleteParams)->withObjectType(...)->withPipelineID(...)
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
        $obj = new self;

        $obj->objectType = $objectType;
        $obj->pipelineID = $pipelineID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $obj = clone $this;
        $obj->pipelineID = $pipelineID;

        return $obj;
    }
}
