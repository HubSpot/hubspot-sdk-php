<?php

declare(strict_types=1);

namespace HubspotSDK\Events\PropertyFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\AllPropertyTypesOperation;
use HubspotSDK\Events\BoolPropertyOperation;
use HubspotSDK\Events\CalendarDatePropertyOperation;
use HubspotSDK\Events\ComparativeBoolPropertyOperation;
use HubspotSDK\Events\ComparativeDatePropertyOperation;
use HubspotSDK\Events\ComparativeNumberPropertyOperation;
use HubspotSDK\Events\ComparativePropertyUpdatedOperation;
use HubspotSDK\Events\ComparativeStringPropertyOperation;
use HubspotSDK\Events\DatePropertyOperation;
use HubspotSDK\Events\DateTimePropertyOperation;
use HubspotSDK\Events\EnumerationPropertyOperation;
use HubspotSDK\Events\MultiStringPropertyOperation;
use HubspotSDK\Events\NumberPropertyOperation;
use HubspotSDK\Events\RangedDatePropertyOperation;
use HubspotSDK\Events\RangedNumberPropertyOperation;
use HubspotSDK\Events\RangedTimeOperation;
use HubspotSDK\Events\RegexPropertyOperation;
use HubspotSDK\Events\RollingDateRangePropertyOperation;
use HubspotSDK\Events\RollingPropertyUpdatedOperation;
use HubspotSDK\Events\StringPropertyOperation;
use HubspotSDK\Events\TimePointOperation;

/**
 * @phpstan-import-type BoolPropertyOperationShape from \HubspotSDK\Events\BoolPropertyOperation
 * @phpstan-import-type NumberPropertyOperationShape from \HubspotSDK\Events\NumberPropertyOperation
 * @phpstan-import-type StringPropertyOperationShape from \HubspotSDK\Events\StringPropertyOperation
 * @phpstan-import-type DateTimePropertyOperationShape from \HubspotSDK\Events\DateTimePropertyOperation
 * @phpstan-import-type RangedDatePropertyOperationShape from \HubspotSDK\Events\RangedDatePropertyOperation
 * @phpstan-import-type ComparativeDatePropertyOperationShape from \HubspotSDK\Events\ComparativeDatePropertyOperation
 * @phpstan-import-type ComparativeBoolPropertyOperationShape from \HubspotSDK\Events\ComparativeBoolPropertyOperation
 * @phpstan-import-type ComparativeNumberPropertyOperationShape from \HubspotSDK\Events\ComparativeNumberPropertyOperation
 * @phpstan-import-type ComparativeStringPropertyOperationShape from \HubspotSDK\Events\ComparativeStringPropertyOperation
 * @phpstan-import-type ComparativePropertyUpdatedOperationShape from \HubspotSDK\Events\ComparativePropertyUpdatedOperation
 * @phpstan-import-type RollingDateRangePropertyOperationShape from \HubspotSDK\Events\RollingDateRangePropertyOperation
 * @phpstan-import-type RollingPropertyUpdatedOperationShape from \HubspotSDK\Events\RollingPropertyUpdatedOperation
 * @phpstan-import-type EnumerationPropertyOperationShape from \HubspotSDK\Events\EnumerationPropertyOperation
 * @phpstan-import-type AllPropertyTypesOperationShape from \HubspotSDK\Events\AllPropertyTypesOperation
 * @phpstan-import-type RangedNumberPropertyOperationShape from \HubspotSDK\Events\RangedNumberPropertyOperation
 * @phpstan-import-type MultiStringPropertyOperationShape from \HubspotSDK\Events\MultiStringPropertyOperation
 * @phpstan-import-type DatePropertyOperationShape from \HubspotSDK\Events\DatePropertyOperation
 * @phpstan-import-type CalendarDatePropertyOperationShape from \HubspotSDK\Events\CalendarDatePropertyOperation
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\RangedTimeOperation
 * @phpstan-import-type RegexPropertyOperationShape from \HubspotSDK\Events\RegexPropertyOperation
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
