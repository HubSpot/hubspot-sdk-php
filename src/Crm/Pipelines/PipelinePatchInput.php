<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Pipelines;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PipelinePatchInputShape = array{
 *   archived?: bool|null, displayOrder?: int|null, label?: string|null
 * }
 */
final class PipelinePatchInput implements BaseModel
{
    /** @use SdkModel<PipelinePatchInputShape> */
    use SdkModel;

    /**
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    #[Optional]
    public ?string $label;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null
    ): self {
        $self = new self;

        null !== $archived && $self['archived'] = $archived;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    /**
     * Whether the pipeline is archived. This property should only be provided when restoring an archived pipeline. If it's provided in any other call, the request will fail and a `400 Bad Request` will be returned.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * The order for displaying this pipeline. If two pipelines have a matching `displayOrder`, they will be sorted alphabetically by label.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A unique label used to organize pipelines in HubSpot's UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
