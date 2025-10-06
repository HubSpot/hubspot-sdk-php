<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\PublicRangedTimeOperation;

use HubspotSDK\Automation\Workflows\PublicDatePoint;
use HubspotSDK\Automation\Workflows\PublicIndexedTimePoint;
use HubspotSDK\Automation\Workflows\PublicPropertyReferencedTime;
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
            PublicDatePoint::class,
            PublicIndexedTimePoint::class,
            PublicPropertyReferencedTime::class,
        ];
    }
}
