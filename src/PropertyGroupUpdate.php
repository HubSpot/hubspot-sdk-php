<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyGroupUpdateShape = array{
 *   displayOrder?: int|null, label?: string|null
 * }
 */
final class PropertyGroupUpdate implements BaseModel
{
    /** @use SdkModel<PropertyGroupUpdateShape> */
    use SdkModel;

    #[Optional]
    public ?int $displayOrder;

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
        ?int $displayOrder = null,
        ?string $label = null
    ): self {
        $obj = new self;

        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $label && $obj['label'] = $label;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }
}
