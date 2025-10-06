<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicSurveyMonkeyValueFilter;

use HubspotSDK\Automation\PublicAllPropertyTypesOperation;
use HubspotSDK\Automation\PublicBoolPropertyOperation;
use HubspotSDK\Automation\PublicCalendarDatePropertyOperation;
use HubspotSDK\Automation\PublicComparativeDatePropertyOperation;
use HubspotSDK\Automation\PublicComparativePropertyUpdatedOperation;
use HubspotSDK\Automation\PublicDatePropertyOperation;
use HubspotSDK\Automation\PublicDateTimePropertyOperation;
use HubspotSDK\Automation\PublicEnumerationPropertyOperation;
use HubspotSDK\Automation\PublicMultiStringPropertyOperation;
use HubspotSDK\Automation\PublicNumberPropertyOperation;
use HubspotSDK\Automation\PublicRangedDatePropertyOperation;
use HubspotSDK\Automation\PublicRangedNumberPropertyOperation;
use HubspotSDK\Automation\PublicRangedTimeOperation;
use HubspotSDK\Automation\PublicRollingDateRangePropertyOperation;
use HubspotSDK\Automation\PublicRollingPropertyUpdatedOperation;
use HubspotSDK\Automation\PublicStringPropertyOperation;
use HubspotSDK\Automation\PublicTimePointOperation;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class ValueComparison implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            PublicBoolPropertyOperation::class,
            PublicNumberPropertyOperation::class,
            PublicStringPropertyOperation::class,
            PublicDateTimePropertyOperation::class,
            PublicRangedDatePropertyOperation::class,
            PublicComparativePropertyUpdatedOperation::class,
            PublicComparativeDatePropertyOperation::class,
            PublicRollingDateRangePropertyOperation::class,
            PublicRollingPropertyUpdatedOperation::class,
            PublicEnumerationPropertyOperation::class,
            PublicAllPropertyTypesOperation::class,
            PublicRangedNumberPropertyOperation::class,
            PublicMultiStringPropertyOperation::class,
            PublicDatePropertyOperation::class,
            PublicCalendarDatePropertyOperation::class,
            PublicTimePointOperation::class,
            PublicRangedTimeOperation::class,
        ];
    }
}
