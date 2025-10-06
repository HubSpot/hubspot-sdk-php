<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicCtaAnalyticsFilter;

use HubspotSDK\Automation\PublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Automation\PublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\Automation\PublicAllHistoryRefineBy;
use HubspotSDK\Automation\PublicNumOccurrencesRefineBy;
use HubspotSDK\Automation\PublicRangedTimeOperation;
use HubspotSDK\Automation\PublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\Automation\PublicRelativeRangedTimestampRefineBy;
use HubspotSDK\Automation\PublicSetOccurrencesRefineBy;
use HubspotSDK\Automation\PublicTimePointOperation;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class PruningRefineBy implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
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
