<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\PublicTimePointOperation;

use HubspotSDK\Automation\PublicDatePoint;
use HubspotSDK\Automation\PublicIndexedTimePoint;
use HubspotSDK\Automation\PublicPropertyReferencedTime;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class TimePoint implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            PublicDatePoint::class,
            PublicIndexedTimePoint::class,
            PublicPropertyReferencedTime::class,
        ];
    }
}
