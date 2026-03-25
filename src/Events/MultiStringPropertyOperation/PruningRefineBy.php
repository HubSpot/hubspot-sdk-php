<?php

declare(strict_types=1);

namespace HubspotSDK\Events\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\AbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Events\AbsoluteRangedTimestampRefineBy;
use HubspotSDK\Events\AllHistoryRefineBy;
use HubspotSDK\Events\RangedTimeOperation;
use HubspotSDK\Events\RelativeComparativeTimestampRefineBy;
use HubspotSDK\Events\RelativeRangedTimestampRefineBy;
use HubspotSDK\Events\TimePointOperation;

/**
 * @phpstan-import-type RelativeComparativeTimestampRefineByShape from \HubspotSDK\Events\RelativeComparativeTimestampRefineBy
 * @phpstan-import-type RelativeRangedTimestampRefineByShape from \HubspotSDK\Events\RelativeRangedTimestampRefineBy
 * @phpstan-import-type AbsoluteComparativeTimestampRefineByShape from \HubspotSDK\Events\AbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type AbsoluteRangedTimestampRefineByShape from \HubspotSDK\Events\AbsoluteRangedTimestampRefineBy
 * @phpstan-import-type AllHistoryRefineByShape from \HubspotSDK\Events\AllHistoryRefineBy
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\RangedTimeOperation
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
