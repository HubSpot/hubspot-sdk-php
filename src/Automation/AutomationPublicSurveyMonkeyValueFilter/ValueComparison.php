<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationPublicSurveyMonkeyValueFilter;

use HubspotSDK\Automation\AutomationPublicAllPropertyTypesOperation;
use HubspotSDK\Automation\AutomationPublicBoolPropertyOperation;
use HubspotSDK\Automation\AutomationPublicCalendarDatePropertyOperation;
use HubspotSDK\Automation\AutomationPublicComparativeDatePropertyOperation;
use HubspotSDK\Automation\AutomationPublicComparativePropertyUpdatedOperation;
use HubspotSDK\Automation\AutomationPublicDatePropertyOperation;
use HubspotSDK\Automation\AutomationPublicDateTimePropertyOperation;
use HubspotSDK\Automation\AutomationPublicEnumerationPropertyOperation;
use HubspotSDK\Automation\AutomationPublicMultiStringPropertyOperation;
use HubspotSDK\Automation\AutomationPublicNumberPropertyOperation;
use HubspotSDK\Automation\AutomationPublicRangedDatePropertyOperation;
use HubspotSDK\Automation\AutomationPublicRangedNumberPropertyOperation;
use HubspotSDK\Automation\AutomationPublicRangedTimeOperation;
use HubspotSDK\Automation\AutomationPublicRollingDateRangePropertyOperation;
use HubspotSDK\Automation\AutomationPublicRollingPropertyUpdatedOperation;
use HubspotSDK\Automation\AutomationPublicStringPropertyOperation;
use HubspotSDK\Automation\AutomationPublicTimePointOperation;
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
            AutomationPublicBoolPropertyOperation::class,
            AutomationPublicNumberPropertyOperation::class,
            AutomationPublicStringPropertyOperation::class,
            AutomationPublicDateTimePropertyOperation::class,
            AutomationPublicRangedDatePropertyOperation::class,
            AutomationPublicComparativePropertyUpdatedOperation::class,
            AutomationPublicComparativeDatePropertyOperation::class,
            AutomationPublicRollingDateRangePropertyOperation::class,
            AutomationPublicRollingPropertyUpdatedOperation::class,
            AutomationPublicEnumerationPropertyOperation::class,
            AutomationPublicAllPropertyTypesOperation::class,
            AutomationPublicRangedNumberPropertyOperation::class,
            AutomationPublicMultiStringPropertyOperation::class,
            AutomationPublicDatePropertyOperation::class,
            AutomationPublicCalendarDatePropertyOperation::class,
            AutomationPublicTimePointOperation::class,
            AutomationPublicRangedTimeOperation::class,
        ];
    }
}
