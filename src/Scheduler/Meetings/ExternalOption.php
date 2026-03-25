<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalOptionShape = array{
 *   description: string,
 *   displayOrder: int,
 *   doubleData: float,
 *   hidden: bool,
 *   label: string,
 *   readOnly: bool,
 *   value: string,
 * }
 */
final class ExternalOption implements BaseModel
{
    /** @use SdkModel<ExternalOptionShape> */
    use SdkModel;

    /**
     * A brief description of the option.
     */
    #[Required]
    public string $description;

    /**
     * The order in which the option should be displayed.
     */
    #[Required]
    public int $displayOrder;

    /**
     * Deprecated property. Will always be 0.
     */
    #[Required]
    public float $doubleData;

    /**
     * Whether the option should be hidden from the user.
     */
    #[Required]
    public bool $hidden;

    /**
     * The text label for the option.
     */
    #[Required]
    public string $label;

    /**
     * Whether the option is read-only.
     */
    #[Required]
    public bool $readOnly;

    /**
     * The value associated with the option.
     */
    #[Required]
    public string $value;

    /**
     * `new ExternalOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalOption::with(
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
     * (new ExternalOption)
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
     * A brief description of the option.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The order in which the option should be displayed.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * Deprecated property. Will always be 0.
     */
    public function withDoubleData(float $doubleData): self
    {
        $self = clone $this;
        $self['doubleData'] = $doubleData;

        return $self;
    }

    /**
     * Whether the option should be hidden from the user.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * The text label for the option.
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
     * The value associated with the option.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
