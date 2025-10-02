<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIStaticBranchAction;

use HubspotSDK\Automation\AutomationAPIActionDataValue;
use HubspotSDK\Automation\AutomationAPIAppendObjectPropertyValue;
use HubspotSDK\Automation\AutomationAPIEnrollmentEventPropertyValue;
use HubspotSDK\Automation\AutomationAPIFetchedObjectPropertyValue;
use HubspotSDK\Automation\AutomationAPIIncrementValue;
use HubspotSDK\Automation\AutomationAPIObjectPropertyValue;
use HubspotSDK\Automation\AutomationAPIRelativeDateTimeValue;
use HubspotSDK\Automation\AutomationAPIStaticAppendValue;
use HubspotSDK\Automation\AutomationAPIStaticValue;
use HubspotSDK\Automation\AutomationAPITimestampValue;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class InputValue implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIActionDataValue::class,
            AutomationAPIObjectPropertyValue::class,
            AutomationAPIStaticValue::class,
            AutomationAPIRelativeDateTimeValue::class,
            AutomationAPITimestampValue::class,
            AutomationAPIIncrementValue::class,
            AutomationAPIFetchedObjectPropertyValue::class,
            AutomationAPIAppendObjectPropertyValue::class,
            AutomationAPIStaticAppendValue::class,
            AutomationAPIEnrollmentEventPropertyValue::class,
        ];
    }
}
