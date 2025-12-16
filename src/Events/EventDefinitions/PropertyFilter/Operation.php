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

/**
 * @phpstan-import-type BoolPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\BoolPropertyOperation
 * @phpstan-import-type NumberPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\NumberPropertyOperation
 * @phpstan-import-type StringPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\StringPropertyOperation
 * @phpstan-import-type DateTimePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\DateTimePropertyOperation
 * @phpstan-import-type RangedDatePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\RangedDatePropertyOperation
 * @phpstan-import-type ComparativeDatePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\ComparativeDatePropertyOperation
 * @phpstan-import-type ComparativePropertyUpdatedOperationShape from \HubspotSDK\Events\EventDefinitions\ComparativePropertyUpdatedOperation
 * @phpstan-import-type RollingDateRangePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\RollingDateRangePropertyOperation
 * @phpstan-import-type RollingPropertyUpdatedOperationShape from \HubspotSDK\Events\EventDefinitions\RollingPropertyUpdatedOperation
 * @phpstan-import-type EnumerationPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\EnumerationPropertyOperation
 * @phpstan-import-type AllPropertyTypesOperationShape from \HubspotSDK\Events\EventDefinitions\AllPropertyTypesOperation
 * @phpstan-import-type RangedNumberPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\RangedNumberPropertyOperation
 * @phpstan-import-type MultiStringPropertyOperationShape from \HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation
 * @phpstan-import-type DatePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\DatePropertyOperation
 * @phpstan-import-type CalendarDatePropertyOperationShape from \HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\EventDefinitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\EventDefinitions\RangedTimeOperation
 *
 * @phpstan-type OperationShape = BoolPropertyOperationShape|NumberPropertyOperationShape|StringPropertyOperationShape|DateTimePropertyOperationShape|RangedDatePropertyOperationShape|ComparativeDatePropertyOperationShape|ComparativePropertyUpdatedOperationShape|RollingDateRangePropertyOperationShape|RollingPropertyUpdatedOperationShape|EnumerationPropertyOperationShape|AllPropertyTypesOperationShape|RangedNumberPropertyOperationShape|MultiStringPropertyOperationShape|DatePropertyOperationShape|CalendarDatePropertyOperationShape|TimePointOperationShape|RangedTimeOperationShape
 */
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
