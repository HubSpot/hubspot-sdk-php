<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific stage from a pipeline using its ID.
 *
 * @see HubspotSDK\Services\Crm\Pipelines\StagesService::get()
 *
 * @phpstan-type StageGetParamsShape = array{
 *   objectType: string, pipelineID: string
 * }
 */
final class StageGetParams implements BaseModel
{
    /** @use SdkModel<StageGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineID;

    /**
     * `new StageGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageGetParams::with(objectType: ..., pipelineID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageGetParams)->withObjectType(...)->withPipelineID(...)
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

        $obj['objectType'] = $objectType;
        $obj['pipelineID'] = $pipelineID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    public function withPipelineID(string $pipelineID): self
    {
        $obj = clone $this;
        $obj['pipelineID'] = $pipelineID;

        return $obj;
    }
}
