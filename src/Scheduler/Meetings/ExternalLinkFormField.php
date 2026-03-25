<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalOptionShape from \HubspotSDK\Scheduler\Meetings\ExternalOption
 *
 * @phpstan-type ExternalLinkFormFieldShape = array{
 *   fieldType: string,
 *   isCustom: bool,
 *   isRequired: bool,
 *   label: string,
 *   name: string,
 *   options: list<ExternalOption|ExternalOptionShape>,
 *   type: string,
 * }
 */
final class ExternalLinkFormField implements BaseModel
{
    /** @use SdkModel<ExternalLinkFormFieldShape> */
    use SdkModel;

    /**
     * The specific field type of the form field. Corresponds to property types (e.g., `select`, `radio`, `date`, etc).
     */
    #[Required]
    public string $fieldType;

    /**
     * Whether the form field is a custom field.
     */
    #[Required]
    public bool $isCustom;

    /**
     * Whether the form field is mandatory.
     */
    #[Required]
    public bool $isRequired;

    /**
     * The text label for the form field.
     */
    #[Required]
    public string $label;

    /**
     * The name identifier for the form field.
     */
    #[Required]
    public string $name;

    /** @var list<ExternalOption> $options */
    #[Required(list: ExternalOption::class)]
    public array $options;

    /**
     * The data type of the form field accepts (e.g. `date`, `enumeration`,  etc).
     */
    #[Required]
    public string $type;

    /**
     * `new ExternalLinkFormField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkFormField::with(
     *   fieldType: ...,
     *   isCustom: ...,
     *   isRequired: ...,
     *   label: ...,
     *   name: ...,
     *   options: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkFormField)
     *   ->withFieldType(...)
     *   ->withIsCustom(...)
     *   ->withIsRequired(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
     *   ->withType(...)
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
     *
     * @param list<ExternalOption|ExternalOptionShape> $options
     */
    public static function with(
        string $fieldType,
        bool $isCustom,
        bool $isRequired,
        string $label,
        string $name,
        array $options,
        string $type,
    ): self {
        $self = new self;

        $self['fieldType'] = $fieldType;
        $self['isCustom'] = $isCustom;
        $self['isRequired'] = $isRequired;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The specific field type of the form field. Corresponds to property types (e.g., `select`, `radio`, `date`, etc).
     */
    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

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
     * Whether the form field is mandatory.
     */
    public function withIsRequired(bool $isRequired): self
    {
        $self = clone $this;
        $self['isRequired'] = $isRequired;

        return $self;
    }

    /**
     * The text label for the form field.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name identifier for the form field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<ExternalOption|ExternalOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * The data type of the form field accepts (e.g. `date`, `enumeration`,  etc).
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
