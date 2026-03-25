<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PipelineStageReplaceInputShape = array{
 *   displayOrder: int, label: string, metadata: array<string,string>
 * }
 */
final class PipelineStageReplaceInput implements BaseModel
{
    /** @use SdkModel<PipelineStageReplaceInputShape> */
    use SdkModel;

    #[Required]
    public int $displayOrder;

    #[Required]
    public string $label;

    /** @var array<string,string> $metadata */
    #[Required(map: 'string')]
    public array $metadata;

    /**
     * `new PipelineStageReplaceInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineStageReplaceInput::with(displayOrder: ..., label: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineStageReplaceInput)
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
        int $displayOrder,
        string $label,
        array $metadata
    ): self {
        $self = new self;

        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['metadata'] = $metadata;

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
