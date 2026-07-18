<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\IndexedTimePoint;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\FiscalQuarter;
use HubSpotSDK\Events\Definitions\FiscalYear;
use HubSpotSDK\Events\Definitions\MonthReference;
use HubSpotSDK\Events\Definitions\NowReference;
use HubSpotSDK\Events\Definitions\QuarterReference;
use HubSpotSDK\Events\Definitions\TodayReference;
use HubSpotSDK\Events\Definitions\WeekReference;
use HubSpotSDK\Events\Definitions\YearReference;

/**
 * @phpstan-import-type NowReferenceShape from \HubSpotSDK\Events\Definitions\NowReference
 * @phpstan-import-type TodayReferenceShape from \HubSpotSDK\Events\Definitions\TodayReference
 * @phpstan-import-type WeekReferenceShape from \HubSpotSDK\Events\Definitions\WeekReference
 * @phpstan-import-type MonthReferenceShape from \HubSpotSDK\Events\Definitions\MonthReference
 * @phpstan-import-type QuarterReferenceShape from \HubSpotSDK\Events\Definitions\QuarterReference
 * @phpstan-import-type FiscalQuarterShape from \HubSpotSDK\Events\Definitions\FiscalQuarter
 * @phpstan-import-type YearReferenceShape from \HubSpotSDK\Events\Definitions\YearReference
 * @phpstan-import-type FiscalYearShape from \HubSpotSDK\Events\Definitions\FiscalYear
 *
 * @phpstan-type IndexReferenceVariants = NowReference|TodayReference|WeekReference|MonthReference|QuarterReference|FiscalQuarter|YearReference|FiscalYear
 * @phpstan-type IndexReferenceShape = IndexReferenceVariants|NowReferenceShape|TodayReferenceShape|WeekReferenceShape|MonthReferenceShape|QuarterReferenceShape|FiscalQuarterShape|YearReferenceShape|FiscalYearShape
 */
final class IndexReference implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'referenceType';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'NOW' => NowReference::class,
            'TODAY' => TodayReference::class,
            'WEEK' => WeekReference::class,
            'MONTH' => MonthReference::class,
            'QUARTER' => QuarterReference::class,
            'FISCAL_QUARTER' => FiscalQuarter::class,
            'YEAR' => YearReference::class,
            'FISCAL_YEAR' => FiscalYear::class,
        ];
    }
}
