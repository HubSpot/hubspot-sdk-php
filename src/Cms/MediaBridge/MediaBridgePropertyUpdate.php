<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\MediaBridgePropertyUpdate\FieldType;
use HubspotSDK\Cms\MediaBridge\MediaBridgePropertyUpdate\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * @phpstan-type media_bridge_property_update = array{
 *   calculationFormula?: string,
 *   description?: string,
 *   displayOrder?: int,
 *   fieldType?: value-of<FieldType>,
 *   formField?: bool,
 *   groupName?: string,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   label?: string,
 *   options?: list<OptionInput>,
 *   type?: value-of<Type>,
 * }
 */
final class MediaBridgePropertyUpdate implements BaseModel
{
    /** @use SdkModel<media_bridge_property_update> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $calculationFormula;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?int $displayOrder;

    /** @var value-of<FieldType>|null $fieldType */
    #[Api(enum: FieldType::class, optional: true)]
    public ?string $fieldType;

    #[Api(optional: true)]
    public ?bool $formField;

    #[Api(optional: true)]
    public ?string $groupName;

    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    #[Api(optional: true)]
    public ?bool $hidden;

    #[Api(optional: true)]
    public ?string $label;

    /** @var list<OptionInput>|null $options */
    #[Api(list: OptionInput::class, optional: true)]
    public ?array $options;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
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
     * @param list<OptionInput> $options
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

        null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
        null !== $description && $obj->description = $description;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $formField && $obj->formField = $formField;
        null !== $groupName && $obj->groupName = $groupName;
        null !== $hasUniqueValue && $obj->hasUniqueValue = $hasUniqueValue;
        null !== $hidden && $obj->hidden = $hidden;
        null !== $label && $obj->label = $label;
        null !== $options && $obj->options = $options;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj->calculationFormula = $calculationFormula;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj->displayOrder = $displayOrder;

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

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * @param list<OptionInput> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

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
