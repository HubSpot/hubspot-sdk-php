<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicIndexedTimePoint;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Crm\Lists\PublicFiscalQuarterReference;
use HubspotSDK\Crm\Lists\PublicFiscalYearReference;
use HubspotSDK\Crm\Lists\PublicMonthReference;
use HubspotSDK\Crm\Lists\PublicNowReference;
use HubspotSDK\Crm\Lists\PublicQuarterReference;
use HubspotSDK\Crm\Lists\PublicTodayReference;
use HubspotSDK\Crm\Lists\PublicWeekReference;
use HubspotSDK\Crm\Lists\PublicYearReference;

/**
 * Specifies the reference point in time for the indexed time point.
 *
 * @phpstan-import-type PublicNowReferenceShape from \HubspotSDK\Crm\Lists\PublicNowReference
 * @phpstan-import-type PublicTodayReferenceShape from \HubspotSDK\Crm\Lists\PublicTodayReference
 * @phpstan-import-type PublicWeekReferenceShape from \HubspotSDK\Crm\Lists\PublicWeekReference
 * @phpstan-import-type PublicFiscalQuarterReferenceShape from \HubspotSDK\Crm\Lists\PublicFiscalQuarterReference
 * @phpstan-import-type PublicFiscalYearReferenceShape from \HubspotSDK\Crm\Lists\PublicFiscalYearReference
 * @phpstan-import-type PublicYearReferenceShape from \HubspotSDK\Crm\Lists\PublicYearReference
 * @phpstan-import-type PublicQuarterReferenceShape from \HubspotSDK\Crm\Lists\PublicQuarterReference
 * @phpstan-import-type PublicMonthReferenceShape from \HubspotSDK\Crm\Lists\PublicMonthReference
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
