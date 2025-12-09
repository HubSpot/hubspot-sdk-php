<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaBridgePropertyUpdate\FieldType;
use HubspotSDK\Cms\MediaBridge\MediaBridgePropertyUpdate\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * @phpstan-type MediaBridgePropertyUpdateShape = array{
 *   calculationFormula?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: value-of<FieldType>|null,
 *   formField?: bool|null,
 *   groupName?: string|null,
 *   hasUniqueValue?: bool|null,
 *   hidden?: bool|null,
 *   label?: string|null,
 *   options?: list<OptionInput>|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class MediaBridgePropertyUpdate implements BaseModel
{
    /** @use SdkModel<MediaBridgePropertyUpdateShape> */
    use SdkModel;

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
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
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
        $obj = new self;

        null !== $calculationFormula && $obj['calculationFormula'] = $calculationFormula;
        null !== $description && $obj['description'] = $description;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $formField && $obj['formField'] = $formField;
        null !== $groupName && $obj['groupName'] = $groupName;
        null !== $hasUniqueValue && $obj['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $obj['hidden'] = $hidden;
        null !== $label && $obj['label'] = $label;
        null !== $options && $obj['options'] = $options;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj['calculationFormula'] = $calculationFormula;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj['formField'] = $formField;

        return $obj;
    }

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    public function withHasUniqueValue(bool $hasUniqueValue): self
    {
        $obj = clone $this;
        $obj['hasUniqueValue'] = $hasUniqueValue;

        return $obj;
    }

    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
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
        $obj = clone $this;
        $obj['options'] = $options;

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
}
