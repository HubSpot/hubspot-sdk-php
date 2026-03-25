<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PipelineStagePatchInputShape = array{
 *   metadata: array<string,string>,
 *   archived?: bool|null,
 *   displayOrder?: int|null,
 *   label?: string|null,
 * }
 */
final class PipelineStagePatchInput implements BaseModel
{
    /** @use SdkModel<PipelineStagePatchInputShape> */
    use SdkModel;

    /** @var array<string,string> $metadata */
    #[Required(map: 'string')]
    public array $metadata;

    /**
     * Whether the pipeline is archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?int $displayOrder;

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    #[Optional]
    public ?string $label;

    /**
     * `new PipelineStagePatchInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineStagePatchInput::with(metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineStagePatchInput)->withMetadata(...)
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
        array $metadata,
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $self = new self;

        $self['metadata'] = $metadata;

        null !== $archived && $self['archived'] = $archived;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

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

    /**
     * Whether the pipeline is archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A label used to organize pipeline stages in HubSpot's UI. Each pipeline stage's label must be unique within that pipeline.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
