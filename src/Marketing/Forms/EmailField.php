<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\EmailField\FieldType;

/**
 * A form field used for collecting an email address.
 *
 * @phpstan-import-type EmailFieldValidationShape from \HubspotSDK\Marketing\Forms\EmailFieldValidation
 *
 * @phpstan-type EmailFieldShape = array{
 *   dependentFields: list<mixed>,
 *   fieldType: FieldType|value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   required: bool,
 *   validation: EmailFieldValidation|EmailFieldValidationShape,
 *   defaultValue?: string|null,
 *   description?: string|null,
 *   placeholder?: string|null,
 * }
 */
final class EmailField implements BaseModel
{
    /** @use SdkModel<EmailFieldShape> */
    use SdkModel;

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
     * Whether a value for this field is required when submitting the form.
     */
    #[Required]
    public bool $required;

    /**
     * Describes how an email address should be validated.
     */
    #[Required]
    public EmailFieldValidation $validation;

    /**
     * The value filled in by default. This value will be submitted unless the customer modifies it.
     */
    #[Optional]
    public ?string $defaultValue;

    /**
     * Additional text helping the customer to complete the field.
     */
    #[Optional]
    public ?string $description;

    /**
     * The prompt text showing when the field isn't filled in.
     */
    #[Optional]
    public ?string $placeholder;

    /**
     * `new EmailField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailField::with(
     *   dependentFields: ...,
     *   fieldType: ...,
     *   hidden: ...,
     *   label: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   required: ...,
     *   validation: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailField)
     *   ->withDependentFields(...)
     *   ->withFieldType(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withRequired(...)
     *   ->withValidation(...)
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
     * @param list<mixed> $dependentFields
     * @param EmailFieldValidation|EmailFieldValidationShape $validation
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeID,
        bool $required,
        EmailFieldValidation|array $validation,
        FieldType|string $fieldType = 'email',
        ?string $defaultValue = null,
        ?string $description = null,
        ?string $placeholder = null,
    ): self {
        $self = new self;

        $self['dependentFields'] = $dependentFields;
        $self['fieldType'] = $fieldType;
        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['required'] = $required;
        $self['validation'] = $validation;

        null !== $defaultValue && $self['defaultValue'] = $defaultValue;
        null !== $description && $self['description'] = $description;
        null !== $placeholder && $self['placeholder'] = $placeholder;

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
     * Whether a value for this field is required when submitting the form.
     */
    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    /**
     * Describes how an email address should be validated.
     *
     * @param EmailFieldValidation|EmailFieldValidationShape $validation
     */
    public function withValidation(EmailFieldValidation|array $validation): self
    {
        $self = clone $this;
        $self['validation'] = $validation;

        return $self;
    }

    /**
     * The value filled in by default. This value will be submitted unless the customer modifies it.
     */
    public function withDefaultValue(string $defaultValue): self
    {
        $self = clone $this;
        $self['defaultValue'] = $defaultValue;

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

    /**
     * The prompt text showing when the field isn't filled in.
     */
    public function withPlaceholder(string $placeholder): self
    {
        $self = clone $this;
        $self['placeholder'] = $placeholder;

        return $self;
    }
}
