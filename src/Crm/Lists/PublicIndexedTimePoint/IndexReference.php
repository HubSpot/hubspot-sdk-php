<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\PublicIndexedTimePoint;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Crm\Lists\PublicFiscalQuarterReference;
use HubSpotSDK\Crm\Lists\PublicFiscalYearReference;
use HubSpotSDK\Crm\Lists\PublicMonthReference;
use HubSpotSDK\Crm\Lists\PublicNowReference;
use HubSpotSDK\Crm\Lists\PublicQuarterReference;
use HubSpotSDK\Crm\Lists\PublicTodayReference;
use HubSpotSDK\Crm\Lists\PublicWeekReference;
use HubSpotSDK\Crm\Lists\PublicYearReference;

/**
 * Specifies the reference point in time for the indexed time point.
 *
 * @phpstan-import-type PublicNowReferenceShape from \HubSpotSDK\Crm\Lists\PublicNowReference
 * @phpstan-import-type PublicTodayReferenceShape from \HubSpotSDK\Crm\Lists\PublicTodayReference
 * @phpstan-import-type PublicWeekReferenceShape from \HubSpotSDK\Crm\Lists\PublicWeekReference
 * @phpstan-import-type PublicFiscalQuarterReferenceShape from \HubSpotSDK\Crm\Lists\PublicFiscalQuarterReference
 * @phpstan-import-type PublicFiscalYearReferenceShape from \HubSpotSDK\Crm\Lists\PublicFiscalYearReference
 * @phpstan-import-type PublicYearReferenceShape from \HubSpotSDK\Crm\Lists\PublicYearReference
 * @phpstan-import-type PublicQuarterReferenceShape from \HubSpotSDK\Crm\Lists\PublicQuarterReference
 * @phpstan-import-type PublicMonthReferenceShape from \HubSpotSDK\Crm\Lists\PublicMonthReference
 *
 * @phpstan-type IndexReferenceVariants = PublicNowReference|PublicTodayReference|PublicWeekReference|PublicFiscalQuarterReference|PublicFiscalYearReference|PublicYearReference|PublicQuarterReference|PublicMonthReference
 * @phpstan-type IndexReferenceShape = IndexReferenceVariants|PublicNowReferenceShape|PublicTodayReferenceShape|PublicWeekReferenceShape|PublicFiscalQuarterReferenceShape|PublicFiscalYearReferenceShape|PublicYearReferenceShape|PublicQuarterReferenceShape|PublicMonthReferenceShape
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
            'NOW' => PublicNowReference::class,
            'TODAY' => PublicTodayReference::class,
            'WEEK' => PublicWeekReference::class,
            'FISCAL_QUARTER' => PublicFiscalQuarterReference::class,
            'FISCAL_YEAR' => PublicFiscalYearReference::class,
            'YEAR' => PublicYearReference::class,
            'QUARTER' => PublicQuarterReference::class,
            'MONTH' => PublicMonthReference::class,
        ];
    }
}
