<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * Update an existing property for an object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::update()
 *
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 *
 * @phpstan-type PropertyUpdateParamsShape = array{
 *   appID: int,
 *   objectType: string,
 *   calculationFormula?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   label?: string|null,
 *   options?: list<OptionInput|OptionInputShape>|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class PropertyUpdateParams implements BaseModel
{
    /** @use SdkModel<PropertyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?string $calculationFormula;

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

    /** @var list<OptionInput>|null $options */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new PropertyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyUpdateParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyUpdateParams)->withAppID(...)->withObjectType(...)
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
     * @param list<OptionInput|OptionInputShape>|null $options
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        int $appID,
        string $objectType,
        ?string $calculationFormula = null,
        ?string $description = null,
        ?int $displayOrder = null,
        FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $label && $self['label'] = $label;
        null !== $options && $self['options'] = $options;
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
     * @param list<OptionInput|OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

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
