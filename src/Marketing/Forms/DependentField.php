<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * A form field that will be displayed based on what the customer entered in another field.
 *
 * @phpstan-import-type DependentFieldFilterShape from \HubspotSDK\Marketing\Forms\DependentFieldFilter
 * @phpstan-import-type DependentFieldShape from \HubspotSDK\Marketing\Forms\DependentField\DependentField as DependentFieldShape1
 *
 * @phpstan-type DependentFieldShape = array{
 *   dependentCondition: DependentFieldFilter|DependentFieldFilterShape,
 *   dependentField: EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField|DependentFieldShape1,
 * }
 */
final class DependentField implements BaseModel
{
    /** @use SdkModel<DependentFieldShape> */
    use SdkModel;

    /**
     * A condition based on customer input.
     */
    #[Required]
    public DependentFieldFilter $dependentCondition;

    /**
     * A form field used for collecting an email address.
     */
    #[Required]
    public EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField;

    /**
     * `new DependentField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DependentField::with(dependentCondition: ..., dependentField: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DependentField)->withDependentCondition(...)->withDependentField(...)
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
     * @param DependentFieldFilterShape $dependentCondition
     * @param DependentFieldShape1 $dependentField
     */
    public static function with(
        DependentFieldFilter|array $dependentCondition,
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $self = new self;

        $self['dependentCondition'] = $dependentCondition;
        $self['dependentField'] = $dependentField;

        return $self;
    }

    /**
     * A condition based on customer input.
     *
     * @param DependentFieldFilterShape $dependentCondition
     */
    public function withDependentCondition(
        DependentFieldFilter|array $dependentCondition
    ): self {
        $self = clone $this;
        $self['dependentCondition'] = $dependentCondition;

        return $self;
    }

    /**
     * A form field used for collecting an email address.
     *
     * @param DependentFieldShape1 $dependentField
     */
    public function withDependentField(
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $self = clone $this;
        $self['dependentField'] = $dependentField;

        return $self;
    }
}
