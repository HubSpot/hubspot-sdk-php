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

/**
 * @phpstan-import-type PublicNowReferenceShape from \HubspotSDK\PublicNowReference
 * @phpstan-import-type PublicTodayReferenceShape from \HubspotSDK\PublicTodayReference
 * @phpstan-import-type PublicWeekReferenceShape from \HubspotSDK\PublicWeekReference
 * @phpstan-import-type PublicFiscalQuarterReferenceShape from \HubspotSDK\PublicFiscalQuarterReference
 * @phpstan-import-type PublicFiscalYearReferenceShape from \HubspotSDK\PublicFiscalYearReference
 * @phpstan-import-type PublicYearReferenceShape from \HubspotSDK\PublicYearReference
 * @phpstan-import-type PublicQuarterReferenceShape from \HubspotSDK\PublicQuarterReference
 * @phpstan-import-type PublicMonthReferenceShape from \HubspotSDK\PublicMonthReference
 *
 * @phpstan-type IndexReferenceVariants = PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference
 * @phpstan-type IndexReferenceShape = IndexReferenceVariants|PublicNowReferenceShape|PublicTodayReferenceShape|PublicWeekReferenceShape|PublicFiscalQuarterReferenceShape|PublicFiscalYearReferenceShape|PublicYearReferenceShape|PublicQuarterReferenceShape|PublicMonthReferenceShape
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
