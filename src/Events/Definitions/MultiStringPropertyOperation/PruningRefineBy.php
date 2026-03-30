<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\MultiStringPropertyOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Definitions\AbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy;
use HubspotSDK\Events\Definitions\AllHistoryRefineBy;
use HubspotSDK\Events\Definitions\RangedTimeOperation;
use HubspotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy;
use HubspotSDK\Events\Definitions\RelativeRangedTimestampRefineBy;
use HubspotSDK\Events\Definitions\TimePointOperation;

/**
 * @phpstan-import-type RelativeComparativeTimestampRefineByShape from \HubspotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy
 * @phpstan-import-type RelativeRangedTimestampRefineByShape from \HubspotSDK\Events\Definitions\RelativeRangedTimestampRefineBy
 * @phpstan-import-type AbsoluteComparativeTimestampRefineByShape from \HubspotSDK\Events\Definitions\AbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type AbsoluteRangedTimestampRefineByShape from \HubspotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy
 * @phpstan-import-type AllHistoryRefineByShape from \HubspotSDK\Events\Definitions\AllHistoryRefineBy
 * @phpstan-import-type TimePointOperationShape from \HubspotSDK\Events\Definitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubspotSDK\Events\Definitions\RangedTimeOperation
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
