<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Forms\DependentFieldFilter\Operator;

/**
 * A form field that will be displayed based on what the customer entered in another field.
 *
 * @phpstan-type DependentFieldShape = array{
 *   dependentCondition: DependentFieldFilter,
 *   dependentField: EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField,
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
     * @param DependentFieldFilter|array{
     *   operator: value-of<Operator>,
     *   rangeEnd: string,
     *   rangeStart: string,
     *   value: string,
     *   values: list<string>,
     * } $dependentCondition
     */
    public static function with(
        DependentFieldFilter|array $dependentCondition,
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $obj = new self;

        $obj['dependentCondition'] = $dependentCondition;
        $obj['dependentField'] = $dependentField;

        return $obj;
    }

    /**
     * A condition based on customer input.
     *
     * @param DependentFieldFilter|array{
     *   operator: value-of<Operator>,
     *   rangeEnd: string,
     *   rangeStart: string,
     *   value: string,
     *   values: list<string>,
     * } $dependentCondition
     */
    public function withDependentCondition(
        DependentFieldFilter|array $dependentCondition
    ): self {
        $obj = clone $this;
        $obj['dependentCondition'] = $dependentCondition;

        return $obj;
    }

    /**
     * A form field used for collecting an email address.
     */
    public function withDependentField(
        EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField $dependentField,
    ): self {
        $obj = clone $this;
        $obj['dependentField'] = $dependentField;

        return $obj;
    }
}
