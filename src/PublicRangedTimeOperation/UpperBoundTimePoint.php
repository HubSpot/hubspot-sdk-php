<?php

declare(strict_types=1);

namespace HubspotSDK\PublicRangedTimeOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\PublicDatePoint;
use HubspotSDK\PublicIndexedTimePoint;
use HubspotSDK\PublicPropertyReferencedTime;

/**
 * @phpstan-import-type PublicDatePointShape from \HubspotSDK\PublicDatePoint
 * @phpstan-import-type PublicIndexedTimePointShape from \HubspotSDK\PublicIndexedTimePoint
 * @phpstan-import-type PublicPropertyReferencedTimeShape from \HubspotSDK\PublicPropertyReferencedTime
 *
 * @phpstan-type UpperBoundTimePointShape = PublicDatePointShape|PublicIndexedTimePointShape|PublicPropertyReferencedTimeShape
 */
final class UpperBoundTimePoint implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
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
