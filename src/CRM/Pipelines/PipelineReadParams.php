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
 * $params = (new PipelineReadParams); // set properties as needed
 * $client->crm.pipelines->read(...$params->toArray());
 * ```
 * Return the stage identified by `{stageId}` associated with the pipeline identified by `{pipelineId}`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->read(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->read
 *
 * @phpstan-type pipeline_read_params = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class PipelineReadParams implements BaseModel
{
    /** @use SdkModel<pipeline_read_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineID;

    /**
     * `new PipelineReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineReadParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineReadParams)->withObjectType(...)->withPipelineID(...)
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
