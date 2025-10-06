<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicIndexedTimePoint;

use HubspotSDK\Automation\PublicFiscalQuarterReference;
use HubspotSDK\Automation\PublicFiscalYearReference;
use HubspotSDK\Automation\PublicMonthReference;
use HubspotSDK\Automation\PublicNowReference;
use HubspotSDK\Automation\PublicQuarterReference;
use HubspotSDK\Automation\PublicTodayReference;
use HubspotSDK\Automation\PublicWeekReference;
use HubspotSDK\Automation\PublicYearReference;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

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
