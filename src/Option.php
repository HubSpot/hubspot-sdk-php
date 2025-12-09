<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The options available when a property is an enumeration.
 *
 * @phpstan-type OptionShape = array{
 *   hidden: bool,
 *   label: string,
 *   value: string,
 *   description?: string|null,
 *   displayOrder?: int|null,
 * }
 */
final class Option implements BaseModel
{
    /** @use SdkModel<OptionShape> */
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
     * `new Option()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option::with(hidden: ..., label: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option)->withHidden(...)->withLabel(...)->withValue(...)
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

        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['value'] = $value;

        null !== $description && $obj['description'] = $description;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * Hidden options will not be displayed in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    /**
     * A human-readable option label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The internal value of the option, which must be used when setting the property value through the API.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * A description of the option.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Options are displayed in order starting with the lowest positive integer value. Values of -1 will cause the option to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }
}
