<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIStaticBranchAction;

use HubspotSDK\Automation\Workflows\APIActionDataValue;
use HubspotSDK\Automation\Workflows\APIAppendObjectPropertyValue;
use HubspotSDK\Automation\Workflows\APIEnrollmentEventPropertyValue;
use HubspotSDK\Automation\Workflows\APIFetchedObjectPropertyValue;
use HubspotSDK\Automation\Workflows\APIIncrementValue;
use HubspotSDK\Automation\Workflows\APIObjectPropertyValue;
use HubspotSDK\Automation\Workflows\APIRelativeDateTimeValue;
use HubspotSDK\Automation\Workflows\APIStaticAppendValue;
use HubspotSDK\Automation\Workflows\APIStaticValue;
use HubspotSDK\Automation\Workflows\APITimestampValue;
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
