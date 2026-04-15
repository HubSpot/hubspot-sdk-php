<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\FieldType;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\NumberDisplayHint;
use HubSpotSDK\Cms\MediaBridge\MediaBridgeUpdatePropertyParams\Type;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\OptionInput;

/**
 * Update an existing property for an object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::updateProperty()
 *
 * @phpstan-import-type OptionInputShape from \HubSpotSDK\OptionInput
 *
 * @phpstan-type MediaBridgeUpdatePropertyParamsShape = array{
 *   appID: int,
 *   objectType: string,
 *   calculationFormula?: string|null,
 *   currencyPropertyName?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   label?: string|null,
 *   numberDisplayHint?: null|NumberDisplayHint|value-of<NumberDisplayHint>,
 *   options?: list<OptionInput|OptionInputShape>|null,
 *   showCurrencySymbol?: bool|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class MediaBridgeUpdatePropertyParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeUpdatePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?string $calculationFormula;

    #[Optional]
    public ?string $currencyPropertyName;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?int $displayOrder;

    /** @var value-of<FieldType>|null $fieldType */
    #[Optional(enum: FieldType::class)]
    public ?string $fieldType;

    #[Optional]
    public ?bool $formField;

    #[Optional]
    public ?string $groupName;

    #[Optional]
    public ?bool $hasUniqueValue;

    #[Optional]
    public ?bool $hidden;

    #[Optional]
    public ?string $label;

    /** @var value-of<NumberDisplayHint>|null $numberDisplayHint */
    #[Optional(enum: NumberDisplayHint::class)]
    public ?string $numberDisplayHint;

    /** @var list<OptionInput>|null $options */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    #[Optional]
    public ?bool $showCurrencySymbol;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new MediaBridgeUpdatePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeUpdatePropertyParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeUpdatePropertyParams)->withAppID(...)->withObjectType(...)
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        int $appID,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $currencyPropertyName = null,
        ?string $description = null,
        ?int $displayOrder = null,
        FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        NumberDisplayHint|string|null $numberDisplayHint = null,
        ?array $options = null,
        ?bool $showCurrencySymbol = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $currencyPropertyName && $self['currencyPropertyName'] = $currencyPropertyName;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $label && $self['label'] = $label;
        null !== $numberDisplayHint && $self['numberDisplayHint'] = $numberDisplayHint;
        null !== $options && $self['options'] = $options;
        null !== $showCurrencySymbol && $self['showCurrencySymbol'] = $showCurrencySymbol;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $self = clone $this;
        $self['fieldType'] = $fieldType;

        return $self;
    }

    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

        return $self;
    }

    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

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
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
