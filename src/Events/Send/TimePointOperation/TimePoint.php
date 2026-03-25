<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send\TimePointOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\Send\DatePoint;
use HubspotSDK\Events\Send\IndexedTimePoint;
use HubspotSDK\Events\Send\PropertyReferencedTime;

/**
 * @phpstan-import-type DatePointShape from \HubspotSDK\Events\Send\DatePoint
 * @phpstan-import-type IndexedTimePointShape from \HubspotSDK\Events\Send\IndexedTimePoint
 * @phpstan-import-type PropertyReferencedTimeShape from \HubspotSDK\Events\Send\PropertyReferencedTime
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
