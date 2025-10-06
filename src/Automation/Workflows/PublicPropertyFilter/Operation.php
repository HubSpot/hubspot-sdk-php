<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicPropertyFilter;

use HubspotSDK\Automation\Workflows\PublicAllPropertyTypesOperation;
use HubspotSDK\Automation\Workflows\PublicBoolPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicCalendarDatePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicComparativeDatePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicComparativePropertyUpdatedOperation;
use HubspotSDK\Automation\Workflows\PublicDatePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicDateTimePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicEnumerationPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicMultiStringPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicNumberPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicRangedDatePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicRangedNumberPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicRangedTimeOperation;
use HubspotSDK\Automation\Workflows\PublicRollingDateRangePropertyOperation;
use HubspotSDK\Automation\Workflows\PublicRollingPropertyUpdatedOperation;
use HubspotSDK\Automation\Workflows\PublicStringPropertyOperation;
use HubspotSDK\Automation\Workflows\PublicTimePointOperation;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class Operation implements ConverterSource
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
