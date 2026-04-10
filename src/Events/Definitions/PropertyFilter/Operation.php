<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\PropertyFilter;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\AllPropertyTypesOperation;
use HubSpotSDK\Events\Definitions\BoolPropertyOperation;
use HubSpotSDK\Events\Definitions\CalendarDatePropertyOperation;
use HubSpotSDK\Events\Definitions\ComparativeBoolPropertyOperation;
use HubSpotSDK\Events\Definitions\ComparativeDatePropertyOperation;
use HubSpotSDK\Events\Definitions\ComparativeNumberPropertyOperation;
use HubSpotSDK\Events\Definitions\ComparativePropertyUpdatedOperation;
use HubSpotSDK\Events\Definitions\ComparativeStringPropertyOperation;
use HubSpotSDK\Events\Definitions\DatePropertyOperation;
use HubSpotSDK\Events\Definitions\DateTimePropertyOperation;
use HubSpotSDK\Events\Definitions\EnumerationPropertyOperation;
use HubSpotSDK\Events\Definitions\MultiStringPropertyOperation;
use HubSpotSDK\Events\Definitions\NumberPropertyOperation;
use HubSpotSDK\Events\Definitions\RangedDatePropertyOperation;
use HubSpotSDK\Events\Definitions\RangedNumberPropertyOperation;
use HubSpotSDK\Events\Definitions\RangedTimeOperation;
use HubSpotSDK\Events\Definitions\RegexPropertyOperation;
use HubSpotSDK\Events\Definitions\RollingDateRangePropertyOperation;
use HubSpotSDK\Events\Definitions\RollingPropertyUpdatedOperation;
use HubSpotSDK\Events\Definitions\StringPropertyOperation;
use HubSpotSDK\Events\Definitions\TimePointOperation;

/**
 * @phpstan-import-type BoolPropertyOperationShape from \HubSpotSDK\Events\Definitions\BoolPropertyOperation
 * @phpstan-import-type NumberPropertyOperationShape from \HubSpotSDK\Events\Definitions\NumberPropertyOperation
 * @phpstan-import-type StringPropertyOperationShape from \HubSpotSDK\Events\Definitions\StringPropertyOperation
 * @phpstan-import-type DateTimePropertyOperationShape from \HubSpotSDK\Events\Definitions\DateTimePropertyOperation
 * @phpstan-import-type RangedDatePropertyOperationShape from \HubSpotSDK\Events\Definitions\RangedDatePropertyOperation
 * @phpstan-import-type ComparativeDatePropertyOperationShape from \HubSpotSDK\Events\Definitions\ComparativeDatePropertyOperation
 * @phpstan-import-type ComparativeBoolPropertyOperationShape from \HubSpotSDK\Events\Definitions\ComparativeBoolPropertyOperation
 * @phpstan-import-type ComparativeNumberPropertyOperationShape from \HubSpotSDK\Events\Definitions\ComparativeNumberPropertyOperation
 * @phpstan-import-type ComparativeStringPropertyOperationShape from \HubSpotSDK\Events\Definitions\ComparativeStringPropertyOperation
 * @phpstan-import-type ComparativePropertyUpdatedOperationShape from \HubSpotSDK\Events\Definitions\ComparativePropertyUpdatedOperation
 * @phpstan-import-type RollingDateRangePropertyOperationShape from \HubSpotSDK\Events\Definitions\RollingDateRangePropertyOperation
 * @phpstan-import-type RollingPropertyUpdatedOperationShape from \HubSpotSDK\Events\Definitions\RollingPropertyUpdatedOperation
 * @phpstan-import-type EnumerationPropertyOperationShape from \HubSpotSDK\Events\Definitions\EnumerationPropertyOperation
 * @phpstan-import-type AllPropertyTypesOperationShape from \HubSpotSDK\Events\Definitions\AllPropertyTypesOperation
 * @phpstan-import-type RangedNumberPropertyOperationShape from \HubSpotSDK\Events\Definitions\RangedNumberPropertyOperation
 * @phpstan-import-type MultiStringPropertyOperationShape from \HubSpotSDK\Events\Definitions\MultiStringPropertyOperation
 * @phpstan-import-type DatePropertyOperationShape from \HubSpotSDK\Events\Definitions\DatePropertyOperation
 * @phpstan-import-type CalendarDatePropertyOperationShape from \HubSpotSDK\Events\Definitions\CalendarDatePropertyOperation
 * @phpstan-import-type TimePointOperationShape from \HubSpotSDK\Events\Definitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubSpotSDK\Events\Definitions\RangedTimeOperation
 * @phpstan-import-type RegexPropertyOperationShape from \HubSpotSDK\Events\Definitions\RegexPropertyOperation
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
