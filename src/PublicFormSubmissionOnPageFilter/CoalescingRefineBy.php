<?php

declare(strict_types=1);

namespace HubspotSDK\PublicFormSubmissionOnPageFilter;

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

final class CoalescingRefineBy implements ConverterSource
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
