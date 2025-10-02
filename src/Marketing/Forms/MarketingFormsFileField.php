<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\MarketingFormsFileField\FieldType;

/**
 * @phpstan-type marketing_forms_file_field = array{
 *   allowMultipleFiles: bool,
 *   dependentFields: list<MarketingFormsDependentField>,
 *   fieldType: value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   required: bool,
 *   defaultValue?: string,
 *   placeholder?: string,
 * }
 */
final class MarketingFormsFileField implements BaseModel
{
    /** @use SdkModel<marketing_forms_file_field> */
    use SdkModel;

    #[Api]
    public bool $allowMultipleFiles;

    /** @var list<MarketingFormsDependentField> $dependentFields */
    #[Api(list: MarketingFormsDependentField::class)]
    public array $dependentFields;

    /** @var value-of<FieldType> $fieldType */
    #[Api(enum: FieldType::class)]
    public string $fieldType;

    #[Api]
    public bool $hidden;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    #[Api]
    public bool $required;

    #[Api(optional: true)]
    public ?string $defaultValue;

    #[Api(optional: true)]
    public ?string $placeholder;

    /**
     * `new MarketingFormsFileField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsFileField::with(
     *   allowMultipleFiles: ...,
     *   dependentFields: ...,
     *   fieldType: ...,
     *   hidden: ...,
     *   label: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   required: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsFileField)
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
     * @param list<MarketingFormsDependentField> $dependentFields
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        bool $allowMultipleFiles,
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeID,
        bool $required,
        FieldType|string $fieldType = 'file',
        ?string $defaultValue = null,
        ?string $placeholder = null,
    ): self {
        $obj = new self;

        $obj->allowMultipleFiles = $allowMultipleFiles;
        $obj->dependentFields = $dependentFields;
        $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;
        $obj->hidden = $hidden;
        $obj->label = $label;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->required = $required;

        null !== $defaultValue && $obj->defaultValue = $defaultValue;
        null !== $placeholder && $obj->placeholder = $placeholder;

        return $obj;
    }

    public function withAllowMultipleFiles(bool $allowMultipleFiles): self
    {
        $obj = clone $this;
        $obj->allowMultipleFiles = $allowMultipleFiles;

        return $obj;
    }

    /**
     * @param list<MarketingFormsDependentField> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $obj = clone $this;
        $obj->dependentFields = $dependentFields;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType instanceof FieldType ? $fieldType->value : $fieldType;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj->required = $required;

        return $obj;
    }

    public function withDefaultValue(string $defaultValue): self
    {
        $obj = clone $this;
        $obj->defaultValue = $defaultValue;

        return $obj;
    }

    public function withPlaceholder(string $placeholder): self
    {
        $obj = clone $this;
        $obj->placeholder = $placeholder;

        return $obj;
    }
}
