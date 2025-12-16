<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\PaymentLinkRadioField\FieldType;

/**
 * @phpstan-import-type EnumeratedFieldOptionShape from \HubspotSDK\Marketing\Forms\EnumeratedFieldOption
 *
 * @phpstan-type PaymentLinkRadioFieldShape = array{
 *   defaultValues: list<string>,
 *   dependentFields: list<mixed>,
 *   fieldType: FieldType|value-of<FieldType>,
 *   hidden: bool,
 *   label: string,
 *   name: string,
 *   objectTypeID: string,
 *   options: list<EnumeratedFieldOptionShape>,
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
     * @param list<EnumeratedFieldOptionShape> $options
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
        $self = new self;

        $self['defaultValues'] = $defaultValues;
        $self['dependentFields'] = $dependentFields;
        $self['fieldType'] = $fieldType;
        $self['hidden'] = $hidden;
        $self['label'] = $label;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['options'] = $options;
        $self['required'] = $required;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * @param list<string> $defaultValues
     */
    public function withDefaultValues(array $defaultValues): self
    {
        $self = clone $this;
        $self['defaultValues'] = $defaultValues;

        return $self;
    }

    /**
     * @param list<mixed> $dependentFields
     */
    public function withDependentFields(array $dependentFields): self
    {
        $self = clone $this;
        $self['dependentFields'] = $dependentFields;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * @param list<EnumeratedFieldOptionShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }

    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
