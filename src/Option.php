<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-type option_alias = array{
 *   description: string,
 *   displayOrder: int,
 *   doubleData: float,
 *   hidden: bool,
 *   label: string,
 *   readOnly: bool,
 *   value: string,
 * }
 */
final class Option implements BaseModel
{
    /** @use SdkModel<option_alias> */
    use SdkModel;

    /**
     * A description of the option.
     */
    #[Api]
    public string $description;

    /**
     * The position of the item relative to others in the list.
     */
    #[Api]
    public int $displayOrder;

    #[Api]
    public float $doubleData;

    /**
     * Whether the option is displayed in HubSpot's UI.
     */
    #[Api]
    public bool $hidden;

    /**
     * A user-friendly label that identifies the option.
     */
    #[Api]
    public string $label;

    /**
     * Whether the option is read-only.
     */
    #[Api]
    public bool $readOnly;

    /**
     * The actual value of the option.
     */
    #[Api]
    public string $value;

    /**
     * `new Option()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Option::with(
     *   description: ...,
     *   displayOrder: ...,
     *   doubleData: ...,
     *   hidden: ...,
     *   label: ...,
     *   readOnly: ...,
     *   value: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Option)
     *   ->withDescription(...)
     *   ->withDisplayOrder(...)
     *   ->withDoubleData(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withReadOnly(...)
     *   ->withValue(...)
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
        string $description,
        int $displayOrder,
        float $doubleData,
        bool $hidden,
        string $label,
        bool $readOnly,
        string $value,
    ): self {
        $obj = new self;

        $obj->description = $description;
        $obj->displayOrder = $displayOrder;
        $obj->doubleData = $doubleData;
        $obj->hidden = $hidden;
        $obj->label = $label;
        $obj->readOnly = $readOnly;
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
     * The position of the item relative to others in the list.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withDoubleData(float $doubleData): self
    {
        $obj = clone $this;
        $obj->doubleData = $doubleData;

        return $obj;
    }

    /**
     * Whether the option is displayed in HubSpot's UI.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    /**
     * A user-friendly label that identifies the option.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * Whether the option is read-only.
     */
    public function withReadOnly(bool $readOnly): self
    {
        $obj = clone $this;
        $obj->readOnly = $readOnly;

        return $obj;
    }

    /**
     * The actual value of the option.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
