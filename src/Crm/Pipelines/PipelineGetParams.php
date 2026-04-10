<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Pipelines;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Return a single pipeline object identified by its unique `{pipelineId}`.
 *
 * @see HubSpotSDK\Services\Crm\PipelinesService::get()
 *
 * @phpstan-type PipelineGetParamsShape = array{objectType: string}
 */
final class PipelineGetParams implements BaseModel
{
    /** @use SdkModel<PipelineGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new PipelineGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineGetParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineGetParams)->withObjectType(...)
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
