<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type Option1Shape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class Option1 implements BaseModel
{
    /** @use SdkModel<Option1Shape> */
    use SdkModel;

    #[Required]
    public bool $hidden;

    #[Required]
    public string $label;

    #[Required]
    public string $value;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?int $displayOrder;

    /**
     * `new Option1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option1::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option1)->withHidden(...)->withLabel(...)->withValue(...)
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
        bool $hidden,
        string $label,
        string $value,
        ?string $description = null,
        ?int $displayOrder = null,
    ): self {
        $self = new self;

        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['value'] = $value;

        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
