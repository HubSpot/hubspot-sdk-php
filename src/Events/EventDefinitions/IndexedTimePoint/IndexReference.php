<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\IndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\FiscalQuarter;
use HubspotSDK\Events\EventDefinitions\FiscalYear;
use HubspotSDK\Events\EventDefinitions\MonthReference;
use HubspotSDK\Events\EventDefinitions\NowReference;
use HubspotSDK\Events\EventDefinitions\QuarterReference;
use HubspotSDK\Events\EventDefinitions\TodayReference;
use HubspotSDK\Events\EventDefinitions\WeekReference;
use HubspotSDK\Events\EventDefinitions\YearReference;

final class IndexReference implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            NowReference::class,
            TodayReference::class,
            WeekReference::class,
            MonthReference::class,
            QuarterReference::class,
            FiscalQuarter::class,
            YearReference::class,
            FiscalYear::class,
        ];
    }
}
