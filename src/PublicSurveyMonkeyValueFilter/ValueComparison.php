<?php

declare(strict_types=1);

namespace HubspotSDK\PublicSurveyMonkeyValueFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicAllPropertyTypesOperation;
use HubspotSDK\PublicBoolPropertyOperation;
use HubspotSDK\PublicCalendarDatePropertyOperation;
use HubspotSDK\PublicComparativeDatePropertyOperation;
use HubspotSDK\PublicComparativePropertyUpdatedOperation;
use HubspotSDK\PublicDatePropertyOperation;
use HubspotSDK\PublicDateTimePropertyOperation;
use HubspotSDK\PublicEnumerationPropertyOperation;
use HubspotSDK\PublicMultiStringPropertyOperation;
use HubspotSDK\PublicNumberPropertyOperation;
use HubspotSDK\PublicRangedDatePropertyOperation;
use HubspotSDK\PublicRangedNumberPropertyOperation;
use HubspotSDK\PublicRangedTimeOperation;
use HubspotSDK\PublicRollingDateRangePropertyOperation;
use HubspotSDK\PublicRollingPropertyUpdatedOperation;
use HubspotSDK\PublicStringPropertyOperation;
use HubspotSDK\PublicTimePointOperation;

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
