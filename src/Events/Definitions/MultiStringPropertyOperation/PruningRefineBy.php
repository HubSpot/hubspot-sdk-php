<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\MultiStringPropertyOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\AbsoluteComparativeTimestampRefineBy;
use HubSpotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy;
use HubSpotSDK\Events\Definitions\AllHistoryRefineBy;
use HubSpotSDK\Events\Definitions\RangedTimeOperation;
use HubSpotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy;
use HubSpotSDK\Events\Definitions\RelativeRangedTimestampRefineBy;
use HubSpotSDK\Events\Definitions\TimePointOperation;

/**
 * @phpstan-import-type RelativeComparativeTimestampRefineByShape from \HubSpotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy
 * @phpstan-import-type RelativeRangedTimestampRefineByShape from \HubSpotSDK\Events\Definitions\RelativeRangedTimestampRefineBy
 * @phpstan-import-type AbsoluteComparativeTimestampRefineByShape from \HubSpotSDK\Events\Definitions\AbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type AbsoluteRangedTimestampRefineByShape from \HubSpotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy
 * @phpstan-import-type AllHistoryRefineByShape from \HubSpotSDK\Events\Definitions\AllHistoryRefineBy
 * @phpstan-import-type TimePointOperationShape from \HubSpotSDK\Events\Definitions\TimePointOperation
 * @phpstan-import-type RangedTimeOperationShape from \HubSpotSDK\Events\Definitions\RangedTimeOperation
 *
 * @phpstan-type PruningRefineByVariants = RelativeComparativeTimestampRefineBy|RelativeRangedTimestampRefineBy|AbsoluteComparativeTimestampRefineBy|AbsoluteRangedTimestampRefineBy|AllHistoryRefineBy|TimePointOperation|RangedTimeOperation
 * @phpstan-type PruningRefineByShape = PruningRefineByVariants|RelativeComparativeTimestampRefineByShape|RelativeRangedTimestampRefineByShape|AbsoluteComparativeTimestampRefineByShape|AbsoluteRangedTimestampRefineByShape|AllHistoryRefineByShape|TimePointOperationShape|RangedTimeOperationShape
 */
final class PruningRefineBy implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            TimePointOperation::class,
            RangedTimeOperation::class,
            'RelativeComparativeTimestampRefineBy' => RelativeComparativeTimestampRefineBy::class,
            'RelativeRangedTimestampRefineBy' => RelativeRangedTimestampRefineBy::class,
            'AbsoluteComparativeTimestampRefineBy' => AbsoluteComparativeTimestampRefineBy::class,
            'AbsoluteRangedTimestampRefineBy' => AbsoluteRangedTimestampRefineBy::class,
            'AllHistoryRefineBy' => AllHistoryRefineBy::class,
        ];
    }
}
