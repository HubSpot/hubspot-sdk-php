<?php

declare(strict_types=1);

namespace HubspotSDK\PublicEventFilterMetadata;

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

/**
 * @phpstan-import-type PublicBoolPropertyOperationShape from \HubspotSDK\PublicBoolPropertyOperation
 * @phpstan-import-type PublicNumberPropertyOperationShape from \HubspotSDK\PublicNumberPropertyOperation
 * @phpstan-import-type PublicStringPropertyOperationShape from \HubspotSDK\PublicStringPropertyOperation
 * @phpstan-import-type PublicDateTimePropertyOperationShape from \HubspotSDK\PublicDateTimePropertyOperation
 * @phpstan-import-type PublicRangedDatePropertyOperationShape from \HubspotSDK\PublicRangedDatePropertyOperation
 * @phpstan-import-type PublicComparativePropertyUpdatedOperationShape from \HubspotSDK\PublicComparativePropertyUpdatedOperation
 * @phpstan-import-type PublicComparativeDatePropertyOperationShape from \HubspotSDK\PublicComparativeDatePropertyOperation
 * @phpstan-import-type PublicRollingDateRangePropertyOperationShape from \HubspotSDK\PublicRollingDateRangePropertyOperation
 * @phpstan-import-type PublicRollingPropertyUpdatedOperationShape from \HubspotSDK\PublicRollingPropertyUpdatedOperation
 * @phpstan-import-type PublicEnumerationPropertyOperationShape from \HubspotSDK\PublicEnumerationPropertyOperation
 * @phpstan-import-type PublicAllPropertyTypesOperationShape from \HubspotSDK\PublicAllPropertyTypesOperation
 * @phpstan-import-type PublicRangedNumberPropertyOperationShape from \HubspotSDK\PublicRangedNumberPropertyOperation
 * @phpstan-import-type PublicMultiStringPropertyOperationShape from \HubspotSDK\PublicMultiStringPropertyOperation
 * @phpstan-import-type PublicDatePropertyOperationShape from \HubspotSDK\PublicDatePropertyOperation
 * @phpstan-import-type PublicCalendarDatePropertyOperationShape from \HubspotSDK\PublicCalendarDatePropertyOperation
 * @phpstan-import-type PublicTimePointOperationShape from \HubspotSDK\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubspotSDK\PublicRangedTimeOperation
 *
 * @phpstan-type OperationShape = PublicBoolPropertyOperationShape|PublicNumberPropertyOperationShape|PublicStringPropertyOperationShape|PublicDateTimePropertyOperationShape|PublicRangedDatePropertyOperationShape|PublicComparativePropertyUpdatedOperationShape|PublicComparativeDatePropertyOperationShape|PublicRollingDateRangePropertyOperationShape|PublicRollingPropertyUpdatedOperationShape|PublicEnumerationPropertyOperationShape|PublicAllPropertyTypesOperationShape|PublicRangedNumberPropertyOperationShape|PublicMultiStringPropertyOperationShape|PublicDatePropertyOperationShape|PublicCalendarDatePropertyOperationShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
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
