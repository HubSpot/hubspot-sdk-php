<?php

declare(strict_types=1);

namespace HubSpotSDK\Scheduler\Meetings;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

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

    /**
     * Whether the form field is a custom field.
     */
    #[Required]
    public bool $isCustom;

    /**
     * The text label associated with the form field.
     */
    #[Required]
    public string $label;

    /**
     * The name identifier for the form field, includes underscores in place of spaces (e.g., the label `my form` is converted to `my_form`).
     */
    #[Required]
    public string $name;

    /**
     * The value associated with the form field.
     */
    #[Required]
    public string $value;

    /**
     * The specific input type of the form field. Corresponds to property types (e.g., `select`, `radio`, `date`, etc).
     */
    #[Optional]
    public ?string $fieldType;

    /**
     * The translated text label for the form field.
     */
    #[Optional]
    public ?string $translatedLabel;

    /**
     * The text label associated to a form field selection or option.
     */
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

    /**
     * Whether the form field is a custom field.
     */
    public function withIsCustom(bool $isCustom): self
    {
        $self = clone $this;
        $self['isCustom'] = $isCustom;

        return $self;
    }

    /**
     * The text label associated with the form field.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name identifier for the form field, includes underscores in place of spaces (e.g., the label `my form` is converted to `my_form`).
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value associated with the form field.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The specific input type of the form field. Corresponds to property types (e.g., `select`, `radio`, `date`, etc).
     */
    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * The translated text label for the form field.
     */
    public function withTranslatedLabel(string $translatedLabel): self
    {
        $self = clone $this;
        $self['translatedLabel'] = $translatedLabel;

        return $self;
    }

    /**
     * The text label associated to a form field selection or option.
     */
    public function withValueLabel(string $valueLabel): self
    {
        $self = clone $this;
        $self['valueLabel'] = $valueLabel;

        return $self;
    }
}
