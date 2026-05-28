<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Properties;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Properties\PropertyUpdateParams\FieldType;
use HubSpotSDK\Crm\Properties\PropertyUpdateParams\NumberDisplayHint;
use HubSpotSDK\Crm\Properties\PropertyUpdateParams\TextDisplayHint;
use HubSpotSDK\Crm\Properties\PropertyUpdateParams\Type;
use HubSpotSDK\OptionInput;

/**
 * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
 *
 * @see HubSpotSDK\Services\Crm\PropertiesService::update()
 *
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 *
 * @phpstan-type PropertyUpdateParamsShape = array{
 *   objectType: string,
 *   calculationFormula?: string|null,
 *   currencyPropertyName?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hidden?: bool|null,
 *   label?: string|null,
 *   numberDisplayHint?: null|NumberDisplayHint|value-of<NumberDisplayHint>,
 *   options?: list<OptionInput|OptionInputShape>|null,
 *   showCurrencySymbol?: bool|null,
 *   textDisplayHint?: null|TextDisplayHint|value-of<TextDisplayHint>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class PropertyUpdateParams implements BaseModel
{
    /** @use SdkModel<PropertyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

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

    /** @var value-of<NumberDisplayHint>|null $numberDisplayHint */
    #[Optional(enum: NumberDisplayHint::class)]
    public ?string $numberDisplayHint;

    /**
     * A list of valid options for the property.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    #[Optional]
    public ?bool $showCurrencySymbol;

    /** @var value-of<TextDisplayHint>|null $textDisplayHint */
    #[Optional(enum: TextDisplayHint::class)]
    public ?string $textDisplayHint;

    /**
     * The data type of the property.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new PropertyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyUpdateParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyUpdateParams)->withObjectType(...)
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
     * @param FieldType|value-of<FieldType>|null $fieldType
     * @param NumberDisplayHint|value-of<NumberDisplayHint>|null $numberDisplayHint
     * @param list<OptionInput|OptionInputShape>|null $options
     * @param TextDisplayHint|value-of<TextDisplayHint>|null $textDisplayHint
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $objectType,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        TextDisplayHint|string|null $textDisplayHint = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $currencyPropertyName && $self['currencyPropertyName'] = $currencyPropertyName;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $label && $self['label'] = $label;
        null !== $numberDisplayHint && $self['numberDisplayHint'] = $numberDisplayHint;
        null !== $options && $self['options'] = $options;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $textDisplayHint && $self['textDisplayHint'] = $textDisplayHint;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

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
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     */
    public function withNumberDisplayHint(
        NumberDisplayHint|string $numberDisplayHint
    ): self {
        $self = clone $this;
        $self['numberDisplayHint'] = $numberDisplayHint;

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
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public function withTextDisplayHint(
        TextDisplayHint|string $textDisplayHint
    ): self {
        $self = clone $this;
        $self['textDisplayHint'] = $textDisplayHint;

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
