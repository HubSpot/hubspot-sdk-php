<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyGroupShape = array{
 *   archived: bool, label: string, name: string, displayOrder?: int|null
 * }
 */
final class PropertyGroup implements BaseModel
{
    /** @use SdkModel<PropertyGroupShape> */
    use SdkModel;

    #[Required]
    public bool $archived;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
    public ?int $displayOrder;

    /**
     * `new PropertyGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGroup::with(archived: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGroup)->withArchived(...)->withLabel(...)->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $self = new self;

        $self['archived'] = $archived;
        $self['label'] = $label;
        $self['name'] = $name;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
