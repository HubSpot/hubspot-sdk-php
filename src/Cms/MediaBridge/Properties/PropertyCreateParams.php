<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\FieldType;
use HubspotSDK\Cms\MediaBridge\Properties\PropertyCreateParams\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * Create a new property for the specified media type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::create()
 *
 * @phpstan-type PropertyCreateParamsShape = array{
 *   appId: string,
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
 *   options?: list<OptionInput>,
 *   referencedObjectType?: string,
 * }
 */
final class PropertyCreateParams implements BaseModel
{
    /** @use SdkModel<PropertyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appId;

    /** @var value-of<FieldType> $fieldType */
    #[Api(enum: FieldType::class)]
    public string $fieldType;

    #[Api]
    public string $groupName;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $calculationFormula;

    /** @var value-of<DataSensitivity>|null $dataSensitivity */
    #[Api(enum: DataSensitivity::class, optional: true)]
    public ?string $dataSensitivity;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?int $displayOrder;

    #[Api(optional: true)]
    public ?bool $externalOptions;

    #[Api(optional: true)]
    public ?bool $formField;

    #[Api(optional: true)]
    public ?bool $hasUniqueValue;

    #[Api(optional: true)]
    public ?bool $hidden;

    /** @var list<OptionInput>|null $options */
    #[Api(list: OptionInput::class, optional: true)]
    public ?array $options;

    #[Api(optional: true)]
    public ?string $referencedObjectType;

    /**
     * `new PropertyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyCreateParams::with(
     *   appId: ..., fieldType: ..., groupName: ..., label: ..., name: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyCreateParams)
     *   ->withAppID(...)
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
     * @param list<OptionInput> $options
     */
    public static function with(
        string $appId,
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
        $obj = new self;

        $obj->appId = $appId;
        $obj['fieldType'] = $fieldType;
        $obj->groupName = $groupName;
        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        null !== $calculationFormula && $obj->calculationFormula = $calculationFormula;
        null !== $dataSensitivity && $obj['dataSensitivity'] = $dataSensitivity;
        null !== $description && $obj->description = $description;
        null !== $displayOrder && $obj->displayOrder = $displayOrder;
        null !== $externalOptions && $obj->externalOptions = $externalOptions;
        null !== $formField && $obj->formField = $formField;
        null !== $hasUniqueValue && $obj->hasUniqueValue = $hasUniqueValue;
        null !== $hidden && $obj->hidden = $hidden;
        null !== $options && $obj->options = $options;
        null !== $referencedObjectType && $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

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

    public function withGroupName(string $groupName): self
    {
        $obj = clone $this;
        $obj->groupName = $groupName;

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

    public function withCalculationFormula(string $calculationFormula): self
    {
        $obj = clone $this;
        $obj->calculationFormula = $calculationFormula;

        return $obj;
    }

    /**
     * @param DataSensitivity|value-of<DataSensitivity> $dataSensitivity
     */
    public function withDataSensitivity(
        DataSensitivity|string $dataSensitivity
    ): self {
        $obj = clone $this;
        $obj['dataSensitivity'] = $dataSensitivity;

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

    public function withExternalOptions(bool $externalOptions): self
    {
        $obj = clone $this;
        $obj->externalOptions = $externalOptions;

        return $obj;
    }

    public function withFormField(bool $formField): self
    {
        $obj = clone $this;
        $obj->formField = $formField;

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
     * @param list<OptionInput> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    public function withReferencedObjectType(string $referencedObjectType): self
    {
        $obj = clone $this;
        $obj->referencedObjectType = $referencedObjectType;

        return $obj;
    }
}
