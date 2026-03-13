<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\RangedTimeOperation;

use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;
use HubspotSDK\Events\EventDefinitions\DatePoint;
use HubspotSDK\Events\EventDefinitions\IndexedTimePoint;
use HubspotSDK\Events\EventDefinitions\PropertyReferencedTime;

/**
 * @phpstan-import-type DatePointShape from \HubspotSDK\Events\EventDefinitions\DatePoint
 * @phpstan-import-type IndexedTimePointShape from \HubspotSDK\Events\EventDefinitions\IndexedTimePoint
 * @phpstan-import-type PropertyReferencedTimeShape from \HubspotSDK\Events\EventDefinitions\PropertyReferencedTime
 *
 * @phpstan-type LowerBoundTimePointVariants = DatePoint|IndexedTimePoint|PropertyReferencedTime
 * @phpstan-type LowerBoundTimePointShape = LowerBoundTimePointVariants|DatePointShape|IndexedTimePointShape|PropertyReferencedTimeShape
 */
final class LowerBoundTimePoint implements ConverterSource
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
