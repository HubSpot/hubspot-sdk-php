<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Properties;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Crm\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Crm\Properties\PropertyCreateParams\Type;
use HubspotSDK\OptionInput;

/**
 * Create and return a copy of a new property for the specified object type.
 *
 * @see HubspotSDK\Services\Crm\PropertiesService::create()
 *
 * @phpstan-type PropertyCreateParamsShape = array{
 *   fieldType: FieldType|value-of<FieldType>,
 *   groupName: string,
 *   label: string,
 *   name: string,
 *   type: Type|value-of<Type>,
 *   calculationFormula?: string,
 *   dataSensitivity?: DataSensitivity|value-of<DataSensitivity>,
 *   description?: string,
 *   displayOrder?: int,
 *   externalOptions?: bool,
 *   formField?: bool,
 *   hasUniqueValue?: bool,
 *   hidden?: bool,
 *   options?: list<OptionInput|array{
 *     displayOrder: int,
 *     hidden: bool,
 *     label: string,
 *     value: string,
 *     description?: string|null,
 *   }>,
 *   referencedObjectType?: string,
 * }
 */
final class PropertyCreateParams implements BaseModel
{
    /** @use SdkModel<PropertyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<FieldType> $fieldType */
    #[Required(enum: FieldType::class)]
    public string $fieldType;

    #[Required]
    public string $groupName;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $calculationFormula;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Optional(enum: DataSensitivity::class)]
    public ?string $dataSensitivity;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?int $displayOrder;

    #[Optional]
    public ?bool $externalOptions;

    #[Optional]
    public ?bool $formField;

    #[Optional]
    public ?bool $hasUniqueValue;

    #[Optional]
    public ?bool $hidden;

    /** @var list<OptionInput>|null $options */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    #[Optional]
    public ?string $referencedObjectType;

    /**
     * `new PropertyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreateParams::with(
     *   fieldType: ..., groupName: ..., label: ..., name: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyCreateParams)
     *   ->withFieldType(...)
     *   ->withGroupName(...)
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
     * @param FieldType|value-of<FieldType> $fieldType
     * @param Type|value-of<Type> $type
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     * @param list<OptionInput|array{
     *   displayOrder: int,
     *   hidden: bool,
     *   label: string,
     *   value: string,
     *   description?: string|null,
     * }> $options
     */
    public static function with(
        FieldType|string $fieldType,
        string $groupName,
        string $label,
        string $name,
        Type|string $type,
        ?string $calculationFormula = null,
        DataSensitivity|string|null $dataSensitivity = null,
        ?string $description = null,
        ?int $displayOrder = null,
        ?bool $externalOptions = null,
        ?bool $formField = null,
        ?bool $hasUniqueValue = null,
        ?bool $hidden = null,
        ?array $options = null,
        ?string $referencedObjectType = null,
    ): self {
        $self = new self;

        $self['fieldType'] = $fieldType;
        $self['groupName'] = $groupName;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        null !== $calculationFormula && $self['calculationFormula'] = $calculationFormula;
        null !== $dataSensitivity && $self['dataSensitivity'] = $dataSensitivity;
        null !== $description && $self['description'] = $description;
        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $externalOptions && $self['externalOptions'] = $externalOptions;
        null !== $formField && $self['formField'] = $formField;
        null !== $hasUniqueValue && $self['hasUniqueValue'] = $hasUniqueValue;
        null !== $hidden && $self['hidden'] = $hidden;
        null !== $options && $self['options'] = $options;
        null !== $referencedObjectType && $self['referencedObjectType'] = $referencedObjectType;

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

    public function withGroupName(string $groupName): self
    {
        $self = clone $this;
        $self['groupName'] = $groupName;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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

    public function withCalculationFormula(string $calculationFormula): self
    {
        $self = clone $this;
        $self['calculationFormula'] = $calculationFormula;

        return $self;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $self = clone $this;
        $self['dataSensitivity'] = $dataSensitivity;

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

    public function withExternalOptions(bool $externalOptions): self
    {
        $self = clone $this;
        $self['externalOptions'] = $externalOptions;

        return $self;
    }

    public function withFormField(bool $formField): self
    {
        $self = clone $this;
        $self['formField'] = $formField;

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
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $self = clone $this;
        $self['referencedObjectType'] = $referencedObjectType;

        return $self;
    }
}
