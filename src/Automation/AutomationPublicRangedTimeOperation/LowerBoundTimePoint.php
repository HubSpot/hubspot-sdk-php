<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationPublicRangedTimeOperation;

use HubspotSDK\Automation\AutomationPublicDatePoint;
use HubspotSDK\Automation\AutomationPublicIndexedTimePoint;
use HubspotSDK\Automation\AutomationPublicPropertyReferencedTime;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class LowerBoundTimePoint implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationPublicDatePoint::class,
            AutomationPublicIndexedTimePoint::class,
            AutomationPublicPropertyReferencedTime::class,
        ];
    }
}
