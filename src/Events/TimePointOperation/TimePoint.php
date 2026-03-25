<?php

declare(strict_types=1);

namespace HubspotSDK\Events\TimePointOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\DatePoint;
use HubspotSDK\Events\IndexedTimePoint;
use HubspotSDK\Events\PropertyReferencedTime;

/**
 * @phpstan-import-type DatePointShape from \HubspotSDK\Events\DatePoint
 * @phpstan-import-type IndexedTimePointShape from \HubspotSDK\Events\IndexedTimePoint
 * @phpstan-import-type PropertyReferencedTimeShape from \HubspotSDK\Events\PropertyReferencedTime
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
