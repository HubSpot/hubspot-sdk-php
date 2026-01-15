<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\FieldGroup;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Marketing\Forms\DatepickerField;
use HubspotSDK\Marketing\Forms\DropdownField;
use HubspotSDK\Marketing\Forms\EmailField;
use HubspotSDK\Marketing\Forms\FileField;
use HubspotSDK\Marketing\Forms\MobilePhoneField;
use HubspotSDK\Marketing\Forms\MultiLineTextField;
use HubspotSDK\Marketing\Forms\MultipleCheckboxesField;
use HubspotSDK\Marketing\Forms\NumberField;
use HubspotSDK\Marketing\Forms\PaymentLinkRadioField;
use HubspotSDK\Marketing\Forms\PhoneField;
use HubspotSDK\Marketing\Forms\RadioField;
use HubspotSDK\Marketing\Forms\SingleCheckboxField;
use HubspotSDK\Marketing\Forms\SingleLineTextField;

/**
 * A form field used for collecting an email address.
 *
 * @phpstan-import-type EmailFieldShape from \HubspotSDK\Marketing\Forms\EmailField
 * @phpstan-import-type PhoneFieldShape from \HubspotSDK\Marketing\Forms\PhoneField
 * @phpstan-import-type MobilePhoneFieldShape from \HubspotSDK\Marketing\Forms\MobilePhoneField
 * @phpstan-import-type SingleLineTextFieldShape from \HubspotSDK\Marketing\Forms\SingleLineTextField
 * @phpstan-import-type MultiLineTextFieldShape from \HubspotSDK\Marketing\Forms\MultiLineTextField
 * @phpstan-import-type NumberFieldShape from \HubspotSDK\Marketing\Forms\NumberField
 * @phpstan-import-type SingleCheckboxFieldShape from \HubspotSDK\Marketing\Forms\SingleCheckboxField
 * @phpstan-import-type MultipleCheckboxesFieldShape from \HubspotSDK\Marketing\Forms\MultipleCheckboxesField
 * @phpstan-import-type DropdownFieldShape from \HubspotSDK\Marketing\Forms\DropdownField
 * @phpstan-import-type RadioFieldShape from \HubspotSDK\Marketing\Forms\RadioField
 * @phpstan-import-type DatepickerFieldShape from \HubspotSDK\Marketing\Forms\DatepickerField
 * @phpstan-import-type FileFieldShape from \HubspotSDK\Marketing\Forms\FileField
 * @phpstan-import-type PaymentLinkRadioFieldShape from \HubspotSDK\Marketing\Forms\PaymentLinkRadioField
 *
 * @phpstan-type FieldVariants = EmailField|PhoneField|MobilePhoneField|SingleLineTextField|MultiLineTextField|NumberField|SingleCheckboxField|MultipleCheckboxesField|DropdownField|RadioField|DatepickerField|FileField|PaymentLinkRadioField
 * @phpstan-type FieldShape = FieldVariants|EmailFieldShape|PhoneFieldShape|MobilePhoneFieldShape|SingleLineTextFieldShape|MultiLineTextFieldShape|NumberFieldShape|SingleCheckboxFieldShape|MultipleCheckboxesFieldShape|DropdownFieldShape|RadioFieldShape|DatepickerFieldShape|FileFieldShape|PaymentLinkRadioFieldShape
 */
final class Field implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            EmailField::class,
            PhoneField::class,
            MobilePhoneField::class,
            SingleLineTextField::class,
            MultiLineTextField::class,
            NumberField::class,
            SingleCheckboxField::class,
            MultipleCheckboxesField::class,
            DropdownField::class,
            RadioField::class,
            DatepickerField::class,
            FileField::class,
            PaymentLinkRadioField::class,
        ];
    }
}
