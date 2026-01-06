<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\PaymentLinkRadioField\FieldType;

/**
 * @phpstan-type PaymentLinkRadioFieldShape = array{
 *   defaultValues: list<string>,
 *   dependentFields: list<mixed>,
 *   fieldType: value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   options: list<EnumeratedFieldOption>,
 *   required: bool,
 *   description?: string|null,
 * }
 */
final class PaymentLinkRadioField implements BaseModel
{
    /** @use SdkModel<PaymentLinkRadioFieldShape> */
    use SdkModel;

    /** @var list<string> $defaultValues */
    #[Required(list: 'string')]
    public array $defaultValues;

    /** @var list<mixed> $dependentFields */
    #[Required(list: DependentField::class)]
    public array $dependentFields;

    /** @var value-of<FieldType> $fieldType */
    #[Required(enum: FieldType::class)]
    public string $fieldType;

    #[Required]
    public bool $hidden;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /** @var list<EnumeratedFieldOption> $options */
    #[Required(list: EnumeratedFieldOption::class)]
    public array $options;

    #[Required]
    public bool $required;

    #[Optional]
    public ?string $description;

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
     * @param list<mixed> $dependentFields
     * @param list<EnumeratedFieldOption|array{
     *   displayOrder: int, label: string, value: string, description?: string|null
     * }> $options
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
        ?string $description = null,
    ): self {
        $obj = new self;

        $obj['defaultValues'] = $defaultValues;
        $obj['dependentFields'] = $dependentFields;
        $obj['fieldType'] = $fieldType;
        $obj['hidden'] = $hidden;
        $obj['label'] = $label;
        $obj['name'] = $name;
        $obj['objectTypeID'] = $objectTypeID;
        $obj['options'] = $options;
        $obj['required'] = $required;

        null !== $description && $obj['description'] = $description;

        return $obj;
    }

    /**
     * @param list<string> $defaultValues
     */
    public function withDefaultValues(array $defaultValues): self
    {
        $obj = clone $this;
        $obj['defaultValues'] = $defaultValues;

        return $obj;
    }

    /**
     * @param list<mixed> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $obj = clone $this;
        $obj['dependentFields'] = $dependentFields;

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
        $obj['hidden'] = $hidden;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeID'] = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<EnumeratedFieldOption|array{
     *   displayOrder: int, label: string, value: string, description?: string|null
     * }> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj['options'] = $options;

        return $obj;
    }

    public function withRequired(bool $required): self
    {
        $obj = clone $this;
        $obj['required'] = $required;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }
}
