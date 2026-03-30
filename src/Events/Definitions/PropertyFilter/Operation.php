<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\PropertyFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Definitions\AllPropertyTypesOperation;
use HubspotSDK\Events\Definitions\BoolPropertyOperation;
use HubspotSDK\Events\Definitions\CalendarDatePropertyOperation;
use HubspotSDK\Events\Definitions\ComparativeBoolPropertyOperation;
use HubspotSDK\Events\Definitions\ComparativeDatePropertyOperation;
use HubspotSDK\Events\Definitions\ComparativeNumberPropertyOperation;
use HubspotSDK\Events\Definitions\ComparativePropertyUpdatedOperation;
use HubspotSDK\Events\Definitions\ComparativeStringPropertyOperation;
use HubspotSDK\Events\Definitions\DatePropertyOperation;
use HubspotSDK\Events\Definitions\DateTimePropertyOperation;
use HubspotSDK\Events\Definitions\EnumerationPropertyOperation;
use HubspotSDK\Events\Definitions\MultiStringPropertyOperation;
use HubspotSDK\Events\Definitions\NumberPropertyOperation;
use HubspotSDK\Events\Definitions\RangedDatePropertyOperation;
use HubspotSDK\Events\Definitions\RangedNumberPropertyOperation;
use HubspotSDK\Events\Definitions\RangedTimeOperation;
use HubspotSDK\Events\Definitions\RegexPropertyOperation;
use HubspotSDK\Events\Definitions\RollingDateRangePropertyOperation;
use HubspotSDK\Events\Definitions\RollingPropertyUpdatedOperation;
use HubspotSDK\Events\Definitions\StringPropertyOperation;
use HubspotSDK\Events\Definitions\TimePointOperation;

/**
 * @phpstan-import-type BoolPropertyOperationShape from \HubspotSDK\Events\Definitions\BoolPropertyOperation
 * @phpstan-import-type NumberPropertyOperationShape from \HubspotSDK\Events\Definitions\NumberPropertyOperation
 * @phpstan-import-type StringPropertyOperationShape from \HubspotSDK\Events\Definitions\StringPropertyOperation
 * @phpstan-import-type DateTimePropertyOperationShape from \HubspotSDK\Events\Definitions\DateTimePropertyOperation
 * @phpstan-import-type RangedDatePropertyOperationShape from \HubspotSDK\Events\Definitions\RangedDatePropertyOperation
 * @phpstan-import-type ComparativeDatePropertyOperationShape from \HubspotSDK\Events\Definitions\ComparativeDatePropertyOperation
 * @phpstan-import-type ComparativeBoolPropertyOperationShape from \HubspotSDK\Events\Definitions\ComparativeBoolPropertyOperation
 * @phpstan-import-type ComparativeNumberPropertyOperationShape from \HubspotSDK\Events\Definitions\ComparativeNumberPropertyOperation
 * @phpstan-import-type ComparativeStringPropertyOperationShape from \HubspotSDK\Events\Definitions\ComparativeStringPropertyOperation
 * @phpstan-import-type ComparativePropertyUpdatedOperationShape from \HubspotSDK\Events\Definitions\ComparativePropertyUpdatedOperation
 * @phpstan-import-type RollingDateRangePropertyOperationShape from \HubspotSDK\Events\Definitions\RollingDateRangePropertyOperation
 * @phpstan-import-type RollingPropertyUpdatedOperationShape from \HubspotSDK\Events\Definitions\RollingPropertyUpdatedOperation
 * @phpstan-import-type EnumerationPropertyOperationShape from \HubspotSDK\Events\Definitions\EnumerationPropertyOperation
 * @phpstan-import-type AllPropertyTypesOperationShape from \HubspotSDK\Events\Definitions\AllPropertyTypesOperation
 * @phpstan-import-type RangedNumberPropertyOperationShape from \HubspotSDK\Events\Definitions\RangedNumberPropertyOperation
 * @phpstan-import-type MultiStringPropertyOperationShape from \HubspotSDK\Events\Definitions\MultiStringPropertyOperation
 * @phpstan-import-type DatePropertyOperationShape from \HubspotSDK\Events\Definitions\DatePropertyOperation
 * @phpstan-import-type CalendarDatePropertyOperationShape from \HubspotSDK\Events\Definitions\CalendarDatePropertyOperation
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\Definitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\Definitions\RangedTimeOperation
 * @phpstan-import-type RegexPropertyOperationShape from \HubspotSDK\Events\Definitions\RegexPropertyOperation
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
