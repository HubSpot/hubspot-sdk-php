<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIInputVariable;

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

/**
 * @phpstan-import-type APIActionDataValueShape from \HubspotSDK\Automation\Workflows\APIActionDataValue
 * @phpstan-import-type APIObjectPropertyValueShape from \HubspotSDK\Automation\Workflows\APIObjectPropertyValue
 * @phpstan-import-type APIStaticValueShape from \HubspotSDK\Automation\Workflows\APIStaticValue
 * @phpstan-import-type APIRelativeDateTimeValueShape from \HubspotSDK\Automation\Workflows\APIRelativeDateTimeValue
 * @phpstan-import-type APITimestampValueShape from \HubspotSDK\Automation\Workflows\APITimestampValue
 * @phpstan-import-type APIIncrementValueShape from \HubspotSDK\Automation\Workflows\APIIncrementValue
 * @phpstan-import-type APIFetchedObjectPropertyValueShape from \HubspotSDK\Automation\Workflows\APIFetchedObjectPropertyValue
 * @phpstan-import-type APIAppendObjectPropertyValueShape from \HubspotSDK\Automation\Workflows\APIAppendObjectPropertyValue
 * @phpstan-import-type APIStaticAppendValueShape from \HubspotSDK\Automation\Workflows\APIStaticAppendValue
 * @phpstan-import-type APIEnrollmentEventPropertyValueShape from \HubspotSDK\Automation\Workflows\APIEnrollmentEventPropertyValue
 *
 * @phpstan-type ValueVariants = APIActionDataValue|APIObjectPropertyValue|APIStaticValue|APIRelativeDateTimeValue|APITimestampValue|APIIncrementValue|APIFetchedObjectPropertyValue|APIAppendObjectPropertyValue|APIStaticAppendValue|APIEnrollmentEventPropertyValue
 * @phpstan-type ValueShape = ValueVariants|APIActionDataValueShape|APIObjectPropertyValueShape|APIStaticValueShape|APIRelativeDateTimeValueShape|APITimestampValueShape|APIIncrementValueShape|APIFetchedObjectPropertyValueShape|APIAppendObjectPropertyValueShape|APIStaticAppendValueShape|APIEnrollmentEventPropertyValueShape
 */
final class Value implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
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
