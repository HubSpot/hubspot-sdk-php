<?php

declare(strict_types=1);

namespace HubspotSDK\PublicUnifiedEventsFilterBranch;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\PublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\PublicAllHistoryRefineBy;
use HubspotSDK\PublicNumOccurrencesRefineBy;
use HubspotSDK\PublicRangedTimeOperation;
use HubspotSDK\PublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\PublicRelativeRangedTimestampRefineBy;
use HubspotSDK\PublicSetOccurrencesRefineBy;
use HubspotSDK\PublicTimePointOperation;

/**
 * @phpstan-import-type PublicNumOccurrencesRefineByShape from \HubspotSDK\PublicNumOccurrencesRefineBy
 * @phpstan-import-type PublicSetOccurrencesRefineByShape from \HubspotSDK\PublicSetOccurrencesRefineBy
 * @phpstan-import-type PublicRelativeComparativeTimestampRefineByShape from \HubspotSDK\PublicRelativeComparativeTimestampRefineBy
 * @phpstan-import-type PublicRelativeRangedTimestampRefineByShape from \HubspotSDK\PublicRelativeRangedTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteComparativeTimestampRefineByShape from \HubspotSDK\PublicAbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteRangedTimestampRefineByShape from \HubspotSDK\PublicAbsoluteRangedTimestampRefineBy
 * @phpstan-import-type PublicAllHistoryRefineByShape from \HubspotSDK\PublicAllHistoryRefineBy
 * @phpstan-import-type PublicTimePointOperationShape from \HubspotSDK\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubspotSDK\PublicRangedTimeOperation
 *
 * @phpstan-type CoalescingRefineByVariants = PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation
 * @phpstan-type CoalescingRefineByShape = CoalescingRefineByVariants|PublicNumOccurrencesRefineByShape|PublicSetOccurrencesRefineByShape|PublicRelativeComparativeTimestampRefineByShape|PublicRelativeRangedTimestampRefineByShape|PublicAbsoluteComparativeTimestampRefineByShape|PublicAbsoluteRangedTimestampRefineByShape|PublicAllHistoryRefineByShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
 */
final class CoalescingRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            PublicNumOccurrencesRefineBy::class,
            PublicSetOccurrencesRefineBy::class,
            PublicRelativeComparativeTimestampRefineBy::class,
            PublicRelativeRangedTimestampRefineBy::class,
            PublicAbsoluteComparativeTimestampRefineBy::class,
            PublicAbsoluteRangedTimestampRefineBy::class,
            PublicAllHistoryRefineBy::class,
            PublicTimePointOperation::class,
            PublicRangedTimeOperation::class,
        ];
    }
}
