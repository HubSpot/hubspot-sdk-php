<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\IndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Send\FiscalQuarter;
use HubspotSDK\Events\Send\FiscalYear;
use HubspotSDK\Events\Send\MonthReference;
use HubspotSDK\Events\Send\NowReference;
use HubspotSDK\Events\Send\QuarterReference;
use HubspotSDK\Events\Send\TodayReference;
use HubspotSDK\Events\Send\WeekReference;
use HubspotSDK\Events\Send\YearReference;

/**
 * @phpstan-import-type NowReferenceShape from \HubspotSDK\Events\Send\NowReference
 * @phpstan-import-type TodayReferenceShape from \HubspotSDK\Events\Send\TodayReference
 * @phpstan-import-type WeekReferenceShape from \HubspotSDK\Events\Send\WeekReference
 * @phpstan-import-type MonthReferenceShape from \HubspotSDK\Events\Send\MonthReference
 * @phpstan-import-type QuarterReferenceShape from \HubspotSDK\Events\Send\QuarterReference
 * @phpstan-import-type FiscalQuarterShape from \HubspotSDK\Events\Send\FiscalQuarter
 * @phpstan-import-type YearReferenceShape from \HubspotSDK\Events\Send\YearReference
 * @phpstan-import-type FiscalYearShape from \HubspotSDK\Events\Send\FiscalYear
 *
 * @phpstan-type IndexReferenceVariants = NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear
 * @phpstan-type IndexReferenceShape = IndexReferenceVariants|NowReferenceShape|TodayReferenceShape|WeekReferenceShape|MonthReferenceShape|QuarterReferenceShape|FiscalQuarterShape|YearReferenceShape|FiscalYearShape
 */
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
