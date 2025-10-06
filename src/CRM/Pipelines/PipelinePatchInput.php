<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Pipelines;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type pipeline_patch_input = array{
 *   archived?: bool, displayOrder?: int, label?: string
 * }
 */
final class PipelinePatchInput implements BaseModel
{
    /** @use SdkModel<pipeline_patch_input> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $archived;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $archived && $obj->archived = $archived;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $label && $obj->label = $label;

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
}
