<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An ID for a group of properties.
 *
 * @phpstan-type PropertyGroupShape = array{
 *   archived: bool, displayOrder: int, label: string, name: string
 * }
 */
final class PropertyGroup implements BaseModel
{
    /** @use SdkModel<PropertyGroupShape> */
    use SdkModel;

    #[Api]
    public bool $archived;

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    #[Api]
    public int $displayOrder;

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

        $obj['archived'] = $archived;
        $obj['displayOrder'] = $displayOrder;
        $obj['label'] = $label;
        $obj['name'] = $name;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The internal property group name, which must be used when referencing the property group via the API.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
