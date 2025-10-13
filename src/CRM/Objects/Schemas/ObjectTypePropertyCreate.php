<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate\NumberDisplayHint;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate\OptionSortStrategy;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate\TextDisplayHint;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate\Type;
use HubspotSDK\CRM\Properties\OptionInput;

/**
 * Defines a property to create.
 *
 * @phpstan-type object_type_property_create = array{
 *   fieldType: string,
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   description?: string,
 *   displayOrder?: int,
 *   formField?: bool,
 *   groupName?: string,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   numberDisplayHint?: value-of<NumberDisplayHint>,
 *   options?: list<OptionInput>,
 *   optionSortStrategy?: value-of<OptionSortStrategy>,
 *   referencedObjectType?: string,
 *   searchableInGlobalSearch?: bool,
 *   showCurrencySymbol?: bool,
 *   textDisplayHint?: value-of<TextDisplayHint>,
 * }
 */
final class ObjectTypePropertyCreate implements BaseModel
{
    /** @use SdkModel<object_type_property_create> */
    use SdkModel;

    /**
     * Controls how the property appears in HubSpot.
     */
    #[Api]
    public string $fieldType;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Api]
    public string $label;

    /**
     * The internal property name, which must be used when referencing the property from the API.
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
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * Whether the property can be used in a HubSpot form.
     */
    #[Api(optional: true)]
    public ?bool $formField;

    /**
     * The name of the group this property belongs to.
     */
    #[Api(optional: true)]
    public ?string $groupName;

    /**
     * Whether or not the property's value must be unique. Once set, this can't be changed.
     */
    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    #[Api(optional: true)]
    public ?bool $hidden;

    /**
     * Controls how numeric properties are formatted in the HubSpot UI.
     *
     * @var value-of<NumberDisplayHint>|null $numberDisplayHint
     */
    #[Api(enum: NumberDisplayHint::class, optional: true)]
    public ?string $numberDisplayHint;

    /**
     * A list of available options for the property. This field is only required for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Api(list: OptionInput::class, optional: true)]
    public ?array $options;

    /**
     * Controls how the property options will be sorted in the HubSpot UI.
     *
     * @var value-of<OptionSortStrategy>|null $optionSortStrategy
     */
    #[Api(enum: OptionSortStrategy::class, optional: true)]
    public ?string $optionSortStrategy;

    /**
     * Defines the options this property will return, e.g. OWNER would return name of users on the portal.
     */
    #[Api(optional: true)]
    public ?string $referencedObjectType;

    /**
     * Allow users to search for information entered to this field (limited to 3 properties).
     */
    #[Api(optional: true)]
    public ?bool $searchableInGlobalSearch;

    /**
     * Whether the property will display the currency symbol in the HubSpot UI.
     */
    #[Api(optional: true)]
    public ?bool $showCurrencySymbol;

    /**
     * Controls how text properties are formatted in the HubSpot UI.
     *
     * @var value-of<TextDisplayHint>|null $textDisplayHint
     */
    #[Api(enum: TextDisplayHint::class, optional: true)]
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
     * @param list<OptionInput> $options
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
        $obj = new self;

        $obj->fieldType = $fieldType;
        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $description && $obj->description = $description;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $formField && $obj->formField = $formField;
        null !== $groupName && $obj->groupName = $groupName;
        null !== $hasUniqueValue && $obj->hasUniqueValue = $hasUniqueValue;
        null !== $hidden && $obj->hidden = $hidden;
        null !== $numberDisplayHint && $obj['numberDisplayHint'] = $numberDisplayHint;
        null !== $options && $obj->options = $options;
        null !== $optionSortStrategy && $obj['optionSortStrategy'] = $optionSortStrategy;
        null !== $referencedObjectType && $obj->referencedObjectType = $referencedObjectType;
        null !== $searchableInGlobalSearch && $obj->searchableInGlobalSearch = $searchableInGlobalSearch;
        null !== $showCurrencySymbol && $obj->showCurrencySymbol = $showCurrencySymbol;
        null !== $textDisplayHint && $obj['textDisplayHint'] = $textDisplayHint;

        return $obj;
    }

    /**
     * Controls how the property appears in HubSpot.
     */
    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

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
     * The internal property name, which must be used when referencing the property from the API.
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
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * The order that this property should be displayed in the HubSpot UI relative to other properties for this object type. Properties are displayed in order starting with the lowest positive integer value. A value of -1 will cause the property to be displayed **after** any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    /**
     * Whether the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj->formField = $formField;

        return $obj;
    }

    /**
     * The name of the group this property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj->groupName = $groupName;

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

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj->hidden = $hidden;

        return $obj;
    }

    /**
     * Controls how numeric properties are formatted in the HubSpot UI.
     *
     * @param NumberDisplayHint|value-of<NumberDisplayHint> $numberDisplayHint
     */
    public function withNumberDisplayHint(
        NumberDisplayHint|string $numberDisplayHint
    ): self {
        $obj = clone $this;
        $obj['numberDisplayHint'] = $numberDisplayHint;

        return $obj;
    }

    /**
     * A list of available options for the property. This field is only required for enumerated properties.
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
     * Controls how the property options will be sorted in the HubSpot UI.
     *
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     */
    public function withOptionSortStrategy(
        OptionSortStrategy|string $optionSortStrategy
    ): self {
        $obj = clone $this;
        $obj['optionSortStrategy'] = $optionSortStrategy;

        return $obj;
    }

    /**
     * Defines the options this property will return, e.g. OWNER would return name of users on the portal.
     */
    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }

    /**
     * Allow users to search for information entered to this field (limited to 3 properties).
     */
    public function withSearchableInGlobalSearch(
        bool $searchableInGlobalSearch
    ): self {
        $obj = clone $this;
        $obj->searchableInGlobalSearch = $searchableInGlobalSearch;

        return $obj;
    }

    /**
     * Whether the property will display the currency symbol in the HubSpot UI.
     */
    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj->showCurrencySymbol = $showCurrencySymbol;

        return $obj;
    }

    /**
     * Controls how text properties are formatted in the HubSpot UI.
     *
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public function withTextDisplayHint(
        TextDisplayHint|string $textDisplayHint
    ): self {
        $obj = clone $this;
        $obj['textDisplayHint'] = $textDisplayHint;

        return $obj;
    }
}
