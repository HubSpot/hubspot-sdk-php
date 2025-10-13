<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type property_group_create = array{
 *   label: string, name: string, displayOrder?: int
 * }
 */
final class PropertyGroupCreate implements BaseModel
{
    /** @use SdkModel<property_group_create> */
    use SdkModel;

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    #[Api]
    public string $label;

    /**
     * The internal property group name, which must be used when referencing the property group via the API.
     */
    #[Api]
    public string $name;

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    #[Api(optional: true)]
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

        $obj->label = $label;
        $obj->name = $name;

        null !== $displayOrder && $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The internal property group name, which must be used when referencing the property group via the API.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }
}
