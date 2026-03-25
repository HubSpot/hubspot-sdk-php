<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicPageViewAnalyticsFilter;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Crm\Lists\PublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\Crm\Lists\PublicAllHistoryRefineBy;
use HubspotSDK\Crm\Lists\PublicNumOccurrencesRefineBy;
use HubspotSDK\Crm\Lists\PublicRangedTimeOperation;
use HubspotSDK\Crm\Lists\PublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\Crm\Lists\PublicRelativeRangedTimestampRefineBy;
use HubspotSDK\Crm\Lists\PublicSetOccurrencesRefineBy;
use HubspotSDK\Crm\Lists\PublicTimePointOperation;

/**
 * Specifies the criteria for refining the filter by pruning.
 *
 * @phpstan-import-type PublicNumOccurrencesRefineByShape from \HubspotSDK\Crm\Lists\PublicNumOccurrencesRefineBy
 * @phpstan-import-type PublicSetOccurrencesRefineByShape from \HubspotSDK\Crm\Lists\PublicSetOccurrencesRefineBy
 * @phpstan-import-type PublicRelativeComparativeTimestampRefineByShape from \HubspotSDK\Crm\Lists\PublicRelativeComparativeTimestampRefineBy
 * @phpstan-import-type PublicRelativeRangedTimestampRefineByShape from \HubspotSDK\Crm\Lists\PublicRelativeRangedTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteComparativeTimestampRefineByShape from \HubspotSDK\Crm\Lists\PublicAbsoluteComparativeTimestampRefineBy
 * @phpstan-import-type PublicAbsoluteRangedTimestampRefineByShape from \HubspotSDK\Crm\Lists\PublicAbsoluteRangedTimestampRefineBy
 * @phpstan-import-type PublicAllHistoryRefineByShape from \HubspotSDK\Crm\Lists\PublicAllHistoryRefineBy
 * @phpstan-import-type PublicTimePointOperationShape from \HubspotSDK\Crm\Lists\PublicTimePointOperation
 * @phpstan-import-type PublicRangedTimeOperationShape from \HubspotSDK\Crm\Lists\PublicRangedTimeOperation
 *
 * @phpstan-type PruningRefineByVariants = PublicNumOccurrencesRefineBy|PublicSetOccurrencesRefineBy|PublicRelativeComparativeTimestampRefineBy|PublicRelativeRangedTimestampRefineBy|PublicAbsoluteComparativeTimestampRefineBy|PublicAbsoluteRangedTimestampRefineBy|PublicAllHistoryRefineBy|PublicTimePointOperation|PublicRangedTimeOperation
 * @phpstan-type PruningRefineByShape = PruningRefineByVariants|PublicNumOccurrencesRefineByShape|PublicSetOccurrencesRefineByShape|PublicRelativeComparativeTimestampRefineByShape|PublicRelativeRangedTimestampRefineByShape|PublicAbsoluteComparativeTimestampRefineByShape|PublicAbsoluteRangedTimestampRefineByShape|PublicAllHistoryRefineByShape|PublicTimePointOperationShape|PublicRangedTimeOperationShape
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
