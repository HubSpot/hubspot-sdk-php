<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\SingleCheckboxField\FieldType;

/**
 * A form field consisting of a single checkbox.
 *
 * @phpstan-type SingleCheckboxFieldShape = array{
 *   dependentFields: list<mixed>,
 *   fieldType: value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeId: string,
 *   required: bool,
 *   defaultValue?: string|null,
 *   description?: string|null,
 * }
 */
final class SingleCheckboxField implements BaseModel
{
    /** @use SdkModel<SingleCheckboxFieldShape> */
    use SdkModel;

    /**
     * A list of other fields to make visible based on the value filled in for this field.
     *
     * @var list<mixed> $dependentFields
     */
    #[Api(list: DependentField::class)]
    public array $dependentFields;

    /**
     * Determines how the field will be displayed and validated.
     *
     * @var value-of<FieldType> $fieldType
     */
    #[Api(enum: FieldType::class)]
    public string $fieldType;

    /**
     * Whether a field should be hidden or not. Hidden fields won't appear on the form, but can be used to pass a value to a property without requiring the customer to fill it in.
     */
    #[Api]
    public bool $hidden;

    /**
     * The main label for the form field.
     */
    #[Api]
    public string $label;

    /**
     * The identifier of the field. In combination with the object type ID, it must be unique.
     */
    #[Api]
    public string $name;

    /**
     * A unique ID for this field's CRM object type. For example a CONTACT field will have the object type ID 0-1.
     */
    #[Api]
    public string $objectTypeId;

    /**
     * Whether a value for this field is required when submitting the form.
     */
    #[Api]
    public bool $required;

    /**
     * The value filled in by default. This value will be submitted unless the customer modifies it.
     */
    #[Api(optional: true)]
    public ?string $defaultValue;

    /**
     * Additional text helping the customer to complete the field.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * `new SingleCheckboxField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SingleCheckboxField::with(
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
     * (new SingleCheckboxField)
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
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeId,
        bool $required,
        FieldType|string $fieldType = 'single_checkbox',
        ?string $defaultValue = null,
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj['dependentFields'] = $dependentFields;
        $obj['fieldType'] = $fieldType;
        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['required'] = $required;

        null !== $defaultValue && $obj['defaultValue'] = $defaultValue;
        null !== $description && $obj['description'] = $description;

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
}
