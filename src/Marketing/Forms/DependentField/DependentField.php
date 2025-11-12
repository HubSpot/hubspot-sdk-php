<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\DependentField;

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
 */
final class DependentField implements ConverterSource
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
