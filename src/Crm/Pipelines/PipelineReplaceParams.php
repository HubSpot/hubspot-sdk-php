<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\PipelinesService::replace()
 *
 * @phpstan-type PipelineReplaceParamsShape = array{
 *   objectType: string,
 *   pipelineID: string,
 *   displayOrder: int,
 *   label: string,
 *   metadata: array<string,string>,
 * }
 */
final class PipelineReplaceParams implements BaseModel
{
    /** @use SdkModel<PipelineReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $pipelineID;

    #[Required]
    public int $displayOrder;

    #[Required]
    public string $label;

    /** @var array<string,string> $metadata */
    #[Required(map: 'string')]
    public array $metadata;

    /**
     * `new PipelineReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineReplaceParams::with(
     *   objectType: ..., pipelineID: ..., displayOrder: ..., label: ..., metadata: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineReplaceParams)
     *   ->withObjectType(...)
     *   ->withPipelineID(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withMetadata(...)
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
     *
     * @param array<string,string> $metadata
     */
    public static function with(
        string $objectType,
        string $pipelineID,
        int $displayOrder,
        string $label,
        array $metadata,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['pipelineID'] = $pipelineID;
        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['metadata'] = $metadata;

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

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
