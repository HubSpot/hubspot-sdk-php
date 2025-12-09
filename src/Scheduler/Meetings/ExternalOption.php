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

    #[Required]
    public string $description;

    #[Required]
    public int $displayOrder;

    #[Required]
    public float $doubleData;

    #[Required]
    public bool $hidden;

    #[Required]
    public string $label;

    #[Required]
    public bool $readOnly;

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

    public function withDoubleData(float $doubleData): self
    {
        $self = clone $this;
        $self['doubleData'] = $doubleData;

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

    public function withReadOnly(bool $readOnly): self
    {
        $self = clone $this;
        $self['readOnly'] = $readOnly;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
