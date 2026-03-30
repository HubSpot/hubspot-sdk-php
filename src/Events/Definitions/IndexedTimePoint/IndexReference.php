<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions\IndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Definitions\FiscalQuarter;
use HubspotSDK\Events\Definitions\FiscalYear;
use HubspotSDK\Events\Definitions\MonthReference;
use HubspotSDK\Events\Definitions\NowReference;
use HubspotSDK\Events\Definitions\QuarterReference;
use HubspotSDK\Events\Definitions\TodayReference;
use HubspotSDK\Events\Definitions\WeekReference;
use HubspotSDK\Events\Definitions\YearReference;

/**
 * @phpstan-import-type NowReferenceShape from \HubspotSDK\Events\Definitions\NowReference
 * @phpstan-import-type TodayReferenceShape from \HubspotSDK\Events\Definitions\TodayReference
 * @phpstan-import-type WeekReferenceShape from \HubspotSDK\Events\Definitions\WeekReference
 * @phpstan-import-type MonthReferenceShape from \HubspotSDK\Events\Definitions\MonthReference
 * @phpstan-import-type QuarterReferenceShape from \HubspotSDK\Events\Definitions\QuarterReference
 * @phpstan-import-type FiscalQuarterShape from \HubspotSDK\Events\Definitions\FiscalQuarter
 * @phpstan-import-type YearReferenceShape from \HubspotSDK\Events\Definitions\YearReference
 * @phpstan-import-type FiscalYearShape from \HubspotSDK\Events\Definitions\FiscalYear
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
