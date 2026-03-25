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
        $self = new self;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

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
}
