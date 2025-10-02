<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type marketing_forms_dependent_field = array{
 *   dependentCondition: MarketingFormsDependentFieldFilter,
 *   dependentField: MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField,
 * }
 */
final class MarketingFormsDependentField implements BaseModel
{
    /** @use SdkModel<marketing_forms_dependent_field> */
    use SdkModel;

    #[Api]
    public MarketingFormsDependentFieldFilter $dependentCondition;

    #[Api]
    public MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField $dependentField;

    /**
     * `new MarketingFormsDependentField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MarketingFormsDependentField::with(dependentCondition: ..., dependentField: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MarketingFormsDependentField)
     *   ->withDependentCondition(...)
     *   ->withDependentField(...)
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
        MarketingFormsDependentFieldFilter $dependentCondition,
        MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField $dependentField,
    ): self {
        $obj = new self;

        $obj->dependentCondition = $dependentCondition;
        $obj->dependentField = $dependentField;

        return $obj;
    }

    public function withDependentCondition(
        MarketingFormsDependentFieldFilter $dependentCondition
    ): self {
        $obj = clone $this;
        $obj->dependentCondition = $dependentCondition;

        return $obj;
    }

    public function withDependentField(
        MarketingFormsEmailField|MarketingFormsPhoneField|MarketingFormsMobilePhoneField|MarketingFormsSingleLineTextField|MarketingFormsMultiLineTextField|MarketingFormsNumberField|MarketingFormsSingleCheckboxField|MarketingFormsMultipleCheckboxesField|MarketingFormsDropdownField|MarketingFormsRadioField|MarketingFormsDatepickerField|MarketingFormsFileField|MarketingFormsPaymentLinkRadioField $dependentField,
    ): self {
        $obj = clone $this;
        $obj->dependentField = $dependentField;

        return $obj;
    }
}
