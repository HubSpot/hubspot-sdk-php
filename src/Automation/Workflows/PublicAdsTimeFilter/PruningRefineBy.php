<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicAdsTimeFilter;

use HubspotSDK\Automation\Workflows\PublicAbsoluteComparativeTimestampRefineBy;
use HubspotSDK\Automation\Workflows\PublicAbsoluteRangedTimestampRefineBy;
use HubspotSDK\Automation\Workflows\PublicAllHistoryRefineBy;
use HubspotSDK\Automation\Workflows\PublicNumOccurrencesRefineBy;
use HubspotSDK\Automation\Workflows\PublicRangedTimeOperation;
use HubspotSDK\Automation\Workflows\PublicRelativeComparativeTimestampRefineBy;
use HubspotSDK\Automation\Workflows\PublicRelativeRangedTimestampRefineBy;
use HubspotSDK\Automation\Workflows\PublicSetOccurrencesRefineBy;
use HubspotSDK\Automation\Workflows\PublicTimePointOperation;
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
