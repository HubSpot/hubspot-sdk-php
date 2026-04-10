<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicPageViewAnalyticsFilter;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicAbsoluteComparativeTimestampRefineBy;
use HubSpotSDK\Crm\Lists\PublicAbsoluteRangedTimestampRefineBy;
use HubSpotSDK\Crm\Lists\PublicAllHistoryRefineBy;
use HubSpotSDK\Crm\Lists\PublicNumOccurrencesRefineBy;
use HubSpotSDK\Crm\Lists\PublicRangedTimeOperation;
use HubSpotSDK\Crm\Lists\PublicRelativeComparativeTimestampRefineBy;
use HubSpotSDK\Crm\Lists\PublicRelativeRangedTimestampRefineBy;
use HubSpotSDK\Crm\Lists\PublicSetOccurrencesRefineBy;
use HubSpotSDK\Crm\Lists\PublicTimePointOperation;

/**
 * Specifies the criteria for refining the filter by coalescing.
 *
 * @phpstan-import-type PublicNumOccurrencesRefineByShape from \HubSpotSDK\Crm\Lists\PublicNumOccurrencesRefineBy
 * @phpstan-import-type PublicSetOccurrencesRefineByShape from \HubSpotSDK\Crm\Lists\PublicSetOccurrencesRefineBy
 * @phpstan-import-type PublicRelativeComparativeTimestampRefineByShape from \HubSpotSDK\Crm\Lists\PublicRelativeComparativeTimestampRefineBy
 * @phpstan-import-type PublicRelativeRangedTimestampRefineByShape from \HubSpotSDK\Crm\Lists\PublicRelativeRangedTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteComparativeTimestampRefineByShape from \HubSpotSDK\Crm\Lists\PublicAbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteRangedTimestampRefineByShape from \HubSpotSDK\Crm\Lists\PublicAbsoluteRangedTimestampRefineBy
 * @phpstan-import-type PublicAllHistoryRefineByShape from \HubSpotSDK\Crm\Lists\PublicAllHistoryRefineBy
 * @phpstan-import-type PublicTimePointOperationShape from \HubSpotSDK\Crm\Lists\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubSpotSDK\Crm\Lists\PublicRangedTimeOperation
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
