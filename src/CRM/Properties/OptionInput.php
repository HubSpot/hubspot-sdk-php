<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionInputShape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string,
 *   displayOrder?: int,
 * }
 */
final class OptionInput implements BaseModel
{
    /** @use SdkModel<OptionInputShape> */
    use SdkModel;

    /**
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
     */
    #[Api]
    public bool $hidden;

    /**
     * A human-readable option label that will be shown in HubSpot.
     */
    #[Api]
    public string $label;

    /**
     * The internal value of the option, which must be used when setting the property value through the API.
     */
    #[Api]
    public string $value;

    /**
     * A description of the option.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Options are shown in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * `new OptionInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OptionInput::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OptionInput)->withHidden(...)->withLabel(...)->withValue(...)
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
        $obj = new self;

        $obj->hidden = $hidden;
        $obj->label = $label;
        $obj->value = $value;

        null !== $description && $obj->description = $description;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    /**
     * A human-readable option label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The internal value of the option, which must be used when setting the property value through the API.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }

    /**
     * A description of the option.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Options are shown in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }
}
