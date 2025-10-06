<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicIndexedTimePoint;

use HubspotSDK\Automation\Workflows\PublicFiscalQuarterReference;
use HubspotSDK\Automation\Workflows\PublicFiscalYearReference;
use HubspotSDK\Automation\Workflows\PublicMonthReference;
use HubspotSDK\Automation\Workflows\PublicNowReference;
use HubspotSDK\Automation\Workflows\PublicQuarterReference;
use HubspotSDK\Automation\Workflows\PublicTodayReference;
use HubspotSDK\Automation\Workflows\PublicWeekReference;
use HubspotSDK\Automation\Workflows\PublicYearReference;
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
