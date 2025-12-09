<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertiesOptionInputShape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class PropertiesOptionInput implements BaseModel
{
    /** @use SdkModel<PropertiesOptionInputShape> */
    use SdkModel;

    /**
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
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
     * Options are shown in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * `new PropertiesOptionInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertiesOptionInput::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertiesOptionInput)->withHidden(...)->withLabel(...)->withValue(...)
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
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
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
     * Options are shown in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
