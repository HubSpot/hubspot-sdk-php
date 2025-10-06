<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type pipeline_stage_patch_input = array{
 *   archived?: bool,
 *   displayOrder?: int,
 *   label?: string,
 *   metadata?: array<string, string>,
 * }
 */
final class PipelineStagePatchInput implements BaseModel
{
    /** @use SdkModel<pipeline_stage_patch_input> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?string $label;

    /** @var array<string, string>|null $metadata */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string, string> $metadata
     */
    public static function with(
        ?bool $archived = null,
        ?int $displayOrder = null,
        ?string $label = null,
        ?array $metadata = null,
    ): self {
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;
        null !== $metadata && $obj->metadata = $metadata;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
