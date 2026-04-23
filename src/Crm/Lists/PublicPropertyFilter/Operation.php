<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicPropertyFilter;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicAllPropertyTypesOperation;
use HubSpotSDK\Crm\Lists\PublicBoolPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicCalendarDatePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicComparativeDatePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicComparativePropertyUpdatedOperation;
use HubSpotSDK\Crm\Lists\PublicDatePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicDateTimePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicEnumerationPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicMultiStringPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicNumberPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicRangedDatePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicRangedNumberPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation;
use HubSpotSDK\Crm\Lists\PublicRollingDateRangePropertyOperation;
use HubSpotSDK\Crm\Lists\PublicRollingPropertyUpdatedOperation;
use HubSpotSDK\Crm\Lists\PublicStringPropertyOperation;
use HubSpotSDK\Crm\Lists\PublicTimePointOperation;

/**
 * Defines the operation to be performed on the property, such as comparison or value matching.
 *
 * @phpstan-import-type PublicBoolPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicBoolPropertyOperation
 * @phpstan-import-type PublicNumberPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicNumberPropertyOperation
 * @phpstan-import-type PublicStringPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicStringPropertyOperation
 * @phpstan-import-type PublicDateTimePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicDateTimePropertyOperation
 * @phpstan-import-type PublicRangedDatePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicRangedDatePropertyOperation
 * @phpstan-import-type PublicComparativePropertyUpdatedOperationShape from \HubSpotSDK\Crm\Lists\PublicComparativePropertyUpdatedOperation
 * @phpstan-import-type PublicComparativeDatePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicComparativeDatePropertyOperation
 * @phpstan-import-type PublicRollingDateRangePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicRollingDateRangePropertyOperation
 * @phpstan-import-type PublicRollingPropertyUpdatedOperationShape from \HubSpotSDK\Crm\Lists\PublicRollingPropertyUpdatedOperation
 * @phpstan-import-type PublicEnumerationPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicEnumerationPropertyOperation
 * @phpstan-import-type PublicAllPropertyTypesOperationShape from \HubSpotSDK\Crm\Lists\PublicAllPropertyTypesOperation
 * @phpstan-import-type PublicRangedNumberPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicRangedNumberPropertyOperation
 * @phpstan-import-type PublicMultiStringPropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicMultiStringPropertyOperation
 * @phpstan-import-type PublicDatePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicDatePropertyOperation
 * @phpstan-import-type PublicCalendarDatePropertyOperationShape from \HubSpotSDK\Crm\Lists\PublicCalendarDatePropertyOperation
 * @phpstan-import-type PublicTimePointOperationShape from \HubSpotSDK\Crm\Lists\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation
 *
 * @phpstan-type OperationVariants = PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation
 * @phpstan-type OperationShape = OperationVariants|PublicBoolPropertyOperationShape|PublicNumberPropertyOperationShape|PublicStringPropertyOperationShape|PublicDateTimePropertyOperationShape|PublicRangedDatePropertyOperationShape|PublicComparativePropertyUpdatedOperationShape|PublicComparativeDatePropertyOperationShape|PublicRollingDateRangePropertyOperationShape|PublicRollingPropertyUpdatedOperationShape|PublicEnumerationPropertyOperationShape|PublicAllPropertyTypesOperationShape|PublicRangedNumberPropertyOperationShape|PublicMultiStringPropertyOperationShape|PublicDatePropertyOperationShape|PublicCalendarDatePropertyOperationShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
 */
final class Operation implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'operationType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'BOOL' => PublicBoolPropertyOperation::class,
            'NUMBER' => PublicNumberPropertyOperation::class,
            'STRING' => PublicStringPropertyOperation::class,
            'DATETIME' => PublicDateTimePropertyOperation::class,
            'RANGED_DATE' => PublicRangedDatePropertyOperation::class,
            'COMPARATIVE_PROPERTY_UPDATED' => PublicComparativePropertyUpdatedOperation::class,
            'COMPARATIVE_DATE' => PublicComparativeDatePropertyOperation::class,
            'ROLLING_DATE_RANGE' => PublicRollingDateRangePropertyOperation::class,
            'ROLLING_PROPERTY_UPDATED' => PublicRollingPropertyUpdatedOperation::class,
            'ENUMERATION' => PublicEnumerationPropertyOperation::class,
            'ALL_PROPERTY' => PublicAllPropertyTypesOperation::class,
            'NUMBER_RANGED' => PublicRangedNumberPropertyOperation::class,
            'MULTISTRING' => PublicMultiStringPropertyOperation::class,
            'DATE' => PublicDatePropertyOperation::class,
            'CALENDAR_DATE' => PublicCalendarDatePropertyOperation::class,
            'TIME_POINT' => PublicTimePointOperation::class,
            'TIME_RANGED' => PublicRangedTimeOperation::class,
        ];
    }
}
