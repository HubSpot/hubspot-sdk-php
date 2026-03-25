<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\PropertyUpdateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyUpdateParams\Type;
use HubspotSDK\OptionInput;

/**
 * Perform a partial update of a property identified by { propertyName }. Provided fields will be overwritten.
 *
 * @see HubspotSDK\Services\Crm\PropertiesService::update()
 *
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 *
 * @phpstan-type PropertyUpdateParamsShape = array{
 *   objectType: string,
 *   calculationFormula?: string|null,
 *   description?: string|null,
 *   displayOrder?: int|null,
 *   fieldType?: null|FieldType|value-of<FieldType>,
 *   formField?: bool|null,
 *   groupName?: string|null,
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
    public string $objectType;

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    #[Optional]
    public ?string $calculationFormula;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
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
     * A human-readable label that will be shown in HubSpot.
     */
    #[Optional]
    public ?string $label;

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

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
     * @param list<OptionInput|OptionInputShape>|null $options
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $objectType,
        ?string $calculationFormula = null,
        ?string $description = null,
        ?int $displayOrder = null,
        FieldType|string|null $fieldType = null,
        ?bool $formField = null,
        ?string $groupName = null,
        ?bool $hidden = null,
        ?string $label = null,
        ?array $options = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $fieldType && $self['fieldType'] = $fieldType;
        null !== $formField && $self['formField'] = $formField;
        null !== $groupName && $self['groupName'] = $groupName;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $label && $self['label'] = $label;
        null !== $options && $self['options'] = $options;
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
     * Property groups are displayed in order starting with the lowest positive integer value. Values of -1 will cause the property group to be displayed after any positive values.
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
     * A human-readable label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * A list of valid options for the property. This field is required for enumerated properties.
     *
     * @param list<OptionInput|OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

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
