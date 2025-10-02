<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Marketing\Forms\MarketingFormsDatepickerField;
use HubspotSDK\Marketing\Forms\MarketingFormsDropdownField;
use HubspotSDK\Marketing\Forms\MarketingFormsEmailField;
use HubspotSDK\Marketing\Forms\MarketingFormsFileField;
use HubspotSDK\Marketing\Forms\MarketingFormsMobilePhoneField;
use HubspotSDK\Marketing\Forms\MarketingFormsMultiLineTextField;
use HubspotSDK\Marketing\Forms\MarketingFormsMultipleCheckboxesField;
use HubspotSDK\Marketing\Forms\MarketingFormsNumberField;
use HubspotSDK\Marketing\Forms\MarketingFormsPaymentLinkRadioField;
use HubspotSDK\Marketing\Forms\MarketingFormsPhoneField;
use HubspotSDK\Marketing\Forms\MarketingFormsRadioField;
use HubspotSDK\Marketing\Forms\MarketingFormsSingleCheckboxField;
use HubspotSDK\Marketing\Forms\MarketingFormsSingleLineTextField;

final class Field implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            MarketingFormsEmailField::class,
            MarketingFormsPhoneField::class,
            MarketingFormsMobilePhoneField::class,
            MarketingFormsSingleLineTextField::class,
            MarketingFormsMultiLineTextField::class,
            MarketingFormsNumberField::class,
            MarketingFormsSingleCheckboxField::class,
            MarketingFormsMultipleCheckboxesField::class,
            MarketingFormsDropdownField::class,
            MarketingFormsRadioField::class,
            MarketingFormsDatepickerField::class,
            MarketingFormsFileField::class,
            MarketingFormsPaymentLinkRadioField::class,
        ];
    }
}
