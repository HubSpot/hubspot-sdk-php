<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public bool $archived;

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    #[Required]
    public int $displayOrder;

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    #[Required]
    public string $label;

    /**
     * The internal property group name, which must be used when referencing the property group via the API.
     */
    #[Required]
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
        $self = new self;

        $self['archived'] = $archived;
        $self['displayOrder'] = $displayOrder;
        $self['label'] = $label;
        $self['name'] = $name;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * A human-readable label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The internal property group name, which must be used when referencing the property group via the API.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
