<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalValidatedFormFieldShape = array{
 *   isCustom: bool,
 *   label: string,
 *   name: string,
 *   value: string,
 *   fieldType?: string|null,
 *   translatedLabel?: string|null,
 *   valueLabel?: string|null,
 * }
 */
final class ExternalValidatedFormField implements BaseModel
{
    /** @use SdkModel<ExternalValidatedFormFieldShape> */
    use SdkModel;

    #[Required]
    public bool $isCustom;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Required]
    public string $value;

    #[Optional]
    public ?string $fieldType;

    #[Optional]
    public ?string $translatedLabel;

    #[Optional]
    public ?string $valueLabel;

    /**
     * `new ExternalValidatedFormField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalValidatedFormField::with(
     *   isCustom: ..., label: ..., name: ..., value: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalValidatedFormField)
     *   ->withIsCustom(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
        bool $isCustom,
        string $label,
        string $name,
        string $value,
        ?string $fieldType = null,
        ?string $translatedLabel = null,
        ?string $valueLabel = null,
    ): self {
        $self = new self;

        $self['isCustom'] = $isCustom;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['value'] = $value;

        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $translatedLabel && $self['translatedLabel'] = $translatedLabel;
        null !== $valueLabel && $self['valueLabel'] = $valueLabel;

        return $self;
    }

    public function withIsCustom(bool $isCustom): self
    {
        $self = clone $this;
        $self['isCustom'] = $isCustom;

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

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withTranslatedLabel(string $translatedLabel): self
    {
        $self = clone $this;
        $self['translatedLabel'] = $translatedLabel;

        return $self;
    }

    public function withValueLabel(string $valueLabel): self
    {
        $self = clone $this;
        $self['valueLabel'] = $valueLabel;

        return $self;
    }
}
