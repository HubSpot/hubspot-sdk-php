<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\PropertyFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Send\AllPropertyTypesOperation;
use HubspotSDK\Events\Send\BoolPropertyOperation;
use HubspotSDK\Events\Send\CalendarDatePropertyOperation;
use HubspotSDK\Events\Send\ComparativeBoolPropertyOperation;
use HubspotSDK\Events\Send\ComparativeDatePropertyOperation;
use HubspotSDK\Events\Send\ComparativeNumberPropertyOperation;
use HubspotSDK\Events\Send\ComparativePropertyUpdatedOperation;
use HubspotSDK\Events\Send\ComparativeStringPropertyOperation;
use HubspotSDK\Events\Send\DatePropertyOperation;
use HubspotSDK\Events\Send\DateTimePropertyOperation;
use HubspotSDK\Events\Send\EnumerationPropertyOperation;
use HubspotSDK\Events\Send\MultiStringPropertyOperation;
use HubspotSDK\Events\Send\NumberPropertyOperation;
use HubspotSDK\Events\Send\RangedDatePropertyOperation;
use HubspotSDK\Events\Send\RangedNumberPropertyOperation;
use HubspotSDK\Events\Send\RangedTimeOperation;
use HubspotSDK\Events\Send\RegexPropertyOperation;
use HubspotSDK\Events\Send\RollingDateRangePropertyOperation;
use HubspotSDK\Events\Send\RollingPropertyUpdatedOperation;
use HubspotSDK\Events\Send\StringPropertyOperation;
use HubspotSDK\Events\Send\TimePointOperation;

/**
 * @phpstan-import-type BoolPropertyOperationShape from \HubspotSDK\Events\Send\BoolPropertyOperation
 * @phpstan-import-type NumberPropertyOperationShape from \HubspotSDK\Events\Send\NumberPropertyOperation
 * @phpstan-import-type StringPropertyOperationShape from \HubspotSDK\Events\Send\StringPropertyOperation
 * @phpstan-import-type DateTimePropertyOperationShape from \HubspotSDK\Events\Send\DateTimePropertyOperation
 * @phpstan-import-type RangedDatePropertyOperationShape from \HubspotSDK\Events\Send\RangedDatePropertyOperation
 * @phpstan-import-type ComparativeDatePropertyOperationShape from \HubspotSDK\Events\Send\ComparativeDatePropertyOperation
 * @phpstan-import-type ComparativeBoolPropertyOperationShape from \HubspotSDK\Events\Send\ComparativeBoolPropertyOperation
 * @phpstan-import-type ComparativeNumberPropertyOperationShape from \HubspotSDK\Events\Send\ComparativeNumberPropertyOperation
 * @phpstan-import-type ComparativeStringPropertyOperationShape from \HubspotSDK\Events\Send\ComparativeStringPropertyOperation
 * @phpstan-import-type ComparativePropertyUpdatedOperationShape from \HubspotSDK\Events\Send\ComparativePropertyUpdatedOperation
 * @phpstan-import-type RollingDateRangePropertyOperationShape from \HubspotSDK\Events\Send\RollingDateRangePropertyOperation
 * @phpstan-import-type RollingPropertyUpdatedOperationShape from \HubspotSDK\Events\Send\RollingPropertyUpdatedOperation
 * @phpstan-import-type EnumerationPropertyOperationShape from \HubspotSDK\Events\Send\EnumerationPropertyOperation
 * @phpstan-import-type AllPropertyTypesOperationShape from \HubspotSDK\Events\Send\AllPropertyTypesOperation
 * @phpstan-import-type RangedNumberPropertyOperationShape from \HubspotSDK\Events\Send\RangedNumberPropertyOperation
 * @phpstan-import-type MultiStringPropertyOperationShape from \HubspotSDK\Events\Send\MultiStringPropertyOperation
 * @phpstan-import-type DatePropertyOperationShape from \HubspotSDK\Events\Send\DatePropertyOperation
 * @phpstan-import-type CalendarDatePropertyOperationShape from \HubspotSDK\Events\Send\CalendarDatePropertyOperation
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\Send\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\Send\RangedTimeOperation
 * @phpstan-import-type RegexPropertyOperationShape from \HubspotSDK\Events\Send\RegexPropertyOperation
 *
 * @phpstan-type OperationVariants = BoolPropertyOperation|NumberPropertyOperation|StringPropertyOperation|DateTimePropertyOperation|RangedDatePropertyOperation|ComparativeDatePropertyOperation|ComparativeBoolPropertyOperation|ComparativeNumberPropertyOperation|ComparativeStringPropertyOperation|ComparativePropertyUpdatedOperation|RollingDateRangePropertyOperation|RollingPropertyUpdatedOperation|EnumerationPropertyOperation|AllPropertyTypesOperation|RangedNumberPropertyOperation|MultiStringPropertyOperation|DatePropertyOperation|CalendarDatePropertyOperation|TimePointOperation|RangedTimeOperation|RegexPropertyOperation
 * @phpstan-type OperationShape = OperationVariants|BoolPropertyOperationShape|NumberPropertyOperationShape|StringPropertyOperationShape|DateTimePropertyOperationShape|RangedDatePropertyOperationShape|ComparativeDatePropertyOperationShape|ComparativeBoolPropertyOperationShape|ComparativeNumberPropertyOperationShape|ComparativeStringPropertyOperationShape|ComparativePropertyUpdatedOperationShape|RollingDateRangePropertyOperationShape|RollingPropertyUpdatedOperationShape|EnumerationPropertyOperationShape|AllPropertyTypesOperationShape|RangedNumberPropertyOperationShape|MultiStringPropertyOperationShape|DatePropertyOperationShape|CalendarDatePropertyOperationShape|TimePointOperationShape|RangedTimeOperationShape|RegexPropertyOperationShape
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
            ComparativeBoolPropertyOperation::class,
            ComparativeNumberPropertyOperation::class,
            ComparativeStringPropertyOperation::class,
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
            RegexPropertyOperation::class,
        ];
    }
}
