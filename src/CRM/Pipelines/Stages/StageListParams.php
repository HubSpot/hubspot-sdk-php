<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines\Stages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Return all the stages associated with the pipeline identified by `{pipelineId}`.
 *
 * @see HubspotSDK\CRM\Pipelines\Stages->list
 *
 * @phpstan-type StageListParamsShape = array{objectType: string}
 */
final class StageListParams implements BaseModel
{
    /** @use SdkModel<StageListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * `new StageListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StageListParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StageListParams)->withObjectType(...)
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
