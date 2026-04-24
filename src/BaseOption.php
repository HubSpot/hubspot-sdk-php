<?php

declare(strict_types=1);

namespace HubSpotSDK;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-type BaseOptionShape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class BaseOption implements BaseModel
{
    /** @use SdkModel<BaseOptionShape> */
    use SdkModel;

    /**
     * Hidden options will not be displayed in HubSpot.
     */
    #[Required]
    public bool $hidden;

    /**
     * A human-readable option label that will be shown in HubSpot.
     */
    #[Required]
    public string $label;

    /**
     * The internal value of the option, which must be used when setting the property value through the API.
     */
    #[Required]
    public string $value;

    /**
     * A description of the option.
     */
    #[Optional]
    public ?string $description;

    /**
     * Options are displayed in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * `new BaseOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BaseOption::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BaseOption)->withHidden(...)->withLabel(...)->withValue(...)
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

    /**
     * Hidden options will not be displayed in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * A human-readable option label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The internal value of the option, which must be used when setting the property value through the API.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * A description of the option.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Options are displayed in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
