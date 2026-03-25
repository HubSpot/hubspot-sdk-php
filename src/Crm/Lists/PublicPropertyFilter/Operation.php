<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicPropertyFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicAllPropertyTypesOperation;
use HubspotSDK\Crm\Lists\PublicBoolPropertyOperation;
use HubspotSDK\Crm\Lists\PublicCalendarDatePropertyOperation;
use HubspotSDK\Crm\Lists\PublicComparativeDatePropertyOperation;
use HubspotSDK\Crm\Lists\PublicComparativePropertyUpdatedOperation;
use HubspotSDK\Crm\Lists\PublicDatePropertyOperation;
use HubspotSDK\Crm\Lists\PublicDateTimePropertyOperation;
use HubspotSDK\Crm\Lists\PublicEnumerationPropertyOperation;
use HubspotSDK\Crm\Lists\PublicMultiStringPropertyOperation;
use HubspotSDK\Crm\Lists\PublicNumberPropertyOperation;
use HubspotSDK\Crm\Lists\PublicRangedDatePropertyOperation;
use HubspotSDK\Crm\Lists\PublicRangedNumberPropertyOperation;
use HubspotSDK\Crm\Lists\PublicRangedTimeOperation;
use HubspotSDK\Crm\Lists\PublicRollingDateRangePropertyOperation;
use HubspotSDK\Crm\Lists\PublicRollingPropertyUpdatedOperation;
use HubspotSDK\Crm\Lists\PublicStringPropertyOperation;
use HubspotSDK\Crm\Lists\PublicTimePointOperation;

/**
 * Defines the operation to be performed on the property, such as comparison or value matching.
 *
 * @phpstan-import-type PublicBoolPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicBoolPropertyOperation
 * @phpstan-import-type PublicNumberPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicNumberPropertyOperation
 * @phpstan-import-type PublicStringPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicStringPropertyOperation
 * @phpstan-import-type PublicDateTimePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicDateTimePropertyOperation
 * @phpstan-import-type PublicRangedDatePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicRangedDatePropertyOperation
 * @phpstan-import-type PublicComparativePropertyUpdatedOperationShape from \HubspotSDK\Crm\Lists\PublicComparativePropertyUpdatedOperation
 * @phpstan-import-type PublicComparativeDatePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicComparativeDatePropertyOperation
 * @phpstan-import-type PublicRollingDateRangePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicRollingDateRangePropertyOperation
 * @phpstan-import-type PublicRollingPropertyUpdatedOperationShape from \HubspotSDK\Crm\Lists\PublicRollingPropertyUpdatedOperation
 * @phpstan-import-type PublicEnumerationPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicEnumerationPropertyOperation
 * @phpstan-import-type PublicAllPropertyTypesOperationShape from \HubspotSDK\Crm\Lists\PublicAllPropertyTypesOperation
 * @phpstan-import-type PublicRangedNumberPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicRangedNumberPropertyOperation
 * @phpstan-import-type PublicMultiStringPropertyOperationShape from \HubspotSDK\Crm\Lists\PublicMultiStringPropertyOperation
 * @phpstan-import-type PublicDatePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicDatePropertyOperation
 * @phpstan-import-type PublicCalendarDatePropertyOperationShape from \HubspotSDK\Crm\Lists\PublicCalendarDatePropertyOperation
 * @phpstan-import-type PublicTimePointOperationShape from \HubspotSDK\Crm\Lists\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubspotSDK\Crm\Lists\PublicRangedTimeOperation
 *
 * @phpstan-type OperationVariants = PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation
 * @phpstan-type OperationShape = OperationVariants|PublicBoolPropertyOperationShape|PublicNumberPropertyOperationShape|PublicStringPropertyOperationShape|PublicDateTimePropertyOperationShape|PublicRangedDatePropertyOperationShape|PublicComparativePropertyUpdatedOperationShape|PublicComparativeDatePropertyOperationShape|PublicRollingDateRangePropertyOperationShape|PublicRollingPropertyUpdatedOperationShape|PublicEnumerationPropertyOperationShape|PublicAllPropertyTypesOperationShape|PublicRangedNumberPropertyOperationShape|PublicMultiStringPropertyOperationShape|PublicDatePropertyOperationShape|PublicCalendarDatePropertyOperationShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
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
