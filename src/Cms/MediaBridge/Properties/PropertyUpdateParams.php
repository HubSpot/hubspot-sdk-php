<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyUpdateParams\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * Update an existing property for an object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Properties->update
 *
 * @phpstan-type PropertyUpdateParamsShape = array{
 *   appID: string,
 *   objectType: string,
 *   calculationFormula?: string,
 *   description?: string,
 *   displayOrder?: int,
 *   fieldType?: FieldType|value-of<FieldType>,
 *   formField?: bool,
 *   groupName?: string,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   label?: string,
 *   options?: list<OptionInput>,
 *   type?: Type|value-of<Type>,
 * }
 */
final class PropertyUpdateParams implements BaseModel
{
    /** @use SdkModel<PropertyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    #[Api]
    public string $objectType;

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
     * @param FieldType|value-of<FieldType> $fieldType
     * @param list<OptionInput> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $appID,
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
        $obj = new self;

        $obj->appID = $appID;
        $obj->objectType = $objectType;

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

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

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
