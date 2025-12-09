<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\NumberDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\OptionSortStrategy;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\TextDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\Type;
use HubspotSDK\OptionInput;

/**
 * Defines a property to create.
 *
 * @phpstan-type ObjectTypePropertyCreateShape = array{
 *   fieldType: string,
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   numberDisplayHint?: value-of<NumberDisplayHint>|null,
 *   options?: list<OptionInput>|null,
 *   optionSortStrategy?: value-of<OptionSortStrategy>|null,
 *   referencedObjectType?: string|null,
 *   searchableInGlobalSearch?: bool|null,
 *   showCurrencySymbol?: bool|null,
 *   textDisplayHint?: value-of<TextDisplayHint>|null,
 * }
 */
final class ObjectTypePropertyCreate implements BaseModel
{
    /** @use SdkModel<ObjectTypePropertyCreateShape> */
    use SdkModel;

    /**
     * Controls how the property appears in HubSpot.
     */
    #[Required]
    public string $fieldType;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Required]
    public string $label;

    /**
     * The internal property name, which must be used when referencing the property from the API.
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
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    #[Optional]
    public ?int $displayOrder;

    /**
     * Whether the property can be used in a HubSpot form.
     */
    #[Optional]
    public ?bool $formField;

    /**
     * The name of the group this property belongs to.
     */
    #[Optional]
    public ?string $groupName;

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    #[Optional]
    public ?bool $hasUniqueValue;

    #[Optional]
    public ?bool $hidden;

    /**
     * Controls how numeric properties are formatted in the HubSpot UI.
     *
     * @var value-of<NumberDisplayHint>|null $numberDisplayHint
     */
    #[Optional(enum: NumberDisplayHint::class)]
    public ?string $numberDisplayHint;

    /**
     * A list of available options for the property. This field is only required for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    /**
     * Controls how the property options will be sorted in the HubSpot UI.
     *
     * @var value-of<OptionSortStrategy>|null $optionSortStrategy
     */
    #[Optional(enum: OptionSortStrategy::class)]
    public ?string $optionSortStrategy;

    /**
     * Defines the options this property will return, e.g. OWNER would return name of users on the portal.
     */
    #[Optional]
    public ?string $referencedObjectType;

    /**
     * Allow users to search for information entered to this field (limited to 3 properties).
     */
    #[Optional]
    public ?bool $searchableInGlobalSearch;

    /**
     * Whether the property will display the currency symbol in the HubSpot UI.
     */
    #[Optional]
    public ?bool $showCurrencySymbol;

    /**
     * Controls how text properties are formatted in the HubSpot UI.
     *
     * @var value-of<TextDisplayHint>|null $textDisplayHint
     */
    #[Optional(enum: TextDisplayHint::class)]
    public ?string $textDisplayHint;

    /**
     * `new ObjectTypePropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypePropertyCreate::with(fieldType: ..., label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypePropertyCreate)
     *   ->withFieldType(...)
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
     * @param Type|value-of<Type> $type
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public static function with(
        string $fieldType,
        string $label,
        string $name,
        Type|string $type,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        OptionSortStrategy|string|null $optionSortStrategy = null,
        ?string $referencedObjectType = null,
        ?bool $searchableInGlobalSearch = null,
        ?bool $showCurrencySymbol = null,
        TextDisplayHint|string|null $textDisplayHint = null,
    ): self {
        $self = new self;

        $self['fieldType'] = $fieldType;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $numberDisplayHint && $self['numberDisplayHint'] = $numberDisplayHint;
        null !== $options && $self['options'] = $options;
        null !== $optionSortStrategy && $self['optionSortStrategy'] = $optionSortStrategy;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;
        null !== $searchableInGlobalSearch && $self['searchableInGlobalSearch'] = $searchableInGlobalSearch;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $textDisplayHint && $self['textDisplayHint'] = $textDisplayHint;

        return $self;
    }

    /**
     * Controls how the property appears in HubSpot.
     */
    public function withFieldType(string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

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
     * The internal property name, which must be used when referencing the property from the API.
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
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * Whether the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    /**
     * The name of the group this property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

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

    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * Controls how numeric properties are formatted in the HubSpot UI.
     *
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
     * A list of available options for the property. This field is only required for enumerated properties.
     *
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    /**
     * Controls how the property options will be sorted in the HubSpot UI.
     *
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     */
    public function withOptionSortStrategy(
        OptionSortStrategy|string $optionSortStrategy
    ): self {
        $self = clone $this;
        $self['optionSortStrategy'] = $optionSortStrategy;

        return $self;
    }

    /**
     * Defines the options this property will return, e.g. OWNER would return name of users on the portal.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }

    /**
     * Allow users to search for information entered to this field (limited to 3 properties).
     */
    public function withSearchableInGlobalSearch(
        bool $searchableInGlobalSearch
    ): self {
        $self = clone $this;
        $self['searchableInGlobalSearch'] = $searchableInGlobalSearch;

        return $self;
    }

    /**
     * Whether the property will display the currency symbol in the HubSpot UI.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $self = clone $this;
        $self['showCurrencySymbol'] = $showCurrencySymbol;

        return $self;
    }

    /**
     * Controls how text properties are formatted in the HubSpot UI.
     *
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public function withTextDisplayHint(
        TextDisplayHint|string $textDisplayHint
    ): self {
        $self = clone $this;
        $self['textDisplayHint'] = $textDisplayHint;

        return $self;
    }
}
