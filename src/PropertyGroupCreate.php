<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyGroupCreateShape = array{
 *   label: string, name: string, displayOrder?: int|null
 * }
 */
final class PropertyGroupCreate implements BaseModel
{
    /** @use SdkModel<PropertyGroupCreateShape> */
    use SdkModel;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
    public ?int $displayOrder;

    /**
     * `new PropertyGroupCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGroupCreate::with(label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGroupCreate)->withLabel(...)->withName(...)
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
    public static function with(
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $obj = new self;

        $obj['label'] = $label;
        $obj['name'] = $name;

        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }
}
