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
 * $params = (new PipelineDeleteParams); // set properties as needed
 * $client->crm.pipelines->delete(...$params->toArray());
 * ```
 * Delete a pipeline stage.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.pipelines->delete(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Pipelines->delete
 *
 * @phpstan-type pipeline_delete_params = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class PipelineDeleteParams implements BaseModel
{
    /** @use SdkModel<pipeline_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    #[Api]
    public string $pipelineID;

    /**
     * `new PipelineDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineDeleteParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineDeleteParams)->withObjectType(...)->withPipelineID(...)
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
