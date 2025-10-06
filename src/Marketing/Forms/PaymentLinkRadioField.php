<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\PaymentLinkRadioField\FieldType;

/**
 * @phpstan-type payment_link_radio_field = array{
 *   defaultValues: list<string>,
 *   dependentFields: list<DependentField>,
 *   fieldType: value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   options: list<EnumeratedFieldOption>,
 *   required: bool,
 * }
 */
final class PaymentLinkRadioField implements BaseModel
{
    /** @use SdkModel<payment_link_radio_field> */
    use SdkModel;

    /** @var list<string> $defaultValues */
    #[Api(list: 'string')]
    public array $defaultValues;

    /** @var list<DependentField> $dependentFields */
    #[Api(list: DependentField::class)]
    public array $dependentFields;

    /** @var value-of<FieldType> $fieldType */
    #[Api(enum: FieldType::class)]
    public string $fieldType;

    #[Api]
    public bool $hidden;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    /** @var list<EnumeratedFieldOption> $options */
    #[Api(list: EnumeratedFieldOption::class)]
    public array $options;

    #[Api]
    public bool $required;

    /**
     * `new PaymentLinkRadioField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaymentLinkRadioField::with(
     *   defaultValues: ...,
     *   dependentFields: ...,
     *   fieldType: ...,
     *   hidden: ...,
     *   label: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   options: ...,
     *   required: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaymentLinkRadioField)
     *   ->withDefaultValues(...)
     *   ->withDependentFields(...)
     *   ->withFieldType(...)
     *   ->withHidden(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withOptions(...)
     *   ->withRequired(...)
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
     * @param list<string> $defaultValues
     * @param list<DependentField> $dependentFields
     * @param list<EnumeratedFieldOption> $options
     * @param FieldType|value-of<FieldType> $fieldType
     */
    public static function with(
        array $defaultValues,
        array $dependentFields,
        bool $hidden,
        string $label,
        string $name,
        string $objectTypeID,
        array $options,
        bool $required,
        FieldType|string $fieldType = 'payment_link_radio',
    ): self {
        $obj = new self;

        $obj->defaultValues = $defaultValues;
        $obj->dependentFields = $dependentFields;
        $obj['fieldType'] = $fieldType;
        $obj->hidden = $hidden;
        $obj->label = $label;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->options = $options;
        $obj->required = $required;

        return $obj;
    }

    /**
     * @param list<string> $defaultValues
     */
    public function withDefaultValues(array $defaultValues): self
    {
        $obj = clone $this;
        $obj->defaultValues = $defaultValues;

        return $obj;
    }

    /**
     * @param list<DependentField> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $obj = clone $this;
        $obj->dependentFields = $dependentFields;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<EnumeratedFieldOption> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj->required = $required;

        return $obj;
    }
}
