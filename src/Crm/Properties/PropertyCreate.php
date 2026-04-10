<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Properties\PropertyCreate\DataSensitivity;
use HubSpotSDK\Crm\Properties\PropertyCreate\FieldType;
use HubSpotSDK\Crm\Properties\PropertyCreate\Type;
use HubSpotSDK\OptionInput;

/**
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 *
 * @phpstan-type PropertyCreateShape = array{
 *   fieldType: FieldType|value-of<FieldType>,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   type: Type|value-of<Type>,
 *   calculationFormula?: string|null,
 *   currencyPropertyName?: string|null,
 *   dataSensitivity?: null|DataSensitivity|value-of<DataSensitivity>,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   externalOptions?: bool|null,
 *   formField?: bool|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   options?: list<OptionInput|OptionInputShape>|null,
 *   referencedObjectType?: string|null,
 *   showCurrencySymbol?: bool|null,
 * }
 */
final class PropertyCreate implements BaseModel
{
    /** @use SdkModel<PropertyCreateShape> */
    use SdkModel;

    /**
     * Controls how the property appears in HubSpot.
     *
     * @var value-of<FieldType> $fieldType
     */
    #[Required(enum: FieldType::class)]
    public string $fieldType;

    /**
     * The name of the property group the property belongs to.
     */
    #[Required]
    public string $groupName;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Required]
    public string $label;

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    #[Required]
    public string $name;

    /**
     * The data type of the property.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    #[Optional]
    public ?string $calculationFormula;

    #[Optional]
    public ?string $currencyPropertyName;

    /**
     * Indicates the sensitivity level of the property, with options: highly_sensitive, non_sensitive, or sensitive.
     *
     * @var value-of<DataSensitivity>|null $dataSensitivity
     */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     */
    #[Optional]
    public ?bool $externalOptions;

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    #[Optional]
    public ?bool $formField;

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    #[Optional]
    public ?bool $hasUniqueValue;

    /**
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    #[Optional]
    public ?bool $hidden;

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    /**
     * Should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users.
     */
    #[Optional]
    public ?string $referencedObjectType;

    #[Optional]
    public ?bool $showCurrencySymbol;

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
     * @param DataSensitivity|value-of<DataSensitivity>|null $dataSensitivity
     * @param list<OptionInput|OptionInputShape>|null $options
     */
    public static function with(
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
        ?bool $showCurrencySymbol = null,
    ): self {
        $self = new self;

        $self['fieldType'] = $fieldType;
        $self['groupName'] = $groupName;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $currencyPropertyName && $self['currencyPropertyName'] = $currencyPropertyName;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $externalOptions && $self['externalOptions'] = $externalOptions;
        null !== $formField && $self['formField'] = $formField;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $options && $self['options'] = $options;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }

    /**
     * Controls how the property appears in HubSpot.
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
     * The name of the property group the property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The internal property name, which must be used when referencing the property via the API.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The data type of the property.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    public function withCalculationFormula(string $calculationFormula): self
    {
        $self = clone $this;
        $self['calculationFormula'] = $calculationFormula;

        return $self;
    }

    public function withCurrencyPropertyName(string $currencyPropertyName): self
    {
        $self = clone $this;
        $self['currencyPropertyName'] = $currencyPropertyName;

        return $self;
    }

    /**
     * Indicates the sensitivity level of the property, with options: highly_sensitive, non_sensitive, or sensitive.
     *
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

        return $self;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * Applicable only for 'enumeration' type properties.  Should be set to true in conjunction with a 'referencedObjectType' of 'OWNER'.  Otherwise false.
     */
    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $self = clone $this;
        $self['hasUniqueValue'] = $hasUniqueValue;

        return $self;
    }

    /**
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @param list<OptionInput|OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Should be set to 'OWNER' when 'externalOptions' is true, which causes the property to dynamically pull option values from the current HubSpot users.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }
}
