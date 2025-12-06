<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Api;
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
 * @phpstan-type PropertyUpdateParamsShape = array{
 *   objectType: string,
 *   calculationFormula?: string,
 *   description?: string,
 *   displayOrder?: int,
 *   fieldType?: FieldType|value-of<FieldType>,
 *   formField?: bool,
 *   groupName?: string,
 *   hidden?: bool,
 *   label?: string,
 *   options?: list<OptionInput|array{
 *     displayOrder: int,
 *     hidden: bool,
 *     label: string,
 *     value: string,
 *     description?: string|null,
 *   }>,
 *   type?: Type|value-of<Type>,
 * }
 */
final class PropertyUpdateParams implements BaseModel
{
    /** @use SdkModel<PropertyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectType;

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    #[Api(optional: true)]
    public ?string $calculationFormula;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     */
    #[Api(optional: true)]
    public ?int $displayOrder;

    /**
     * Controls how the property appears in HubSpot.
     *
     * @var value-of<FieldType>|null $fieldType
     */
    #[Api(enum: FieldType::class, optional: true)]
    public ?string $fieldType;

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    #[Api(optional: true)]
    public ?bool $formField;

    /**
     * The name of the property group the property belongs to.
     */
    #[Api(optional: true)]
    public ?string $groupName;

    /**
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    #[Api(optional: true)]
    public ?bool $hidden;

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $label;

    /**
     * A list of valid options for the property.
     *
     * @var list<OptionInput>|null $options
     */
    #[Api(list: OptionInput::class, optional: true)]
    public ?array $options;

    /**
     * The data type of the property.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
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
        $obj = new self;

        $obj['objectType'] = $objectType;

        null !== $calculationFormula && $obj['calculationFormula'] = $calculationFormula;
        null !== $description && $obj['description'] = $description;
        null !== $displayOrder && $obj['displayOrder'] = $displayOrder;
        null !== $fieldType && $obj['fieldType'] = $fieldType;
        null !== $formField && $obj['formField'] = $formField;
        null !== $groupName && $obj['groupName'] = $groupName;
        null !== $hidden && $obj['hidden'] = $hidden;
        null !== $label && $obj['label'] = $label;
        null !== $options && $obj['options'] = $options;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * Represents a formula that is used to compute a calculated property.
     */
    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj['calculationFormula'] = $calculationFormula;

        return $obj;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Properties are displayed in order starting with the lowest positive integer value. Values of -1 will cause the Property to be displayed after any positive values.
     */
    public function withDisplayOrder(int $displayOrder): self
    {
        $obj = clone $this;
        $obj['displayOrder'] = $displayOrder;

        return $obj;
    }

    /**
     * Controls how the property appears in HubSpot.
     *
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public function withFieldType(FieldType|string $fieldType): self
    {
        $obj = clone $this;
        $obj['fieldType'] = $fieldType;

        return $obj;
    }

    /**
     * Whether or not the property can be used in a HubSpot form.
     */
    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj['formField'] = $formField;

        return $obj;
    }

    /**
     * The name of the property group the property belongs to.
     */
    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj['groupName'] = $groupName;

        return $obj;
    }

    /**
     * If true, the property won't be visible and can't be used in HubSpot.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    /**
     * A human-readable property label that will be shown in HubSpot.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * A list of valid options for the property.
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
        $obj = clone $this;
        $obj['options'] = $options;

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
}
