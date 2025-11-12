<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\PropertyFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation;
use HubspotSDK\Events\EventDefinitions\BoolPropertyOperation;
use HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation;
use HubspotSDK\Events\EventDefinitions\ComparativeDatePropertyOperation;
use HubspotSDK\Events\EventDefinitions\ComparativePropertyUpdatedOperation;
use HubspotSDK\Events\EventDefinitions\DatePropertyOperation;
use HubspotSDK\Events\EventDefinitions\DateTimePropertyOperation;
use HubspotSDK\Events\EventDefinitions\EnumerationPropertyOperation;
use HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation;
use HubspotSDK\Events\EventDefinitions\NumberPropertyOperation;
use HubspotSDK\Events\EventDefinitions\RangedDatePropertyOperation;
use HubspotSDK\Events\EventDefinitions\RangedNumberPropertyOperation;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation;
use HubspotSDK\Events\EventDefinitions\RollingDateRangePropertyOperation;
use HubspotSDK\Events\EventDefinitions\RollingPropertyUpdatedOperation;
use HubspotSDK\Events\EventDefinitions\StringPropertyOperation;
use HubspotSDK\Events\EventDefinitions\TimePointOperation;

final class Operation implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            BoolPropertyOperation::class,
            NumberPropertyOperation::class,
            StringPropertyOperation::class,
            DateTimePropertyOperation::class,
            RangedDatePropertyOperation::class,
            ComparativeDatePropertyOperation::class,
            ComparativePropertyUpdatedOperation::class,
            RollingDateRangePropertyOperation::class,
            RollingPropertyUpdatedOperation::class,
            EnumerationPropertyOperation::class,
            AllPropertyTypesOperation::class,
            RangedNumberPropertyOperation::class,
            MultiStringPropertyOperation::class,
            DatePropertyOperation::class,
            CalendarDatePropertyOperation::class,
            TimePointOperation::class,
            RangedTimeOperation::class,
        ];
    }
}
