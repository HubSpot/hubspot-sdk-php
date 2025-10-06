<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type property_group = array{
 *   archived: bool, displayOrder: int, label: string, name: string
 * }
 */
final class PropertyGroup implements BaseModel
{
    /** @use SdkModel<property_group> */
    use SdkModel;

    #[Api]
    public bool $archived;

    #[Api]
    public int $displayOrder;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /**
     * `new PropertyGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGroup::with(archived: ..., displayOrder: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGroup)
     *   ->withArchived(...)
     *   ->withDisplayOrder(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
        bool $archived,
        int $displayOrder,
        string $label,
        string $name
    ): self {
        $obj = new self;

        $obj->archived = $archived;
        $obj->displayOrder = $displayOrder;
        $obj->label = $label;
        $obj->name = $name;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
