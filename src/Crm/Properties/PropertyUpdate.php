<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Properties\PropertyUpdate\FieldType;
use HubSpotSDK\Crm\Properties\PropertyUpdate\Type;
use HubSpotSDK\OptionInput;

/**
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 *
 * @phpstan-type PropertyUpdateShape = array{
 *   calculationFormula?: string|null,
 *   currencyPropertyName?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hidden?: bool|null,
 *   label?: string|null,
 *   options?: list<OptionInput|OptionInputShape>|null,
 *   showCurrencySymbol?: bool|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class PropertyUpdate implements BaseModel
{
    /** @use SdkModel<PropertyUpdateShape> */
    use SdkModel;

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    #[Optional]
    public ?string $calculationFormula;

    #[Optional]
    public ?string $currencyPropertyName;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * Controls how the property appears in HubSpot.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Optional(enum: FieldType::class)]
    public ?string $fieldType;

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    #[Optional]
    public ?bool $formField;

    /**
     * The name of the property group the property belongs to.
     */
    #[Optional]
    public ?string $groupName;

    /**
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    #[Optional]
    public ?bool $hidden;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Optional]
    public ?string $label;

    /**
     * A list of valid options for the property.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    #[Optional]
    public ?bool $showCurrencySymbol;

    /**
     * The data type of the property.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FieldType|value-of<FieldType>|null $fieldType
     * @param list<OptionInput|OptionInputShape>|null $options
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $currencyPropertyName && $self['currencyPropertyName'] = $currencyPropertyName;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $label && $self['label'] = $label;
        null !== $options && $self['options'] = $options;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $type && $self['type'] = $type;

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
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

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
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

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
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

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
     * A list of valid options for the property.
     *
     * @param list<OptionInput|OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

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
}
