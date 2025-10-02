<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationPublicIndexedTimePoint;

use HubspotSDK\Automation\AutomationPublicFiscalQuarterReference;
use HubspotSDK\Automation\AutomationPublicFiscalYearReference;
use HubspotSDK\Automation\AutomationPublicMonthReference;
use HubspotSDK\Automation\AutomationPublicNowReference;
use HubspotSDK\Automation\AutomationPublicQuarterReference;
use HubspotSDK\Automation\AutomationPublicTodayReference;
use HubspotSDK\Automation\AutomationPublicWeekReference;
use HubspotSDK\Automation\AutomationPublicYearReference;
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
            AutomationPublicNowReference::class,
            AutomationPublicTodayReference::class,
            AutomationPublicWeekReference::class,
            AutomationPublicFiscalQuarterReference::class,
            AutomationPublicFiscalYearReference::class,
            AutomationPublicYearReference::class,
            AutomationPublicQuarterReference::class,
            AutomationPublicMonthReference::class,
        ];
    }
}
