<?php

declare(strict_types=1);

namespace HubspotSDK\Events\IndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\FiscalQuarter;
use HubspotSDK\Events\FiscalYear;
use HubspotSDK\Events\MonthReference;
use HubspotSDK\Events\NowReference;
use HubspotSDK\Events\QuarterReference;
use HubspotSDK\Events\TodayReference;
use HubspotSDK\Events\WeekReference;
use HubspotSDK\Events\YearReference;

/**
 * @phpstan-import-type NowReferenceShape from \HubspotSDK\Events\NowReference
 * @phpstan-import-type TodayReferenceShape from \HubspotSDK\Events\TodayReference
 * @phpstan-import-type WeekReferenceShape from \HubspotSDK\Events\WeekReference
 * @phpstan-import-type MonthReferenceShape from \HubspotSDK\Events\MonthReference
 * @phpstan-import-type QuarterReferenceShape from \HubspotSDK\Events\QuarterReference
 * @phpstan-import-type FiscalQuarterShape from \HubspotSDK\Events\FiscalQuarter
 * @phpstan-import-type YearReferenceShape from \HubspotSDK\Events\YearReference
 * @phpstan-import-type FiscalYearShape from \HubspotSDK\Events\FiscalYear
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
