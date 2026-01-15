<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MultipleCheckboxesField\FieldType;

/**
 * A form field consisting of a set of checkboxes allowing multiple choices to be selected at one time.
 *
 * @phpstan-import-type EnumeratedFieldOptionShape from \HubspotSDK\Marketing\Forms\EnumeratedFieldOption
 *
 * @phpstan-type MultipleCheckboxesFieldShape = array{
 *   defaultValues: list<string>,
 *   dependentFields: list<mixed>,
 *   fieldType: FieldType|value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   options: list<EnumeratedFieldOption|EnumeratedFieldOptionShape>,
 *   required: bool,
 *   description?: string|null,
 * }
 */
final class MultipleCheckboxesField implements BaseModel
{
    /** @use SdkModel<MultipleCheckboxesFieldShape> */
    use SdkModel;

    /**
     * The values selected by default. Those values will be submitted unless the customer modifies them.
     *
     * @var list<string> $defaultValues
     */
    #[Required(list: 'string')]
    public array $defaultValues;

    /**
     * A list of other fields to make visible based on the value filled in for this field.
     *
     * @var list<mixed> $dependentFields
     */
    #[Required(list: DependentField::class)]
    public array $dependentFields;

    /**
     * Determines how the field will be displayed and validated.
     *
     * @var value-of<FieldType> $fieldType
     */
    #[Required(enum: FieldType::class)]
    public string $fieldType;

    /**
     * Whether a field should be hidden or not. Hidden fields won't appear on the form, but can be used to pass a value to a property without requiring the customer to fill it in.
     */
    #[Required]
    public bool $hidden;

    /**
     * The main label for the form field.
     */
    #[Required]
    public string $label;

    /**
     * The identifier of the field. In combination with the object type ID, it must be unique.
     */
    #[Required]
    public string $name;

    /**
     * A unique ID for this field's CRM object type. For example a CONTACT field will have the object type ID 0-1.
     */
    #[Required('objectTypeId')]
    public string $objectTypeID;

    /**
     * The list of available choices for this field.
     *
     * @var list<EnumeratedFieldOption> $options
     */
    #[Required(list: EnumeratedFieldOption::class)]
    public array $options;

    /**
     * Whether a value for this field is required when submitting the form.
     */
    #[Required]
    public bool $required;

    /**
     * Additional text helping the customer to complete the field.
     */
    #[Optional]
    public ?string $description;

    /**
     * `new MultipleCheckboxesField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MultipleCheckboxesField::with(
     *   defaultValues: ...,
     *   dependentFields: ...,
     *   fieldType: ...,
     *   hidden: ...,
     *   label: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   options: ...,
     *   required: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MultipleCheckboxesField)
     *   ->withDefaultValues(...)
     *   ->withDependentFields(...)
     *   ->withFieldType(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withOptions(...)
     *   ->withRequired(...)
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
     * @param list<string> $defaultValues
     * @param list<mixed> $dependentFields
     * @param list<EnumeratedFieldOption|EnumeratedFieldOptionShape> $options
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        array $defaultValues,
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeID,
        array $options,
        bool $required,
        FieldType|string $fieldType = 'multiple_checkboxes',
        ?string $description = null,
    ): self {
        $self = new self;

        $self['defaultValues'] = $defaultValues;
        $self['dependentFields'] = $dependentFields;
        $self['fieldType'] = $fieldType;
        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['options'] = $options;
        $self['required'] = $required;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * The values selected by default. Those values will be submitted unless the customer modifies them.
     *
     * @param list<string> $defaultValues
     */
    public function withDefaultValues(array $defaultValues): self
    {
        $self = clone $this;
        $self['defaultValues'] = $defaultValues;

        return $self;
    }

    /**
     * A list of other fields to make visible based on the value filled in for this field.
     *
     * @param list<mixed> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $self = clone $this;
        $self['dependentFields'] = $dependentFields;

        return $self;
    }

    /**
     * Determines how the field will be displayed and validated.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    /**
     * Whether a field should be hidden or not. Hidden fields won't appear on the form, but can be used to pass a value to a property without requiring the customer to fill it in.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * The main label for the form field.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The identifier of the field. In combination with the object type ID, it must be unique.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A unique ID for this field's CRM object type. For example a CONTACT field will have the object type ID 0-1.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * The list of available choices for this field.
     *
     * @param list<EnumeratedFieldOption|EnumeratedFieldOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Whether a value for this field is required when submitting the form.
     */
    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    /**
     * Additional text helping the customer to complete the field.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
