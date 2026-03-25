<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Send\AbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Events\Send\AbsoluteRangedTimestampRefineBy;
use HubspotSDK\Events\Send\AllHistoryRefineBy;
use HubspotSDK\Events\Send\RangedTimeOperation;
use HubspotSDK\Events\Send\RelativeComparativeTimestampRefineBy;
use HubspotSDK\Events\Send\RelativeRangedTimestampRefineBy;
use HubspotSDK\Events\Send\TimePointOperation;

/**
 * @phpstan-import-type RelativeComparativeTimestampRefineByShape from \HubspotSDK\Events\Send\RelativeComparativeTimestampRefineBy
 * @phpstan-import-type RelativeRangedTimestampRefineByShape from \HubspotSDK\Events\Send\RelativeRangedTimestampRefineBy
 * @phpstan-import-type AbsoluteComparativeTimestampRefineByShape from \HubspotSDK\Events\Send\AbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type AbsoluteRangedTimestampRefineByShape from \HubspotSDK\Events\Send\AbsoluteRangedTimestampRefineBy
 * @phpstan-import-type AllHistoryRefineByShape from \HubspotSDK\Events\Send\AllHistoryRefineBy
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\Send\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\Send\RangedTimeOperation
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
