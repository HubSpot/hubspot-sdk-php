<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type dependent_field = array{
 *   dependentCondition: DependentFieldFilter,
 *   dependentField: EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField,
 * }
 */
final class DependentField implements BaseModel
{
    /** @use SdkModel<dependent_field> */
    use SdkModel;

    #[Api]
    public DependentFieldFilter $dependentCondition;

    #[Api]
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
     */
    public static function with(
        DependentFieldFilter $dependentCondition,
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $obj = new self;

        $obj->dependentCondition = $dependentCondition;
        $obj->dependentField = $dependentField;

        return $obj;
    }

    public function withDependentCondition(
        DependentFieldFilter $dependentCondition
    ): self {
        $obj = clone $this;
        $obj->dependentCondition = $dependentCondition;

        return $obj;
    }

    public function withDependentField(
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $obj = clone $this;
        $obj->dependentField = $dependentField;

        return $obj;
    }
}
