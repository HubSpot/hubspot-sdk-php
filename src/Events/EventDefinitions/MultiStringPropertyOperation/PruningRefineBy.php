<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\AbsoluteRangedTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\AllHistoryRefineBy;
use HubspotSDK\Events\EventDefinitions\RangedTimeOperation;
use HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy;
use HubspotSDK\Events\EventDefinitions\TimePointOperation;

/**
 * @phpstan-import-type RelativeComparativeTimestampRefineByShape from \HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy
 * @phpstan-import-type RelativeRangedTimestampRefineByShape from \HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy
 * @phpstan-import-type AbsoluteComparativeTimestampRefineByShape from \HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type AbsoluteRangedTimestampRefineByShape from \HubspotSDK\Events\EventDefinitions\AbsoluteRangedTimestampRefineBy
 * @phpstan-import-type AllHistoryRefineByShape from \HubspotSDK\Events\EventDefinitions\AllHistoryRefineBy
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\EventDefinitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\EventDefinitions\RangedTimeOperation
 *
 * @phpstan-type PruningRefineByVariants = RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation
 * @phpstan-type PruningRefineByShape = PruningRefineByVariants|RelativeComparativeTimestampRefineByShape|RelativeRangedTimestampRefineByShape|AbsoluteComparativeTimestampRefineByShape|AbsoluteRangedTimestampRefineByShape|AllHistoryRefineByShape|TimePointOperationShape|RangedTimeOperationShape
 */
final class PruningRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            RelativeComparativeTimestampRefineBy::class,
            RelativeRangedTimestampRefineBy::class,
            AbsoluteComparativeTimestampRefineBy::class,
            AbsoluteRangedTimestampRefineBy::class,
            AllHistoryRefineBy::class,
            TimePointOperation::class,
            RangedTimeOperation::class,
        ];
    }
}
