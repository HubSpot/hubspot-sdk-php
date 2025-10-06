<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIInputVariable;

use HubspotSDK\Automation\APIActionDataValue;
use HubspotSDK\Automation\APIAppendObjectPropertyValue;
use HubspotSDK\Automation\APIEnrollmentEventPropertyValue;
use HubspotSDK\Automation\APIFetchedObjectPropertyValue;
use HubspotSDK\Automation\APIIncrementValue;
use HubspotSDK\Automation\APIObjectPropertyValue;
use HubspotSDK\Automation\APIRelativeDateTimeValue;
use HubspotSDK\Automation\APIStaticAppendValue;
use HubspotSDK\Automation\APIStaticValue;
use HubspotSDK\Automation\APITimestampValue;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Value implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            APIActionDataValue::class,
            APIObjectPropertyValue::class,
            APIStaticValue::class,
            APIRelativeDateTimeValue::class,
            APITimestampValue::class,
            APIIncrementValue::class,
            APIFetchedObjectPropertyValue::class,
            APIAppendObjectPropertyValue::class,
            APIStaticAppendValue::class,
            APIEnrollmentEventPropertyValue::class,
        ];
    }
}
