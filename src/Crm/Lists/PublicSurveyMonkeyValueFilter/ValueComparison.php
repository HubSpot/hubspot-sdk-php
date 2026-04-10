<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicSurveyMonkeyValueFilter;

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
 * Specifies the operation used to compare the survey answer value.
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
 * @phpstan-type ValueComparisonVariants = PublicBoolPropertyOperation|PublicNumberPropertyOperation|PublicStringPropertyOperation|PublicDateTimePropertyOperation|PublicRangedDatePropertyOperation|PublicComparativePropertyUpdatedOperation|PublicComparativeDatePropertyOperation|PublicRollingDateRangePropertyOperation|PublicRollingPropertyUpdatedOperation|PublicEnumerationPropertyOperation|PublicAllPropertyTypesOperation|PublicRangedNumberPropertyOperation|PublicMultiStringPropertyOperation|PublicDatePropertyOperation|PublicCalendarDatePropertyOperation|PublicTimePointOperation|PublicRangedTimeOperation
 * @phpstan-type ValueComparisonShape = ValueComparisonVariants|PublicBoolPropertyOperationShape|PublicNumberPropertyOperationShape|PublicStringPropertyOperationShape|PublicDateTimePropertyOperationShape|PublicRangedDatePropertyOperationShape|PublicComparativePropertyUpdatedOperationShape|PublicComparativeDatePropertyOperationShape|PublicRollingDateRangePropertyOperationShape|PublicRollingPropertyUpdatedOperationShape|PublicEnumerationPropertyOperationShape|PublicAllPropertyTypesOperationShape|PublicRangedNumberPropertyOperationShape|PublicMultiStringPropertyOperationShape|PublicDatePropertyOperationShape|PublicCalendarDatePropertyOperationShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
 */
final class ValueComparison implements ConverterSource
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
