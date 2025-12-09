<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\FileField\FieldType;

/**
 * A form field used for uploading one or more files.
 *
 * @phpstan-type FileFieldShape = array{
 *   allowMultipleFiles: bool,
 *   dependentFields: list<mixed>,
 *   fieldType: value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeId: string,
 *   required: bool,
 *   defaultValue?: string|null,
 *   description?: string|null,
 *   placeholder?: string|null,
 * }
 */
final class FileField implements BaseModel
{
    /** @use SdkModel<FileFieldShape> */
    use SdkModel;

    /**
     * Whether to allow the upload of multiple files.
     */
    #[Required]
    public bool $allowMultipleFiles;

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
    #[Required]
    public string $objectTypeId;

    /**
     * Whether a value for this field is required when submitting the form.
     */
    #[Required]
    public bool $required;

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
     * `new FileField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileField::with(
     *   allowMultipleFiles: ...,
     *   dependentFields: ...,
     *   fieldType: ...,
     *   hidden: ...,
     *   label: ...,
     *   name: ...,
     *   objectTypeId: ...,
     *   required: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileField)
     *   ->withAllowMultipleFiles(...)
     *   ->withDependentFields(...)
     *   ->withFieldType(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
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
     * @param list<mixed> $dependentFields
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        bool $allowMultipleFiles,
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeId,
        bool $required,
        FieldType|string $fieldType = 'file',
        ?string $defaultValue = null,
        ?string $description = null,
        ?string $placeholder = null,
    ): self {
        $obj = new self;

        $obj['allowMultipleFiles'] = $allowMultipleFiles;
        $obj['dependentFields'] = $dependentFields;
        $obj['fieldType'] = $fieldType;
        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['required'] = $required;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;
        null !== $description && $obj['description'] = $description;
        null !== $placeholder && $obj['placeholder'] = $placeholder;

        return $obj;
    }

    /**
     * Whether to allow the upload of multiple files.
     */
    public function withAllowMultipleFiles(bool $allowMultipleFiles): self
    {
        $obj = clone $this;
        $obj['allowMultipleFiles'] = $allowMultipleFiles;

        return $obj;
    }

    /**
     * A list of other fields to make visible based on the value filled in for this field.
     *
     * @param list<mixed> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $obj = clone $this;
        $obj['dependentFields'] = $dependentFields;

        return $obj;
    }

    /**
     * Determines how the field will be displayed and validated.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * Whether a field should be hidden or not. Hidden fields won't appear on the form, but can be used to pass a value to a property without requiring the customer to fill it in.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    /**
     * The main label for the form field.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The identifier of the field. In combination with the object type ID, it must be unique.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * A unique ID for this field's CRM object type. For example a CONTACT field will have the object type ID 0-1.
     */
    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    /**
     * Whether a value for this field is required when submitting the form.
     */
    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj['required'] = $required;

        return $obj;
    }

    /**
     * The value filled in by default. This value will be submitted unless the customer modifies it.
     */
    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj['defaultValue'] = $defaultValue;

        return $obj;
    }

    /**
     * Additional text helping the customer to complete the field.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The prompt text showing when the field isn't filled in.
     */
    public function withPlaceholder(string $placeholder): self
    {
        $obj = clone $this;
        $obj['placeholder'] = $placeholder;

        return $obj;
    }
}
