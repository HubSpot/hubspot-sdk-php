<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A HubSpot property option.
 *
 * @phpstan-type AutomationActionsOptionShape = array{
 *   description: string,
 *   displayOrder: int,
 *   doubleData: float,
 *   hidden: bool,
 *   label: string,
 *   readOnly: bool,
 *   value: string,
 * }
 */
final class AutomationActionsOption implements BaseModel
{
    /** @use SdkModel<AutomationActionsOptionShape> */
    use SdkModel;

    /**
     * A description of the option.
     */
    #[Required]
    public string $description;

    /**
     * The position of the item relative to others in the list.
     */
    #[Required]
    public int $displayOrder;

    #[Required]
    public float $doubleData;

    /**
     * Whether the option is displayed in HubSpot's UI.
     */
    #[Required]
    public bool $hidden;

    /**
     * A user-friendly label that identifies the option.
     */
    #[Required]
    public string $label;

    /**
     * Whether the option is read-only.
     */
    #[Required]
    public bool $readOnly;

    /**
     * The actual value of the option.
     */
    #[Required]
    public string $value;

    /**
     * `new AutomationActionsOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationActionsOption::with(
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
     * (new AutomationActionsOption)
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
        $self = new self;

        $self['description'] = $description;
        $self['displayOrder'] = $displayOrder;
        $self['doubleData'] = $doubleData;
        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['readOnly'] = $readOnly;
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
     * The position of the item relative to others in the list.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withDoubleData(float $doubleData): self
    {
        $self = clone $this;
        $self['doubleData'] = $doubleData;

        return $self;
    }

    /**
     * Whether the option is displayed in HubSpot's UI.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * A user-friendly label that identifies the option.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Whether the option is read-only.
     */
    public function withReadOnly(bool $readOnly): self
    {
        $self = clone $this;
        $self['readOnly'] = $readOnly;

        return $self;
    }

    /**
     * The actual value of the option.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
