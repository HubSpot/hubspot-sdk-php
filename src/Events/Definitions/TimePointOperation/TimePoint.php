<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\TimePointOperation;

use HubSpotSDK\Core\Concerns\SdkUnion;
use HubSpotSDK\Core\Conversion\Contracts\Converter;
use HubSpotSDK\Core\Conversion\Contracts\ConverterSource;
use HubSpotSDK\Events\Definitions\DatePoint;
use HubSpotSDK\Events\Definitions\IndexedTimePoint;
use HubSpotSDK\Events\Definitions\PropertyReferencedTime;

/**
 * @phpstan-import-type DatePointShape from \HubSpotSDK\Events\Definitions\DatePoint
 * @phpstan-import-type IndexedTimePointShape from \HubSpotSDK\Events\Definitions\IndexedTimePoint
 * @phpstan-import-type PropertyReferencedTimeShape from \HubSpotSDK\Events\Definitions\PropertyReferencedTime
 *
 * @phpstan-type TimePointVariants = DatePoint|IndexedTimePoint|PropertyReferencedTime
 * @phpstan-type TimePointShape = TimePointVariants|DatePointShape|IndexedTimePointShape|PropertyReferencedTimeShape
 */
final class TimePoint implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            DatePoint::class, IndexedTimePoint::class, PropertyReferencedTime::class,
        ];
    }
}
