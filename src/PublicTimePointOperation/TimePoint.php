<?php

declare(strict_types=1);

namespace HubspotSDK\PublicTimePointOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicDatePoint;
use HubspotSDK\PublicIndexedTimePoint;
use HubspotSDK\PublicPropertyReferencedTime;

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
