<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate\NumberDisplayHint;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate\OptionSortStrategy;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate\TextDisplayHint;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate\Type;
use HubspotSDK\CRM\Properties\CRMPropertiesOptionInput;

/**
 * @phpstan-type crm_object_type_property_create = array{
 *   fieldType: string,
 *   label: string,
 *   name: string,
 *   type: value-of<Type>,
 *   displayOrder?: int,
 *   formField?: bool,
 *   groupName?: string,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   numberDisplayHint?: value-of<NumberDisplayHint>,
 *   options?: list<CRMPropertiesOptionInput>,
 *   optionSortStrategy?: value-of<OptionSortStrategy>,
 *   referencedObjectType?: string,
 *   searchableInGlobalSearch?: bool,
 *   showCurrencySymbol?: bool,
 *   textDisplayHint?: value-of<TextDisplayHint>,
 * }
 */
final class CRMObjectTypePropertyCreate implements BaseModel
{
    /** @use SdkModel<crm_object_type_property_create> */
    use SdkModel;

    #[Api]
    public string $fieldType;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?bool $formField;

    #[Api(optional: true)]
    public ?string $groupName;

    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    #[Api(optional: true)]
    public ?bool $hidden;

    /** @var value-of<NumberDisplayHint>|null $numberDisplayHint */
    #[Api(enum: NumberDisplayHint::class, optional: true)]
    public ?string $numberDisplayHint;

    /** @var list<CRMPropertiesOptionInput>|null $options */
    #[Api(list: CRMPropertiesOptionInput::class, optional: true)]
    public ?array $options;

    /** @var value-of<OptionSortStrategy>|null $optionSortStrategy */
    #[Api(enum: OptionSortStrategy::class, optional: true)]
    public ?string $optionSortStrategy;

    #[Api(optional: true)]
    public ?string $referencedObjectType;

    #[Api(optional: true)]
    public ?bool $searchableInGlobalSearch;

    #[Api(optional: true)]
    public ?bool $showCurrencySymbol;

    /** @var value-of<TextDisplayHint>|null $textDisplayHint */
    #[Api(enum: TextDisplayHint::class, optional: true)]
    public ?string $textDisplayHint;

    /**
     * `new CRMObjectTypePropertyCreate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectTypePropertyCreate::with(
     *   fieldType: ..., label: ..., name: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectTypePropertyCreate)
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
     * @param list<CRMPropertiesOptionInput> $options
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     * @param TextDisplayHint|value-of<TextDisplayHint> $textDisplayHint
     */
    public static function with(
        string $fieldType,
        string $label,
        string $name,
        Type|string $type,
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

    public function withFieldType(string $fieldType): self
    {
        $obj = clone $this;
        $obj->fieldType = $fieldType;

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

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

        return $obj;
    }

    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj->formField = $formField;

        return $obj;
    }

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj->groupName = $groupName;

        return $obj;
    }

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
     * @param list<CRMPropertiesOptionInput> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * @param OptionSortStrategy|value-of<OptionSortStrategy> $optionSortStrategy
     */
    public function withOptionSortStrategy(
        OptionSortStrategy|string $optionSortStrategy
    ): self {
        $obj = clone $this;
        $obj['optionSortStrategy'] = $optionSortStrategy;

        return $obj;
    }

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }

    public function withSearchableInGlobalSearch(
        bool $searchableInGlobalSearch
    ): self {
        $obj = clone $this;
        $obj->searchableInGlobalSearch = $searchableInGlobalSearch;

        return $obj;
    }

    public function withShowCurrencySymbol(bool $showCurrencySymbol): self
    {
        $obj = clone $this;
        $obj->showCurrencySymbol = $showCurrencySymbol;

        return $obj;
    }

    /**
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
