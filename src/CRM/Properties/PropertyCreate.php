<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Properties\PropertyCreate\DataSensitivity;
use HubspotSDK\CRM\Properties\PropertyCreate\FieldType;
use HubspotSDK\CRM\Properties\PropertyCreate\Type;

/**
 * @phpstan-type property_create = array{
 *   fieldType: value-of<FieldType>,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   calculationFormula?: string,
 *   dataSensitivity?: value-of<DataSensitivity>,
 *   description?: string,
 *   displayOrder?: int,
 *   externalOptions?: bool,
 *   formField?: bool,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   options?: list<OptionInput>,
 *   referencedObjectType?: string,
 * }
 */
final class PropertyCreate implements BaseModel
{
    /** @use SdkModel<property_create> */
    use SdkModel;

    /**
     * Controls how the property appears in HubSpot.
     *
     * @var value-of<FieldType> $fieldType
     */
    #[Api(enum: FieldType::class)]
    public string $fieldType;

    /**
     * The name of the property group the property belongs to.
     */
    #[Api]
    public string $groupName;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Api]
    public string $label;

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    #[Api]
    public string $name;

    /**
     * The data type of the property.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    #[Api(optional: true)]
    public ?string $calculationFormula;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     */
    #[Api(optional: true)]
    public ?bool $externalOptions;

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    #[Api(optional: true)]
    public ?bool $formField;

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    /**
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
     */
    #[Api(optional: true)]
    public ?bool $hidden;

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Api(list: OptionInput::class, optional: true)]
    public ?array $options;

    /**
     * Should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users.
     */
    #[Api(optional: true)]
    public ?string $referencedObjectType;

    /**
     * `new PropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreate::with(
     *   fieldType: ..., groupName: ..., label: ..., name: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyCreate)
     *   ->withFieldType(...)
     *   ->withGroupName(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
     * @param FieldType|value-of<FieldType> $fieldType
     * @param Type|value-of<Type> $type
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param list<OptionInput> $options
     */
    public static function with(
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
    ): self {
        $obj = new self;

        $obj['fieldType'] = $fieldType;
        $obj->groupName = $groupName;
        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $description && $obj->description = $description;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $externalOptions && $obj->externalOptions = $externalOptions;
        null !== $formField && $obj->formField = $formField;
        null !== $hasUniqueValue && $obj->hasUniqueValue = $hasUniqueValue;
        null !== $hidden && $obj->hidden = $hidden;
        null !== $options && $obj->options = $options;
        null !== $referencedObjectType && $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }

    /**
     * Controls how the property appears in HubSpot.
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
     * The name of the property group the property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj->groupName = $groupName;

        return $obj;
    }

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The data type of the property.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj->calculationFormula = $calculationFormula;

        return $obj;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

        return $obj;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj->externalOptions = $externalOptions;

        return $obj;
    }

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj->formField = $formField;

        return $obj;
    }

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $obj = clone $this;
        $obj->hasUniqueValue = $hasUniqueValue;

        return $obj;
    }

    /**
     * If true, the option will not be shown in forms, bots, or meeting scheduling pages. Supported for contact, company, ticket, and custom object enumeration properties.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @param list<OptionInput> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * Should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }
}
