<?php

declare(strict_types=1);

namespace HubspotSDK\PublicIndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicFiscalQuarterReference;
use HubspotSDK\PublicFiscalYearReference;
use HubspotSDK\PublicMonthReference;
use HubspotSDK\PublicNowReference;
use HubspotSDK\PublicQuarterReference;
use HubspotSDK\PublicTodayReference;
use HubspotSDK\PublicWeekReference;
use HubspotSDK\PublicYearReference;

final class IndexReference implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            PublicNowReference::class,
            PublicTodayReference::class,
            PublicWeekReference::class,
            PublicFiscalQuarterReference::class,
            PublicFiscalYearReference::class,
            PublicYearReference::class,
            PublicQuarterReference::class,
            PublicMonthReference::class,
        ];
    }
}
